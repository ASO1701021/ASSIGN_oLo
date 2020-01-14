<?php
$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

$post_string = file_get_contents('php://input');
//$json = mb_convert_encoding($post_string, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$r_data = json_decode($post_string);

$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

$temp_data = [
    'finish_flg' => 0,
    'division' => "",
    'joboffer_number'=> 0,
    "event_date" => "",
    "start_time" => "",
    "finish_time" => "",
    "company_name" => "",
    "venue" => "",
    "occupation" => "",
    "content" => "",
    "bring_item" => "",
    "briefing_deadline" => "",
    "exam_deadline" => "",
    "workplace" => "",
    "briefing_number" => 0,
    "exam_number" => 0,
    "offer_number" => 0,
    "target" => "",
    "international_flg" => 0,
    "disability_flg" => 0,
    "supplementary" =>"",
    "update_date" => ""
];

$sql = "INSERT INTO event VALUES(null"
    . ',' . 0
    . ',' . "'$r_data->division'"
    . ',' . $r_data->joboffer_number
    . ',' . "'$r_data->event_date'"
    . ',' . "'$r_data->start_time'"
    . ',' . "'$r_data->finish_time'"
    . ',' . "'$r_data->company_name'"
    . ',' . "'$r_data->venue'"
    . ',' . "'$r_data->occupation'"
    . ',' . "'$r_data->content'"
    . ',' . "'$r_data->bring_item'"
    . ',' . "'$r_data->briefing_deadline'"
    . ',' . "'$r_data->exam_deadline'"
    . ',' . "'$r_data->workplace'"
    . ',' . $r_data->briefing_number
    . ',' . $r_data->exam_number
    . ',' . $r_data->offer_number
    . ',' . "'$r_data->target'"
    . ',' . $r_data->international_flg
    . ',' . $r_data->disability_flg
    . ',' . "'$r_data->supplementary'"
    . ',' . 0
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