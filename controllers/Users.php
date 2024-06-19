<?php
namespace KPO\Controllers;

use JetBrains\PhpStorm\NoReturn;
use KPO\Models\UserModel;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
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

            redirect(base_url('users'));
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
        $data = [
            'title' => esc(LANG['titles']['users']['show']),
            'element' => $this->userModel->get($id, '', true)
        ];

        $this->view->render('templates/header', $data)
                   ->render('users/show', $data)
                   ->render('templates/footer');
    }

    public function edit(int $id) :void {
        $data = [
            'title' => esc(LANG['titles']['users']['update']),
            'element' => $this->userModel->get($id, '', true)
        ];

        $required = [
            'username',
            'email'
        ];

        if (is_get()) {
            $this->view->render('templates/header', $data)
                       ->render('users/edit', $data)
                       ->render('templates/footer');
            return;
        }

        if (is_post() && check_for_required_fields($required)) {
            $form_data = [
                'username' => esc(get_input('username')),
                'email' => esc(get_input('email'))
            ];

            if (!empty(get_input('password'))) {
                $form_data['password'] = password_hash(get_input('password'), PASSWORD_DEFAULT);
            }

            if ($this->userModel->update($id, $form_data)) {
                set_message('success', LANG['messages']['successfully_updated']);
            }
            else {
                set_message('error', LANG['errors']['error']);
            }

            redirect(base_url('users'));
        }
        else {
            set_message('error', LANG['errors']['required_error']);
        }

        $this->view->render('templates/header', $data)
            ->render('users/create', $data)
            ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    public function change_status(int $id) :void {
        $user = $this->userModel->get($id, '', true);

        switch ((bool)$user['active']) {
            case true:
                if ($this->userModel->update($id, ['active' => 0])) {
                    set_message('success', esc(LANG['messages']['successfully_deactivated']));
                }
                else {
                    set_message('error', esc(LANG['errors']['error']));
                }

                break;
            case false:
                if ($this->userModel->update($id, ['active' => 1])) {
                    set_message('success', esc(LANG['messages']['successfully_activated']));
                }
                else {
                    set_message('error', esc(LANG['errors']['error']));
                }
                break;
        }

        redirect(base_url('users'));
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