var slackAccessToken = '****************************************************************************';

function SendSlack(message) {
  var slackApp = SlackApp.create(slackAccessToken);
  // メッセージ内容
  if('？' == message.slice(-1)){
    var ms = message
  }
  else {
    var ms = '10分後に"' + message + '"の予定があります';
  }
  // 対象チャンネル
  var channelId = "#slackbotテスト用";
  // その他の内容
  var options = {
  // 投稿するユーザーの名前
  username: "bot"
  }
  slackApp.postMessage(channelId, ms, options);
}

function SendSlack9(message,StartHour,StartMinute) {
  var slackApp = SlackApp.create(slackAccessToken);
  var ms = StartHour + ':' + StartMinute + 'から"' + message + '"の予定があります。';
  var channelId = "#slackbotテスト用";
  var options = {
    username: "bot"
  }
  slackApp.postMessage(channelId, ms, options);
   
}

function SendSlack9no(){
  var slackApp = SlackApp.create(slackAccessToken);
  var ms = '今日の予定はありません'
  var channelId = "#slackbotテスト用";
  var options = {
    username: "bot"
  }
  slackApp.postMessage(channelId, ms, options);
}
