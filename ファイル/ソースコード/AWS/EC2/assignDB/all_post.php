<?php

$dsn = 'mysql:dbname=assignDB;host=localhost';
$user = 'root';
$password = '2129';

try{
    $dbh = new PDO($dsn, $user, $password);

//    print('接続に成功しました。<br>');

    $dbh->query('SET NAMES utf8');

    $sql = 'select * from event';

//    $array = [];
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
//        $array = array_push($array_temp);
        $array[] = $array_temp;
//        $data= ['data'=>$array_temp];
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