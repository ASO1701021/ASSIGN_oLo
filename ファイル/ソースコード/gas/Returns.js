function Remind() {
  
  var calendar = CalendarApp.getCalendarById('****************************************************');
  var date = new Date(); //今日の日付の取得
  var hour = date.getHours();
  var minute = date.getMinutes() + 10;
  //60超えを成形
  if(minute >= 60) {
    minute = minute - 60;
    hour = hour + 1;
  } 
  var events = calendar.getEventsForDay(date);
  var ms = ''
  for(var i = 0; i < events.length; i++){
    var startTime   = events[i].getStartTime(); //開始時刻の取得
    var startMinute = startTime.getMinutes();   //時の取得
    var startHour   = startTime.getHours();     //分の取得
    if (minute === startMinute && hour === startHour) {
      ms = events[i].getTitle();
      break;
    }
  }
  SendSlack(ms);
}

function RandCall() {
  var results=["スーツクリーニングした？","質問は用意してる？","持って行くものは準備できてる？",
               "靴はみがいた？","会社の事業内容は調べた？","場所と時間は確認した？"]; 
  var ms = results[Math.floor(Math.random()*6)];
  SendSlack(ms);
  
}

function Remind9() {
  var calendar = CalendarApp.getCalendarById('****************************************************');
  var date = new Date(); //今日の日付の取得
  var events = calendar.getEventsForDay(date);
  if(events.length == '0') {
    SendSlack9no()
  }
  else {
    var ms = '';
    var stt = '';
    var stm = '';
    var sth = '';
    for(var i = 0; i < events.length; i++){
      ms = events[i].getTitle(); 
      stt = events[i].getStartTime(); //開始時刻の取得
      sth = stt.getHours();           //時の取得
      stm = stt.getMinutes();         //分の取得
      if(stm <10) {
        stm = '0'+stm;
      }
      SendSlack9(ms,sth,stm);
    }
  }
}