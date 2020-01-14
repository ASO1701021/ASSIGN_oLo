var slackAccessToken = '****************************************************************************';
var calendar = CalendarApp.getCalendarById('****************************************************');
var date = new Date(); //今日の日付の取得

function RemindMain() {
  var date = new Date(); //今日の日付の取得
  var events = calendar.getEventsForDay(date); //今日の日付に存在する全ての予定を配列にぶち込む
  for(var i = 0; i < events.length; i++){
    var startTime   = events[i].getStartTime(); //開始時刻の取得
    var startMinute = startTime.getMinutes();   //時の取得
    var startHour   = startTime.getHours();     //分の取得
    
    if(startMinute<10){
      startMinute = startMinute + 50;
      startHour = startHour - 1;
    }
    else{
      startMinute = startMinute - 10;
    }
    date.setHours(startHour);
    date.setMinutes(startMinute);
    Logger.log(date);//ログ出力
    setTriggera(date); //トリガーセット
    
  }
  date.setHours(9);
  date.setMinutes(00);
  setTriggerc(date);
}

function RandCallMain() {
  var date = new Date(); //今日の日付の取得
  date.setDate(date.getDate() + 7); //1週間後の日付を取得
  //Logger.log(date)
  var events = calendar.getEventsForDay(date); //今日の日付に存在する全ての予定を配列にぶち込む
  if(0 < events.length) { //1週間後に予定があるのかを判断
    date = new Date(); //今日の日付の取得
    date.setHours(12);
    date.setMinutes(00);
  } 
}
