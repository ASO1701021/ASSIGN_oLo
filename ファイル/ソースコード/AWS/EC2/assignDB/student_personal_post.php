<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

$post_string = file_get_contents('php://input');
//$json = mb_convert_encoding($post_string, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$r_data = json_decode($post_string);

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');
    $sql = 'select * from student where student_number =' . $r_data->student_number;

    foreach ($dbh->query($sql) as $row) {
        $student = [
            'student_number' => $row['student_number'],
            'student_slack_token' => $row['student_slack_token'],
            'student_name' => $row['student_name'],
            'student_sex' => $row['student_sex'],
            'student_age' => $row['student_age'],
            'student_belong' => $row['student_belong'],
            'student_grade' => $row['student_grade'],
            'student_status' => $row['student_status'],
            'student_emotion' => $row['student_emotion'],
            'student_login' => $row['student_login'],
        ];
//        $student[] = $array_temp;
    }

    $sql = 'select * from student_personal where student_number =' . $r_data->student_number;

    foreach ($dbh->query($sql) as $row) {
        $student_personal = [
            'student_number' => $row['student_number'],
            'character_id' => $row['character_id']
        ];
//        $student_personal[] = $array_temp;
    }

    // Origin null is not allowed by Access-Control-Allow-Origin.とかのエラー回避の為、ヘッダー付与
//    header("Access-Control-Allow-Origin: *");

    $data = ['data' => [
        $student,
        $student_personal
    ]];

    print_json($data);

} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
}

$dbh = null;


function print_json($data)
{
//    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
//    header("Access-Control-Allow-Origin: *; Content-Type: application/json; charset=utf-8");
    header("Content-Type: application/json");
    header("charset: utf-8");
//    header("Access-Control-Allow-Origin: http://localhost; Access-Control-Allow-Methods:POST; Content-Type: application/json; charset=utf-8");
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

?>