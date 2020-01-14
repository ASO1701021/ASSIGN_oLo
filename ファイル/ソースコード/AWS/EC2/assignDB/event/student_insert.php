<?php
$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

$post_string = file_get_contents('php://input');
//$json = mb_convert_encoding($post_string, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$r_data = json_decode($post_string);

$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

$sql = "INSERT INTO event VALUES "
    . 'finish_flg' . ' = ' . $r_data->finish_flg
    . ',' . 'division' . ' = ' . "'$r_data->division'"
    . ',' . 'joboffer_number' . ' = ' . $r_data->joboffer_number
    . ',' . 'event_date' . ' = ' . "'$r_data->event_date'"
    . ',' . 'start_time' . ' = ' . "'$r_data->start_time'"
    . ',' . 'finish_time' . ' = ' . "'$r_data->finish_time'"
    . ',' . 'company_name' . ' = ' . "'$r_data->company_name'"
    . ',' . 'venue' . ' = ' . "'$r_data->venue'"
    . ',' . 'occupation' . ' = ' . "'$r_data->occupation'"
    . ',' . 'bring_item' . ' = ' . "'$r_data->bring_item'"
    . ',' . 'briefing_deadline' . ' = ' . "'$r_data->briefing_deadline'"
    . ',' . 'exam_deadline' . ' = ' . "'$r_data->exam_deadline'"
    . ',' . 'workplace' . ' = ' . "'$r_data->workplace'"
    . ',' . 'briefing_number' . ' = ' . $r_data->briefing_number
    . ',' . 'exam_number' . ' = ' . $r_data->exam_number
    . ',' . 'offer_number' . ' = ' . $r_data->offer_number
    . ',' . 'target' . ' = ' . "'$r_data->target'"
    . ',' . 'international_flg' . ' = ' . $r_data->international_flg
    . ',' . 'disability_flg' . ' = ' . $r_data->disability_flg
    . ',' . 'supplementary' . ' = ' . "'$r_data->supplementary'"
    . ',' .'update_date' . ' = ' . "'$r_data->update_date'"
    . ' where event_number = ' . $r_data->event_number;

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