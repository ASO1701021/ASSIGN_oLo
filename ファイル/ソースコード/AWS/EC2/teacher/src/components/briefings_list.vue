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
<!--        {{briefings}}-->

        <vue-good-table :columns="columns"
                        :rows="briefings"
                        :search-options="{enabled: true,placeholder: 'Search this table',}"
                        @on-row-dblclick="click_alert">
        </vue-good-table>

    </div>
</template>

<script>
    export default {
        name: "briefings_list",
        data:function(){
            const columns = [
                {
                    label:'求人No.',
                    field:'joboffer_number',
                    type:'number',
                },
                {
                    label:'区分',
                    field:'division',
                },
                {
                    label:'企業名',
                    field:'company_name',
                },
                {
                    label:'内容',
                    field:'content',
                },
                {
                    label:'開催日時',
                    field:'event_date',
                    type:'date',
                    dateInputFormat:'yyyy-MM-dd',
                    dateOutputFormat:'yyyy/MM/dd',
                },
                {
                    label:'職業',
                    field:'occupation',
                },
                {
                    label:'対象',
                    field:'target',
                },
                {
                    label:'留学生',
                    field:'international_flg',
                    type:'boolean',
                },
                {
                    label:'障がい者',
                    field:'disability_flg',
                    type:'boolean',
                },
                // {
                //     label:'更新',
                //     field:'update_btn',
                // }
            ];

            return {
                briefings:[],
                columns:columns,
            }
        },
        methods:{
            click_alert:function(param){
                // alert(param.row.event_number);
                let row_data = param.row;
                let test = '/#/briefing_update?id=' + row_data.event_number;
                window.location.href = test;
            },
        },

        computed:{

        },

        created(){
            let hoge = this;
            console.log(hoge);
            fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/all_post.php')
                .then(function(response) {
                    return response.json();
                })
                .then(function(res) {
                    const obj_data = res['data'];
                    console.log(obj_data);
                    obj_data.forEach(data => {
                        let briefing_item = {
                            event_number: data['event_number'],
                            finish_flg: data['finish_flg'],
                            division: data['division'],
                            joboffer_number: data['joboffer_number'],
                            event_date:data['event_date'],
                            start_time:data['start_time'],
                            finish_time: data['finish_time'],
                            company_name:data['company_name'],
                            venue:data['venue'],
                            occupation:data['occupation'],
                            content:data['content'],
                            bring_item:data['bring_item'],
                            briefing_deadline:data['briefing_deadline'],
                            exam_deadline:data['exam_deadline'],
                            workplace:data['workplace'],
                            briefing_number:data['briefing_number'],
                            exam_number:data['exam_number'],
                            offer_number:data['offer_number'],
                            target:data['target'],
                            international_flg:data['international_flg'],
                            disability_flg:data['disability_flg'],
                            supplementary:data['supplementary'],
                            update_date:data['update_date'],
                        };
                        hoge.briefings.push(briefing_item)
                    });

                })

        },
    }
</script>

<style scoped>
    table{
        border-collapse: collapse;
    }
    tr{
        border: solid 1px gray;
    }
</style>