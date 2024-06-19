<?php
namespace KPO\Controllers;

use KPO\Models\ModuleModel;

class Modules extends Controller {
    private ModuleModel $moduleModel;

    public function __construct() {
        parent::__construct();

        redirect_if_not_authenticated();
        redirect_if_not_administrator();

        $this->moduleModel = new ModuleModel();
    }

    /**
     * @return void
     */
    public function index() :void {
        $data = [
            'title' => LANG['titles']['modules']['index'],
            'elements' => $this->moduleModel->get()
        ];

        $this->view->render('templates/header', $data)
                   ->render('modules/index', $data)
                   ->render('templates/footer');
    }
}