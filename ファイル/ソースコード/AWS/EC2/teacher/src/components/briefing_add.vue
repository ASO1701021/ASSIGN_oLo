<template>
    <div id="app">

        <!--ヘッダー-->

        <table border="1" width="100%">
            <tr>
                <th>
                    <router-link to="/student_user">ユーザー管理</router-link>
                </th>
                <th>
                    <router-link to="/briefings_list">説明会管理</router-link>

                </th>
            </tr>
            <tr>
                <td colspan="2" class="colspan">
                    <router-link to="/briefings_list">説明会管理</router-link>
                    &nbsp;&nbsp;&nbsp;
                    <router-link to="/calendar">カレンダー</router-link>
                    <router-link to="/briefing_add" style="position: absolute; right: 15%;">新規説明会追加</router-link>
<!--                    <input type="button" value="スプレッドシート更新" id="updateButton" style="position: absolute; right: 5%">-->
                </td>
            </tr>
        </table>
        <hr>

        <!--body-->

        <div id="insert_data_area">
            <table>
                <tr v-for="(value,key) in rows">
                    <th>{{value}}</th>
                    <td><input v-model="briefing[key]"></td>
                </tr>
                <button id="insert_data_btn" v-on:click="data_insert(briefing)">追加</button>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        name: "briefing_add",
        data:function(){
            let rows = {
                joboffer_number:'求人No.',
                division:'区分',
                company_name:'企業名',
                content:'内容',
                event_date:'開催日時',
                occupation:'職種',
                target:'対象',
                international_flg:'留学生',
                disability_flg:'障がい者',
                start_time:'開始時間',
                finish_time:'終了時間',
                venue:'開催場所',
                bring_item:'持参物',
                briefing_deadline:'説明会〆切',
                exam_deadline:'受験〆切',
                workplace:'勤務地',
                briefing_number:'説明会参加者数',
                exam_number:'受験者数',
                offer_number:'内定数',
                supplementary:'備考',
            };
            let insert_briefing = {
                finish_flg: 0,
                division: '福岡校',
                joboffer_number: '1739867',
                event_date: '2020-03-04',
                start_time: '10:00:00',
                finish_time: '12:00:00',
                company_name: 'JK株式会社',
                venue: '201',
                occupation: 'SE',
                content: '説明会',
                bring_item: '特になし',
                briefing_deadline: '2020-01-07',
                exam_deadline: '2020-01-07',
                workplace: '東京',
                briefing_number: 0,
                exam_number: 0,
                offer_number: 0,
                target: '情報系',
                international_flg: 1,
                disability_flg: 1,
                supplementary: '会社概要etc...',
            };
            return{
                rows:rows,
                briefing:[],
                insert_briefing:insert_briefing,
            }
        },
        methods:{
            data_insert:function (array) {
                this.insert_briefing = {
                    finish_flg:0,
                    division:array.division,
                    joboffer_number:array.joboffer_number,
                    event_date:array.event_date,
                    start_time:array.start_time,
                    finish_time:array.finish_time,
                    company_name:array.company_name,
                    venue:array.venue,
                    occupation:array.occupation,
                    content:array.content,
                    bring_item:array.bring_item,
                    briefing_deadline:array.briefing_deadline,
                    exam_deadline:array.exam_deadline,
                    workplace:array.workplace,
                    briefing_number:array.briefing_number,
                    exam_number:array.exam_number,
                    offer_number:array.offer_number,
                    target:array.target,
                    international_flg:array.international_flg,
                    disability_flg:array.disability_flg,
                    supplementary:array.supplementary,
                };
                console.log(this.insert_briefing);
                const json_data = JSON.stringify(this.insert_briefing);
                fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/event/event_insert.php',{
                    method:'POST',
                    body:json_data,
                    headers:{'Content-Type':'application'}
                })
                    .then(function (response){
                        return response.json();
                    })
                    .then(function (data) {
                        console.log(data);
                        // let obj = JSON.parse(data);
                        // console.log(obj);
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>

<style scoped>
    div #insert_data_area{
        border: 2px solid #cccccc;
        padding: 10px;
        margin: 0 5% 5px 5%;
    }
    input #insert_data_btn{
        margin-right: 5%;
    }

</style>