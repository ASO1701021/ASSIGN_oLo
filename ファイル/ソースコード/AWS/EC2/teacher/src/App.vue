<template>
  <div id="app">
    <meta charset="UTF-8">
    <div id="header">
<!--      <router-link></router-link>-->
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
    export default {
        name: 'app',
        data:function(){
            return{
                briefings:[],
                students:[],
            }
        },
        // created(){
        //     let hoge = this;
        //     fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/all_post.php')
        //         .then(function(response) {
        //             return response.json();
        //         })
        //         .then(function(res) {
        //             console.log(res);
        //             // let obj=JSON.parse(res);
        //             // const obj_data = obj['data'];
        //             const obj_data = res['data'];
        //             console.log(obj_data);
        //             obj_data.forEach(data => {
        //                 let briefing_item = {
        //                     event_number: data['event_number'],
        //                     finish_flg: data['finish_flg'],
        //                     division: data['division'],
        //                     joboffer_number: data['joboffer_number'],
        //                     event_date:data['event_date'],
        //                     start_time:data['start_time'],
        //                     finish_time: data['finish_time'],
        //                     company_name:data['company_name'],
        //                     venue:data['venue'],
        //                     occupation:data['occupation'],
        //                     content:data['content'],
        //                     bring_item:data['bring_item'],
        //                     briefing_deadline:data['briefing_deadline'],
        //                     exam_deadline:data['exam_deadline'],
        //                     workplace:data['workplace'],
        //                     briefing_number:data['briefing_number'],
        //                     exam_number:data['exam_number'],
        //                     offer_number:data['offer_number'],
        //                     target:data['target'],
        //                     international_flg:data['international_flg'],
        //                     disability_flg:data['disability_flg'],
        //                     supplementary:data['supplementary'],
        //                     update_date:data['update_date'],
        //                 };
        //                 // console.log(briefing_item)
        //                 hoge.briefings.push(briefing_item)
        //             });
        //         })
        // }
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

  body{
    margin: 0;
  }

  ul{
    list-style-type: none;
    padding: 0;
  }
  li{
    display: inline-block;
    margin: 0 10px;
  }
</style>
