<?php
// Hämta config filen med autoload
require "../../cfg/cfg.php";

// Hämta metod
$method = $_SERVER['REQUEST_METHOD'];
header("Content-Type: application/json; charset=UTF-8");
// Öppna upp för andra servrar
header("Access-Control-Allow-Origin: *");
// Bekräfta metoder
header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT");
// Gör det möjligt att hämta data so mskickas
$input = json_decode(file_get_contents('php://input'),true);

// Anropa klassen
$x = new Course();
switch ($method) {
    case "GET":
    // GET
    $x->getCourse();
    $mess = $x->retrieve_arr();
    break;
    case "PUT":
    // PUT
    // Ifall något av fälten är tomma, avbryt uppdatering. Ge felmeddelande.
    if(empty($input['code']) || empty($input['name']) || empty($input['prog']) || empty($input['syl'])) { 
        $mess = array("Message" => "Fyll i alla fält!");
    } else {
        $x->editCourse($input['code'], $input['name'], $input['prog'], $input['syl'], $input['id']);
        $mess = array("Message" => "Update Successful!");
    }
    break;
    case "POST":
    // POST
    // Ifall något av fälten är tomma, avbryt uppdatering. Ge felmeddelande.
    if(empty($input['code']) || empty($input['name']) || empty($input['prog']) || empty($input['syl'])) {
        $mess = array("Message" => "Fyll i alla fält!");
    } else {
        $x->createCourse($input['code'], $input['name'], $input['prog'], $input['syl']);
        $mess = array("Message" => "Post Successful!");
    }
    break;
    case "DELETE":
    // POST
    $x->deleteCourse($input['id']);
    $mess = array("Message" => "Deletion Successful!");
    break;
}
echo json_encode($mess);