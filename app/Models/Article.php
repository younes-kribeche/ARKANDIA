<?php

namespace App\Models;

class Article {
    private $id;
    private $entityId;
    private $nameChapter1;
    private $contentChapter1;
    private $createdAt;
    private $userId;
    private $userName;
    private $entityType;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getEntityId() {
        return $this->entityId;
    }

    public function getNameChapter1() {
        return $this->nameChapter1;
    }

    public function getContentChapter1() {
        return $this->contentChapter1;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getEntityType() {
        return $this->entityType;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setEntityId($entityId) {
        $this->entityId = $entityId;
    }

    public function setNameChapter1($nameChapter1) {
        $this->nameChapter1 = $nameChapter1;
    }

    public function setContentChapter1($contentChapter1) {
        $this->contentChapter1 = $contentChapter1;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setEntityType($entityType) {
        $this->entityType = $entityType;
    }
}