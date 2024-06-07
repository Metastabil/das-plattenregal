<?php
namespace KPO\Models;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class UserModel extends Model {
    /**
     * Contains the name of the related database table
     * @var string
     */
    private string $table = 'users';

    /**
     * @param int $id
     * @param string $email
     * @param bool $with_inactive
     * @return array
     */
    public function get(int $id = 0, string $email = '', bool $with_inactive = false, bool $with_deleted = false) :array {
        $sql = "SELECT id, username, email, password, administrator, active, deleted, created, updated
                FROM $this->table";
        $params = [];
        $conditions = [];

        if ($id > 0) {
            $conditions[] = 'id = :id';
            $params['id'] = $id;
        }

        if (!empty($email)) {
            $conditions[] = 'email = :email';
            $params['email'] = $email;
        }

        if (!$with_inactive) {
            $conditions[] = 'active = :active';
            $params['active'] = 1;
        }

        if (!$with_deleted) {
            $conditions[] = 'deleted = :deleted';
            $params['deleted'] = 0;
        }

        if (!empty($conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $statement = $this->db->prepare($sql);
        $statement->execute($params);
        $result = $statement->fetchAll();

        return !empty($result) && ($id > 0 || !empty($email)) ? $result[0] : $result;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data) :bool {
        $sql = "INSERT INTO $this->table (username, email, password)
                VALUES (:username, :email, :password)";

        return $this->db->prepare($sql)->execute($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data) :bool {
        $setClauses = [];
        $params = ['id' => $id];

        foreach ($data as $key => $value) {
            if ($key === 'password' && !empty($value)) {
                $setClauses[] = "$key = :$key";
                $params[$key] = password_hash($value, PASSWORD_DEFAULT);
            }
            elseif ($key !== 'password') {
                $setClauses[] = "$key = :$key";
                $params[$key] = $value;
            }
        }

        $sql = "UPDATE $this->table SET " . implode(', ', $setClauses) . "WHERE id = :id";

        return $this->db->prepare($sql)->execute($params);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) :bool {
        $sql = "UPDATE $this->table SET deleted = :deleted WHERE id = :id";

        return $this->db->prepare($sql)->execute(['deleted' => 1, 'id' => $id]);
    }
}