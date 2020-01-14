<template>
  <div id="app">
    <div id="cp_offcm01">
      <input type="checkbox" id="cp_toggle01">
      <label for="cp_toggle01"><span></span></label>
      <div class="cp_menu" style="z-index: 99">
        <ul>
          <li><a href="/account">アカウント管理</a></li>
          <li><a href="/Hisyo">秘書キャラ画像変更</a></li>
          <li><a href="/Briefing">説明会一覧（登録・確認）</a></li>
          <li><a href="/schedulecheck">スケジュール確認</a></li>
          <li><a href="/ProofReading">文書チェック</a></li>
        </ul>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<script>
// const cp = document.getElementById('cp_offcm01')
let urlstr = location.href
console.log(urlstr)
if (urlstr === 'http://localhost:8080/') { console.log('succsess') }
// if (urlstr === 'http://localhost:8080/') {
//   cp.style.visibility = 'visible'
// } else { cp.style.visibility = 'hidden' }

export default {
  name: 'App'
}
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
  *, *:before, *:after {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  ol, ul {
    list-style: none;
  }
  a {
    text-decoration: none;
    color: inherit;
  }
  .cp_cont {
    height: 65vh;
  }
  #cp_offcm01 {
    position: absolute;
    top: 20px;
    right: 20px;
    display: inline-block;
  }
  /* menu */
  #cp_offcm01 .cp_menu {
    position: fixed;
    top: 0;
    right: -100vw;
    width: 250px;
    height: 100%;
    cursor: pointer;
    -webkit-transition: 0.53s transform;
    transition: 0.53s transform;
    -webkit-transition-timing-function: cubic-bezier(.38,.52,.23,.99);
    transition-timing-function: cubic-bezier(.38,.52,.23,.99);
    background-color: gray;
    opacity: 0.9;
  }
  #cp_offcm01 .cp_menu ul {
    margin: 0;
    padding: 0;
  }
  #cp_offcm01 .cp_menu li {
    list-style: none;
  }
  #cp_offcm01 .cp_menu li a {
    display: block;
    padding: 20px;
    text-decoration: none;
    color: #ffffff;
    border-bottom: 1px solid #ffffff;
  }

  #cp_offcm01 #cp_toggle01 {
    position: absolute;
    display: none;
    opacity: 0;
  }
  #cp_offcm01 #cp_toggle01:checked ~ .cp_menu {
    -webkit-transform: translateX(-100vw);
    transform: translateX(-100vw);
  }
  /* menu toggle */
  #cp_offcm01 #cp_toggle01 ~ label {
    display: block;
    padding: 0.5em;
    cursor: pointer;
    -webkit-transition: 0.5s transform;
    transition: 0.5s transform;
    -webkit-transition-timing-function: cubic-bezier(.61,-0.38,.37,1.27);
    transition-timing-function: cubic-bezier(.61,-0.38,.37,1.27);
    text-align: center;
    color: #333333;
  }
  #cp_offcm01 #cp_toggle01:checked ~ label {
    -webkit-transform: translateX(-250px);
    transform: translateX(-250px);
  }

  #cp_offcm01 #cp_toggle01 ~ label::before {
    content: '三';
    font-size: 2em
  }
  #cp_offcm01 #cp_toggle01:checked ~ label::before {
    content: '✖️';
  }
  /* contents */
  .cp_contents {
    color: #333333;
    text-align: center;
  }
</style>
