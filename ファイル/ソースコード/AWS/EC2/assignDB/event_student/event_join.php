<?php
$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

$post_string = file_get_contents('php://input');
$r_data = json_decode($post_string);

$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

$sql = "INSERT INTO event_student VALUES("
    . $r_data->event_number
    . ',' . $r_data->student_number
    .')';

$dbh->query($sql);

print_json($sql);

function print_json($data)
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Content-Type: application/json");
    header("charset: utf-8");
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

?>