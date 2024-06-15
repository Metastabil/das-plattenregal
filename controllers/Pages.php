<?php
namespace KPO\Controllers;

use JetBrains\PhpStorm\NoReturn;
use KPO\Models\UserModel;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class Pages extends Controller {
    private UserModel $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    /**
     * @return void
     */
    public function login() :void {
        $data = [
            'title' => esc(LANG['titles']['pages']['login']),
            'error' => ''
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
                $data['error'] = esc(LANG['errors']['unknown_credentials']);
            }
        }
        else {
            $data['error'] = esc(LANG['errors']['required_error']);
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

    public function dashboard() :void {
        redirect_if_not_authenticated();


    }

    /**
     * @return void
     */
    public function error_404() :void {
        $data = [
            'title' => esc(LANG['titles']['pages']['error_404'])
        ];

        $this->view->render('pages/error_404', $data);
    }
}