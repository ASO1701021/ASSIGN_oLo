<?php

// 学籍番号をを渡すと、event_studentより該当するイベント番号を返す
// student_numberを渡すと、event_studentより該当するevent_numberを返す

ini_set("display_errors", 1);
error_reporting(E_ALL);

$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

$post_string = file_get_contents('php://input');
$r_data = json_decode($post_string);

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');
    $sql = 'select * from event_student where event_number =' . $r_data->event_number;

    foreach ($dbh->query($sql) as $row) {
        $joined_student[] = $row['student_number'];
    }

    $data = ['data' =>
        $joined_student
    ];

    print_json($data);

} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
}

$dbh = null;

function print_json($data)
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Content-Type: application/json");
    header("charset: utf-8");
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

?>