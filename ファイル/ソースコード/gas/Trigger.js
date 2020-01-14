function setTriggera(date) { 
    //指定した時間後に"Returns"を実行
    ScriptApp.newTrigger("Remind").timeBased().at(date).create();
  }
  
  function setTriggerb(date) { 
    //指定した時間後に"Returns"を実行
    ScriptApp.newTrigger("RandCall").timeBased().at(date).create();
  }
  
  function setTriggerc(date) {
    //指定した時間後に"Returns"を実行
    ScriptApp.newTrigger("Remind9").timeBased().at(date).create();
  }
  
  //その日のトリガーを削除する関数(消さないと残る)
  function deleteTrigger() {
    var triggers = ScriptApp.getProjectTriggers();
    for(var i=0; i < triggers.length; i++) {
      if (triggers[i].getHandlerFunction() == "Remind" || triggers[i].getHandlerFunction() == "RandCall" || triggers[i].getHandlerFunction() == "Remind9") {
        ScriptApp.deleteTrigger(triggers[i]);
      }
    }
  }
  