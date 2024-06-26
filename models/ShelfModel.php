<?php
namespace KPO\Models;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class ShelfModel extends Model {
    /**
     * Contains the name of the related database table
     * @var string
     */
    private string $table = 'shelves';

    /**
     * @param int $id
     * @param int $user_id
     * @param bool $with_deleted
     * @return array
     */
    public function get(int $id = 0, int $user_id = 0, bool $with_deleted = false) :array {
        $sql = "SELECT id, name, annotation, width, height, user_id, deleted, created, updated
                FROM $this->table";
        $params = [];
        $conditions = [];

        if ($id > 0) {
            $conditions[] = 'id = :id';
            $params['id'] = $id;
        }

        if ($user_id > 0) {
            $conditions[] = 'user_id = :user_id';
            $params['user_id'] = $user_id;
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

        return !empty($result) && $id > 0 ? $result[0] : $result;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data) :bool {
        $sql = "INSERT INTO $this->table (name, annotation, width, height, user_id)
                VALUES (:name, :annotation, :width, :height, :user_id)";

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
            $setClauses[] = "$key = :$key";
            $params[$key] = $value;
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

    /**
     * @return int
     */
    public function get_last_inserted_id() :int {
        return $this->db->query('SELECT LAST_INSERT_ID()')->fetchColumn();
    }
}