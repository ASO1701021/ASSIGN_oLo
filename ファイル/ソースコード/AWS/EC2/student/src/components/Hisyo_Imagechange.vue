<template class="box">
    <div id="app">
        <header>
            アカウント画像変更
        </header>
        <br>

        <!-- ここに画像を表示 -->
        <img class="img" src="../assets/hisyo1.png" width="110" />
        <img class="img" src="../assets/hisyo2.png" width="110" />
        <img class="img" src="../assets/hisyo3.png" width="110" />
        <br>
        <p><span id="span1"></span></p>
        <div id="proimg">
            <label><input type="radio" id="imgtxt1" name="radio" v-model="checkName" @change="imageup" value="a">秘書1</label>
            <label><input type="radio" id="imgtxt2" name="radio" v-model="checkName" @change="imageup" value="b">秘書2</label>
            <label><input type="radio" id="imgtxt3" name="radio" v-model="checkName" @change="imageup" value="c">秘書3</label>
        </div>
        <br>
        <p v-if="checkName === 'a'"><img class="img" src="../assets/hisyo1.png" width="200" /></p>
        <p v-if="checkName === 'b'"><img class="img" src="../assets/hisyo2.png" width="200" /></p>
        <p v-if="checkName === 'c'"><img class="img" src="../assets/hisyo3.png" width="200" /></p>

        <button type="button" @click="save()">変更を保存する</button>
        <input type="button" @click="dbConnect()" value="DB更新">

        <!--if (character_id === 0) {-->
            <!--checkName = 'a'-->
        <!--}-->
        <!--if (character_id === 1) {-->
        <!--checkName = 'b'-->
        <!--}-->
        <!--if (character_id === 2) {-->
        <!--checkName = 'c'-->
        <!--}-->

    </div>

</template>

<script>
export default {
  name: 'HisyoImagechange',
  data: function () {
    return {
      show: true,
      checkName: '',
      img: '',
      character_id: '',
      student_number: '19010001'
    }
  },

  methods: {
    imageup () {
      if (this.checkName === 'a') {
        this.img = '../assets/hisyo1.png'
        // this.character_id = '1'
      } else if (this.checkName === 'b') {
        this.img = '../assets/hisyo2.png'
        // this.character_id = '2'
      } else {
        this.img = '../assets/hisyo3.png'
        // this.character_id = '3'
      }
    },
    save: function (event) {
      this.checkName = event.target.value()
      return this.checkName
    },

    dbConnect: function () {
      const data = {
        student_number: this.student_number,
        character_id: this.character_id
      }
      const jsondata = JSON.stringify(data)
      fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/student/character_update.php', {
        method: 'POST',
        body: jsondata,
        headers: {
          'Content-Type': 'application/json'
        }
      })
        .then(function (response) {
          return response.json()
        })
        .then(function () {
          let obj = JSON.parse(data)
          console.log(obj)
        })
    }
  }
}
</script>

<style>
    div.box{
        width: 276px;
        height: 597px;
        padding: 0px;
        border: 1px solid #333333;
        border-radius: 10px;
    }
    /*#imgtxt1{*/
        /*display:block;*/
        /*floet:left;*/
        /*width: 130px;*/
        /*!*margin-right: auto;*!*/
    /*}*/
</style>
