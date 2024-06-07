<?php
namespace KPO\Controllers;

use JetBrains\PhpStorm\NoReturn;
use KPO\Models\UserModel;

/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

class Users extends Controller {
    private UserModel $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    /**
     * @return void
     */
    public function index() :void {
        $data = [
            'title' => esc(LANG['titles']['users']['index']),
            'elements' => $this->userModel->get(0, '', true)
        ];

        $this->view->render('templates/header', $data)
                   ->render('users/index', $data)
                   ->render('templates/footer');
    }

    /**
     * @return void
     */
    public function create() :void {
        $data = [
            'title' => esc(LANG['titles']['users']['create']),
            'error' => '',
            'message' => ''
        ];

        $required = [
            'username',
            'email',
            'password'
        ];

        if (is_get()) {
            $this->view->render('templates/header', $data)
                       ->render('users/create', $data)
                       ->render('templates/footer');
            return;
        }

        if (is_post() && check_for_required_fields($required)) {
            $form_data = [
                'username' => esc(get_input('username')),
                'email' => esc(get_input('email')),
                'password' => password_hash(get_input('password'), PASSWORD_DEFAULT)
            ];

            if ($this->userModel->create($form_data)) {
                $data['message'] = esc(LANG['messages']['successfully_created']);
            }
            else {
                $data['error'] = esc(LANG['errors']['error']);
            }

            redirect('users');
        }
        else {
            $data['error'] = esc(LANG['errors']['required_error']);
        }

        $this->view->render('templates/header', $data)
                   ->render('users/create', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     * @todo Also display all shelves a user has created
     */
    public function show(int $id) :void {

    }

    /**
     * @param int $id
     * @return void
     */
    #[NoReturn] public function delete(int $id) :void {
        if ($this->userModel->delete($id)) {
            redirect(base_url('users'));
        }

        redirect(base_url('user-show/' . $id));
    }
}