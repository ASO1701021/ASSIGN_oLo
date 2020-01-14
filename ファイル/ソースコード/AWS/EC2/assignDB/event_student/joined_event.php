<?php

// イベント番号を渡すと、event_studentより該当する学籍番号を返す
// event_numberを渡すと、event_studentより該当するstudent_numberを返す

ini_set("display_errors", 1);
error_reporting(E_ALL);

$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'user';
$password = '2129';

$post_string = file_get_contents('php://input');
$r_data = json_decode($post_string);

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');
    $sql = 'select * from event_student where student_number =' . $r_data->student_number;

    foreach ($dbh->query($sql) as $row) {
        $joined_event[] = $row['event_number'];
    }

    $data = ['data' =>
        $joined_event
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