<template>
  <div id="ac" class="account" style="font-size: 1.5rem">
    <p style="margin-bottom: 3%">アカウント管理</p>
    <div style="text-align: left; margin-left: 2rem;">
      <p>名前:{{name}}</p>
      <p>性別:{{sex}}</p>
      <p>年齢:{{age}}</p>
      <p>学科:{{belong1}}</p>
      <p>学年:{{belong2}}</p>
    </div>
      <a href="/accountchange" class="button1">変更</a>
      <a href="" class="button2">戻る</a>
  </div>
</template>

<script>
export default {
  data () {
    return {
      name: '',
      sex: '',
      age: '',
      belong1: '',
      belong2: ''
    }
  },
  created () {
    let userinfo = this
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
        console.log('fefiaweofhowefhwiaej')
        console.log(data)
        userinfo.name = data['data'][0]['student_name']
        userinfo.sex = data['data'][0]['student_sex']
        userinfo.age = data['data'][0]['student_age']
        userinfo.belong1 = data['data'][0]['student_belong']
        userinfo.belong2 = data['data'][0]['student_grade'] + '年'
        // let obj = JSON.parse(data)
        // console.log(obj)
      })
  }
}
</script>
<style>
  .button1 {
    width:200px;
    font-size:1rem;
    text-decoration:none;
    display:block;
    text-align:center;
    padding:8px 0 10px;
    border:1px solid #333;
    color:#fff;
    background-color:#49a9d4;
    border-radius: 25px;
    margin-top: 13rem;
    margin-left: auto;
    margin-right: auto;
  }
  .button2 {
    width:200px;
    font-size:1rem;
    text-decoration:none;
    display:block;
    text-align:center;
    padding:8px 0 10px;
    border:1px solid #333;
    border-radius: 25px;
    margin-top: 2rem;
    margin-left: auto;
    margin-right: auto;
    bottom: 2rem;
  }
</style>
