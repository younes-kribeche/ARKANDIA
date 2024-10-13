<?php

namespace App\Repositories;

use App\Models\Figure;
use App\Models\Database;
use PDO;

class FigureRepository extends Database {
    public function getAllFigures() {
        $query = "
            SELECT f.*, i.image_name, i.id as image_id
            FROM figure f
            LEFT JOIN image_figure `if` ON f.id = `if`.figure_id
            LEFT JOIN image i ON `if`.image_id = i.id
        ";
        
        return $this->executeFigureQuery($query);
    }

    public function getFigureById($id) {
        $query = "
            SELECT f.*, i.image_name, i.id as image_id
            FROM figure f
            LEFT JOIN image_figure `if` ON f.id = `if`.figure_id
            LEFT JOIN image i ON `if`.image_id = i.id
            WHERE f.id = :id
        ";
        
        $params = ['id' => $id];
        $figures = $this->executeFigureQuery($query, $params);
        
        return !empty($figures) ? $figures[0] : null;
    }

    private function executeFigureQuery($query, $params = []) {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $figures = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $figureId = $row['id'];
            if (!isset($figures[$figureId])) {
                $figure = new Figure();
                $figure->setId($row['id']);
                $figure->setName($row['name']);
                $figure->setRankId($row['rank_id']);
                $figure->setUserId($row['user_id']);
                $figure->setPowerId($row['power_id']);
                $figure->setFirstname($row['firstname']);
                $figure->setTitle($row['title']);
                $figure->setSecretName($row['secret_name']);
                $figure->setSex($row['sex']);
                $figure->setAge($row['age']);
                $figure->setReligionId($row['religion_id']);
                $figure->setKingdomId($row['kingdom_id']);
                $figure->setDescription($row['description']);
                $figure->setBackgroundImage($row['background_image']);
                $figures[$figureId] = $figure;
            }
            
            if ($row['image_name']) {
                $figures[$figureId]->addImage([
                    'id' => $row['image_id'],
                    'name' => $row['image_name']
                ]);
            }
        }

        return array_values($figures);
    }
}