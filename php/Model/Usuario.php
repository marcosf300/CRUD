<?php

class Usuario{
    
    private $id;
    private $name;
    private $surname;
    private $age;
    private $genre;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getAge() {
        return $this->age;
    }

    function getGenre() {
        return $this->genre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setname($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }


    
}
