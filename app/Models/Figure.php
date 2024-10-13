<?php

namespace App\Models;

class Figure {
    private $id;
    private $name;
    private $rank_id;
    private $user_id;
    private $power_id;
    private $firstname;
    private $title;
    private $secret_name;
    private $sex;
    private $age;
    private $religion_id;
    private $kingdom_id;
    private $description;
    private $background_image;
    private $images = [];

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getRankId() {
        return $this->rank_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getPowerId() {
        return $this->power_id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getTitle() {
        return $this->title ?? '';
    }

    public function getSecretName() {
        return $this->secret_name;
    }

    public function getSex() {
        return $this->sex;
    }

    public function getAge() {
        return $this->age;
    }

    public function getReligionId() {
        return $this->religion_id;
    }

    public function getKingdomId() {
        return $this->kingdom_id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImages() {
        return $this->images;
    }

    public function getFirstImage() {
        return !empty($this->images) ? $this->images[0] : null;
    }

    public function getBackgroundImage() {
        return $this->background_image;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setRankId($rank_id) {
        $this->rank_id = $rank_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setPowerId($power_id) {
        $this->power_id = $power_id;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setSecretName($secret_name) {
        $this->secret_name = $secret_name;
    }

    public function setSex($sex) {
        $this->sex = $sex;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setReligionId($religion_id) {
        $this->religion_id = $religion_id;
    }

    public function setKingdomId($kingdom_id) {
        $this->kingdom_id = $kingdom_id;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }

    public function setImages(array $images) {
        $this->images = $images;
    }

    public function addImage($image) {
        $this->images[] = $image;
    }

    public function setBackgroundImage($background_image) {
        $this->background_image = $background_image;
    }

}