window.onload = function () {
  var url = 'https://slack.com/api/oauth.access'
  var client_id = '741763675202.861812900708'
  var client_secret = 'c67fcb891e90add1c119301dc8edf566'

  var get = GetQueryString()
  var code = get['code']
  var get_url = url + '?code=' + code + '&client_id=' + client_id + '&client_secret=' + client_secret

  fetch(get_url, {
    method: 'GET'
  })
    .then(function (response) {
      return response.text()
    })
    .then(function (data) {
      console.log(JSON.stringify(data))
      obj = JSON.parse(data)
      console.log(obj)

      localStorage.setItem('student_number', obj['user']['email'].substr(0, 7))
      console.log(localStorage.getItem('student_number'))
    })
    .catch(function (error) {
      // $("#span1").text("データを取得できませんでした");
      console.log(error)
    })

  function GetQueryString () {
    var result = {}
    if (window.location.search.length > 1) {
      // 最初の1文字 (?記号) を除いた文字列を取得する
      var query = window.location.search.substring(1)

      // クエリの区切り記号 (&) で文字列を配列に分割する
      var parameters = query.split('&')

      for (var i = 0; i < parameters.length; i++) {
        // パラメータ名とパラメータ値に分割する
        var element = parameters[i].split('=')

        var paramName = decodeURIComponent(element[0])
        var paramValue = decodeURIComponent(element[1])

        // パラメータ名をキーとして連想配列に追加する
        result[paramName] = paramValue
      }
    }
    return result
  }
}
