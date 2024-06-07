<?php
namespace KPO\System\Classes;

use PDOException;
use PDO;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class Database {
    /**
     * Contains the database host
     * @var string
     */
    private string $host = 'localhost';

    /**
     * Contains the database user
     * @var string
     */
    private string $user = 'root';

    /**
     * Contains the database name
     * @var string
     */
    private string $db = 'das_plattenregal';

    /**
     * Contains the database password
     * @var string
     */
    private string $pw = 'Mumsili1';

    /**
     * Contains the database port
     * @var string
     */
    private string $port = '3306';

    /**
     * Contains the database charset
     * @var string
     */
    private string $charset = 'utf8';

    /**
     * Contains the database type.
     * Possible options are 'mysql' and 'mssql'.
     * @var string
     */
    private string $db_type = 'mysql';

    /**
     * @return PDO
     */
    public function connect() :PDO {
        try {
            if ($this->db_type === 'mysql') {
                $connection = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset", $this->user, $this->pw);
            }
            else if ($this->db_type === 'mssql') {
                $connection = new PDO("sqlsrv:Server=$this->host,$this->port;Database=$this->db;", $this->user, $this->pw);
            }
            else {
                die('Unknown database type!');
            }

            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return $connection;
    }
}