<?php
namespace KPO\Models;

use KPO\System\Classes\Database;
use PDO;

/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

class Model {
    protected Database $databaseInstance;
    protected PDO $db;

    public function __construct() {
        if (WITH_DATABASE) {
            $this->databaseInstance = new Database();
            $this->db = $this->databaseInstance->connect();
        }
    }
}