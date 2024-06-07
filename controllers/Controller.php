<?php
namespace KPO\Controllers;

use KPO\System\Classes\View;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class Controller {
    protected View $view;

    public function __construct() {
        $this->view = new View();
    }
}