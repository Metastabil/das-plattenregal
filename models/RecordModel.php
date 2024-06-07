<?php
namespace KPO\Models;

/**
 * @author Julius Derigs <derigs@kutzner-beratung.com>
 * @version 1.0
 */

class RecordModel extends Model {
    /**
     * Contains the name of the related database table
     * @var string
     */
    private string $table = 'records';

    /**
     * @param int $id
     * @param int $user_id
     * @param int $shelf_compartment_id
     * @param bool $with_deleted
     * @return array
     */
    public function get(int $id = 0, int $user_id = 0, int $shelf_compartment_id = 0, bool $with_deleted = false) :array {
        $sql = "SELECT R.id, R.artist, R.title, R.label, R.release, R.country, R.genre, R.discogs_url, R.annotation,
                       R.user_id, R.shelf_compartment_id, R.deleted, R.created, R.updated, CC.name AS cover_condition,
                       VC.name AS vinyl_condition, SC.name AS shelf_compartment, S.name AS shelf
                FROM $this->table AS R 
                JOIN conditions AS CC ON CC.id = R.cover_condition
                JOIN conditions AS VC ON VC.id = R.vinyl_condition
                JOIN shelf_compartments AS SC ON SC.id = R.shelf_compartment_id
                JOIN shelves AS S ON S.id = SC.shelf_id";
        $params = [];
        $conditions = [];

        if ($id > 0) {
            $conditions[] = 'R.id = :id';
            $params['id'] = $id;
        }

        if ($user_id > 0) {
            $conditions[] = 'R.user_id = :user_id';
            $params['user_id'] = $user_id;
        }

        if ($shelf_compartment_id > 0) {
            $conditions[] = 'R.shelf_compartment_id = :shelf_compartment_id';
            $params['shelf_compartment_id'] = $shelf_compartment_id;
        }

        if (!$with_deleted) {
            $conditions[] = 'R.deleted = :deleted';
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
        $sql = "INSERT INTO $this->table (artist, title, label, release, country, genre, discogs_url, annotation, 
                                          cover_condition, vinyl_condition, shelf_compartment_id)
                VALUES (:artist, :title, :label, :release, :country, :genre, :discogs_url, :annotation, 
                        :cover_condition, :vinyl_condition, :shelf_compartment_id)";

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
}