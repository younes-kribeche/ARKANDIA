<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Database;
use PDO;

class ArticleRepository extends Database {
    private $entityTypes = [
        'artefact', 'city', 'divinity', 'figure', 'flora', 'fona', 'image', 
        'kingdom', 'magic', 'monument', 'nature', 'pet', 'power', 'race', 
        'region', 'religion'
    ];

    public function getEntityTypes() {
        return $this->entityTypes;
    }

    public function getAllArticles($entityType = null) {
        if ($entityType === null) {
            $articles = [];
            foreach ($this->entityTypes as $type) {
                $articles = array_merge($articles, $this->getArticlesForEntity($type));
            }
            return $articles;
        } else {
            return $this->getArticlesForEntity($entityType);
        }
    }
    
    private function getArticlesForEntity($entityType) {
        if (!in_array($entityType, $this->entityTypes)) {
            throw new \InvalidArgumentException("Type d'entité non valide : " . $entityType);
        }

        $tableName = "article_" . $entityType;
        $query = "
            SELECT a.*, u.name as user_name
            FROM {$tableName} a
            LEFT JOIN user u ON a.id_user = u.id
        ";
        
        $stmt = $this->db->query($query);
        $articles = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = $this->createArticleFromRow($row, $entityType);
        }

        return $articles;
    }

    public function getArticleById($entityType, $id) {
        if (!in_array($entityType, $this->entityTypes)) {
            throw new \InvalidArgumentException("Type d'entité non valide : " . $entityType);
        }

        $tableName = "article_" . $entityType;
        $query = "
            SELECT a.*, u.name as user_name
            FROM {$tableName} a
            LEFT JOIN user u ON a.id_user = u.id
            WHERE a.id = :id
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? $this->createArticleFromRow($row, $entityType) : null;
    }

    private function createArticleFromRow($row, $entityType) {
        $article = new Article();
        $article->setId($row['id']);
        $article->setEntityId($row["id_{$entityType}"]);
        $article->setNameChapter1($row['name_chapter_1']);
        $article->setContentChapter1($row['content_chapter_1']);
        $article->setCreatedAt($row['created_at']);
        $article->setUserId($row['id_user']);
        $article->setUserName($row['user_name']);
        $article->setEntityType($entityType);
        
        return $article;
    }

    public function createArticle($entityType, Article $article) {
        if (!in_array($entityType, $this->entityTypes)) {
            throw new \InvalidArgumentException("Type d'entité non valide : " . $entityType);
        }

        $tableName = "article_" . $entityType;
        $query = "
            INSERT INTO {$tableName} (id_{$entityType}, name_chapter_1, content_chapter_1, created_at, id_user)
            VALUES (:entityId, :nameChapter1, :contentChapter1, :createdAt, :userId)
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'entityId' => $article->getEntityId(),
            'nameChapter1' => $article->getNameChapter1(),
            'contentChapter1' => $article->getContentChapter1(),
            'createdAt' => $article->getCreatedAt(),
            'userId' => $article->getUserId()
        ]);
        
        return $this->db->lastInsertId();
    }

    public function updateArticle($entityType, Article $article) {
        if (!in_array($entityType, $this->entityTypes)) {
            throw new \InvalidArgumentException("Type d'entité non valide : " . $entityType);
        }

        $tableName = "article_" . $entityType;
        $query = "
            UPDATE {$tableName}
            SET id_{$entityType} = :entityId, 
                name_chapter_1 = :nameChapter1, 
                content_chapter_1 = :contentChapter1, 
                id_user = :userId
            WHERE id = :id
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'entityId' => $article->getEntityId(),
            'nameChapter1' => $article->getNameChapter1(),
            'contentChapter1' => $article->getContentChapter1(),
            'userId' => $article->getUserId(),
            'id' => $article->getId()
        ]);
        
        return $stmt->rowCount();
    }

    public function deleteArticle($entityType, $id) {
        if (!in_array($entityType, $this->entityTypes)) {
            throw new \InvalidArgumentException("Type d'entité non valide : " . $entityType);
        }

        $tableName = "article_" . $entityType;
        $query = "DELETE FROM {$tableName} WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        
        return $stmt->rowCount();
    }
}