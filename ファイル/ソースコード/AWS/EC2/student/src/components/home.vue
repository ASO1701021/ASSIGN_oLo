<template>
  <div class="hello">
    <p style="font-size: xx-large; margin: 3%">就活支援</p>
    <p style="margin: 5%">{{username}}</p>
    <img src="../assets/job_hisyo.png" width="200" >
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      username: ''
    }
  },
  created () {
    let username = this
    let code = this.$route.query.code
    let url = 'https://slack.com/api/oauth.access'
    let clientid = '741763675202.861812900708'
    let clientsecret = 'c67fcb891e90add1c119301dc8edf566'
    let geturl = url + '?code=' + code + '&client_id=' + clientid + '&client_secret=' + clientsecret
    fetch(geturl, {
      method: 'GET'
    })
      .then(function (response) {
        return response.text()
      })
      .then(function (data) {
        console.log(JSON.stringify(data))
        data = JSON.parse(data)
        console.log(data)
        localStorage.setItem('student_number', data['user']['email'].substr(0, 7))
        console.log(typeof parseInt(localStorage.getItem('student_number'), 10))
        const student = {
          'student_number': parseInt(localStorage.getItem('student_number'), 10)
        }
        const jsondata = JSON.stringify(student)
        fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/student_personal_post.php', {
          method: 'POST',
          body: jsondata,
          headers: {
            'Content-Type': 'application/json'
          }
        })
          .then(function (response) {
            console.log(response)
            return response.json()
          })
          .then(function (data) {
            console.log(data)
            username.username = data['data'][0]['student_name']
            // let obj = JSON.parse(data)
            // console.log(obj)
          })
      })
      .catch(function (error) {
        // $("#span1").text("データを取得できませんでした");
        console.log('ここに入ったよ')
        console.log(error)
        window.location.href = 'http://localhost:8080/'
      })
    console.log('test')
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
