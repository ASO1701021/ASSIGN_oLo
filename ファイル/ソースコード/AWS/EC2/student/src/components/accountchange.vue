<template>
    <div id="ac" class="account" style="font-size: 1.5rem">
        <p style="margin-bottom: 3%">アカウント管理</p>
        <div style="text-align: left; margin-left: 2rem;">
            <a>名前:</a><input v-model="name" placeholder="名前" /><br>
            <a>性別:</a><input v-model="sex" placeholder="性別"/><br>
            <a>年齢:</a><input v-model="age" placeholder="年齢"/><br>
            <a>所属１:</a><input v-model="belong1" placeholder="学校名"/><br>
            <a>所属２:</a><input v-model="belong2" placeholder="学科学年"/><br>
        </div>
        <a @click="change" class="button1">変更</a>
        <a href="/account" class="button2">キャンセル</a>
    </div>
</template>

<script>
export default {
  data () {
    return {
    }
  },
  methods: {
    change: function () {
      console.log(this.name)
      console.log(this.sex)
      console.log(this.age)
      console.log(this.belong1)
      console.log(this.belong2)
      // ここにデータベースのデータを書き換える処理
    }
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
    input{
        border:1px solid #333;
    }
</style>
