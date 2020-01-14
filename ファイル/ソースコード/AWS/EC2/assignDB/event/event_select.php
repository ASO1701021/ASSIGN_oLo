<?php
$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

$post_string = file_get_contents('php://input');
//$json = mb_convert_encoding($post_string, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$r_data = json_decode($post_string);

$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

$sql = 'select * from event where event_number =' . $r_data->event_number;

foreach ($dbh->query($sql) as $row) {
    $array_temp = [
        'event_number' => $row['event_number'],
        'finish_flg' => $row['finish_flg'],
        'division' => $row['division'],
        'joboffer_number' => $row['joboffer_number'],
        'event_date' => $row['event_date'],
        'start_time' => $row['start_time'],
        'finish_time' => $row['finish_time'],
        'company_name' => $row['company_name'],
        'venue' => $row['venue'],
        'occupation' => $row['occupation'],
        'content' => $row['content'],
        'bring_item' => $row['bring_item'],
        'briefing_deadline' => $row['briefing_deadline'],
        'exam_deadline' => $row['exam_deadline'],
        'workplace' => $row['workplace'],
        'briefing_number' => $row['briefing_number'],
        'exam_number' => $row['exam_number'],
        'offer_number' => $row['offer_number'],
        'target' => $row['target'],
        'international_flg' => $row['international_flg'],
        'disability_flg' => $row['disability_flg'],
        'supplementary' => $row['supplementary'],
        'update_date' => $row['update_date'],
    ];
}

print_json($array_temp);

function print_json($data)
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Content-Type: application/json");
    header("charset: utf-8");
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

?>