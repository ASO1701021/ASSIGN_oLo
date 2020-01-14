<template>

    <div id="app">

        <!--header-->

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
                    <button>
                        <router-link to="/briefings_list">説明会管理</router-link>
                    </button>
                    <button>
                        <router-link to="/calendar">カレンダー</router-link>
                    </button>
                    <button style="position: absolute; right: 15%;">
                        <router-link to="/briefing_add">新規説明会追加</router-link>
                    </button>
                </td>
            </tr>
        </table>
        <hr>

        <!--body-->

        <table>
            <tr v-for="(value,key) in rows">
                <th>{{value}}</th>
                <td><input v-model="briefing[key]"></td>
            </tr>
            <button @click="click_update(briefing)">更新</button>
        </table>

    </div>
</template>

<script>
    export default {
        name: "briefing_update",
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

            return{
                briefing:[],
                rows:rows,
            }
        },

        methods:{
            click_update:function(array) {
                // alert(array);
                let update_briefing = {
                    event_number:array.event_number,
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
                console.log(update_briefing);
                const json_data = JSON.stringify(update_briefing);
                fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/event/event_update.php',{
                    method:'POST',
                    body:json_data,
                    headers:{'Content-Type':'application'}
                })
                    .then(function (response){
                        return response.json();
                    })
                    .then(function (data) {
                        console.log(data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                alert("更新しました。");
                window.location.href = '/#/briefings_list'
            },
        },

        created(){
            let briefing_id = Number(this.$route.query.id);
            console.log(briefing_id);

            let hoge = this;
            console.log(hoge);
            let data = {
                event_number:briefing_id
            };

            let json_data = JSON.stringify(data);
            fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/event/event_select.php',
                {
                    method:'POST',
                    body: json_data,
                    headers: {'Content-Type':'application/json'}
                })
                .then(function(response) {
                    console.log(response);
                    return response.json();
                })
                .then(function(res) {
                    console.log(res);
                    let briefing_item = {
                        event_number: res.event_number,
                        finish_flg: res.finish_flg,
                        division: res.division,
                        joboffer_number: res.joboffer_number,
                        event_date: res.event_date,
                        start_time: res.start_time,
                        finish_time: res.finish_time,
                        company_name: res.company_name,
                        venue: res.venue,
                        occupation: res.occupation,
                        content: res.content,
                        bring_item: res.bring_item,
                        briefing_deadline: res.briefing_deadline,
                        exam_deadline: res.exam_deadline,
                        workplace: res.workplace,
                        briefing_number: res.briefing_number,
                        exam_number: res.exam_number,
                        offer_number: res.offer_number,
                        target: res.target,
                        international_flg: res.international_flg,
                        disability_flg: res.disability_flg,
                        supplementary: res.supplementary,
                        update_date: res.update_date,
                    };
                    console.log(briefing_item);
                    hoge.briefing = briefing_item;
                    console.log(hoge.briefing)
                });
        },
    }
</script>

<style scoped>

</style>