<?php

$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

try{
    $dbh = new PDO($dsn, $user, $password);

    $dbh->query('SET NAMES utf8');

    $sql = 'select * from student';

//    $array = [];
    foreach ($dbh->query($sql) as $row) {
        $array_temp = [
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

        $array[] = $array_temp;
    }

    // Origin null is not allowed by Access-Control-Allow-Origin.とかのエラー回避の為、ヘッダー付与
    header("Access-Control-Allow-Origin: *");

    $data = ['data'=>$array];

    $json_data = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $json_data;

}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>