<?php

/* Kursklassen */
class Course extends Database {
    protected $arr = [];

    public function getCourse () {
        // Query för att hämta all information
        $stmt = $this->connect()->query("SELECT * 
        FROM frfr1800.course");
        if($stmt->rowCount()){
            while($row = $stmt->fetch()) {
                array_push($this->arr, $row);
            }
        }
    }

    public function deleteCourse ($id) {
        $stmt = $this->connect()->prepare("DELETE FROM frfr1800.course WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function editCourse ($code, $name, $progression, $syllabus, $id) {
        $stmt = $this->connect()->prepare("UPDATE frfr1800.course
        SET `courseCode`=?,`courseName`=?,`progression`=?,`syllabus`=? 
        WHERE id = ?");
        $stmt->execute([$code, $name, $progression, $syllabus, $id]);
    }

    public function createCourse ($code, $name, $progression, $syllabus) {
        $stmt = $this->connect()->prepare("INSERT INTO frfr1800.course(`courseCode`, `courseName`, `progression`, `syllabus`) VALUES (?,?,?,?)");
        $stmt->execute([$code, $name, $progression, $syllabus]);
    }
    
    public function retrieve_arr(){
        return $this->arr;
    }
 }