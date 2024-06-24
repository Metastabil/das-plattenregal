<?php
namespace KPO\Controllers;

use JetBrains\PhpStorm\NoReturn;
use KPO\Models\ShelfModel;
use KPO\Models\UserModel;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class Pages extends Controller {
    private UserModel $userModel;
    private ShelfModel $shelfModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    /**
     * @return void
     */
    public function login() :void {
        $data = [
            'title' => LANG['titles']['pages']['login']
        ];

        $required = ['email', 'password'];

        if (is_get()) {
            $this->view->render('pages/login', $data);
            return;
        }

        if (is_post() && check_for_required_fields($required)) {
            $email = get_input('email');
            $password = get_input('password');
            $user = $this->userModel->get(0 ,$email);

            if (!empty($user) && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'administrator' => $user['administrator']
                ];

                redirect('dashboard');
            }
            else {
                set_message('error', LANG['errors']['unknown_credentials']);
            }
        }
        else {
            set_message('error', LANG['errors']['required_error']);
        }

        $this->view->render('pages/login', $data);
    }

    /**
     * @return void
     */
    #[NoReturn] public function logout() :void {
        session_destroy();
        unset($_SESSION['user']);

        redirect(base_url('login'));
    }

    /**
     * @return void
     */
    public function dashboard() :void {
        redirect_if_not_authenticated();
        $user_id = $_SESSION['user']['id'];

        $data = [
            'title' => LANG['titles']['pages']['dashboard'],
            'shelves' => $this->shelfModel->get(0, $user_id)
        ];

        $this->view->render('templates/header', $data)
                   ->render('pages/dashboard', $data)
                   ->render('templates/footer');
    }

    /**
     * @return void
     */
    public function error_404() :void {
        $data = [
            'title' => LANG['titles']['pages']['error_404']
        ];

        $this->view->render('pages/error_404', $data);
    }
}