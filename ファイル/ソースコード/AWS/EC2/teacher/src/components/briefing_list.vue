<template>
    <div id="app">
        <!--header-->
        <table border="1" width="100%">
            <tr>
                <th>
                    <router-link to="/student_user">ユーザー管理</router-link>
                </th>
                <th>
                    <router-link to="/briefing_list">説明会管理</router-link>
                </th>
            </tr>
            <tr>
                <td colspan="2" class="colspan">
                    <router-link to="/briefing_list">説明会管理</router-link>
                    &nbsp;&nbsp;&nbsp;
                    <router-link to="/calendar">カレンダー</router-link>
                    <router-link to="/briefing_add" style="position: absolute; right: 15%;">新規説明会追加</router-link>
                    <input type="button" value="スプレッドシート更新" id="updateButton" style="position: absolute; right: 5%">
                </td>
            </tr>
        </table>
        <hr>

        <!--body-->
        <input @change="fileChange" type="file" id="file_input_expense" name="file_input_expense">

        <input type="text" v-model="searchWord" placeholder="キーワード検索">

        <table align="center">
            <thead>
            <tr>
                <th v-for="(value,key) in columns" @click="sortBy(key)">
                    {{value}}
                    <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span>
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr id="table_record" v-for="worker in filteredBriefings">
                <td v-for="(value,key) in columns">
                    <input v-model="worker[key]">
                </td>
                <td><button v-on:click="alert_number(worker)">更新</button></td>
            </tr>
            </tbody>
        </table>
<!--        <vue-good-table :columns="columns" :rows="briefings"></vue-good-table>-->

    </div>
</template>

<script>
    export default {
        name: "briefing_list",
        data: function() {
            let columns = {
                job_offer_no:'求人No.',
                district:'区分',
                company_name:'企業名',
                content:'内容',
                briefing_date:'開催日時',
                occupation:'職種',
                target:'対象',
                international:'留学生',
                disability:'障がい者',
            };

            // const columns = [
            //         {
            //             label:'求人No.',
            //             field:'job_offer_no',
            //             type:'number',
            //         },
            //         {
            //             label:'区分',
            //             field:'district',
            //         },
            //         {
            //             label:'企業名',
            //             field:'company_name',
            //         },
            //         {
            //             label:'内容',
            //             field:'content',
            //         },
            //         {
            //             label:'開催日時',
            //             field:'briefing_date',
            //             type:'date',
            //             dateInputFormat:'yyyy/MM/dd',
            //             dateOutputFormat:'yyyy-MM-dd',
            //         },
            //         {
            //             label:'職業',
            //             field:'occupation',
            //         },
            //         {
            //             label:'対象',
            //             field:'target',
            //         },
            //         {
            //             label:'留学生',
            //             field:'international',
            //             type:'boolean',
            //         },
            //         {
            //             label:'障がい者',
            //             field:'disability',
            //             type:'boolean',
            //         }
            //     ];

            let sortOrders = {};
            Object.keys(columns).forEach(function (key) {
                sortOrders[key] = 1
            });

            return{
                columns:columns,

                searchWord:'',
                briefings:[],
                sortKey:'',
                sortOrders:sortOrders
            }
        },
        methods: {
            sortBy: function (key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
            },
            fileChange: function(e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                let briefings = [];
                const loadFunc = () => {
                    const lines = reader.result.split("\n");
                    lines.forEach(element => {
                        const workerData = element.split(",");
                        if (workerData.length !== 25) return;
                        const worker = {
                            autoincrement_no: workerData[0],
                            fin_flg: workerData[1],
                            district: workerData[2],
                            job_offer_no: workerData[3],
                            briefing_year: workerData[4],
                            briefing_month: workerData[5],
                            briefing_day: workerData[6],
                            briefing_date: workerData[4]+'/'+workerData[5]+'/'+workerData[6],
                            start_time: workerData[7],
                            finish_time: workerData[8],
                            company_name: workerData[9],
                            briefing_place: workerData[10],
                            occupation: workerData[11],
                            content: workerData[12],
                            bring_item: workerData[13],
                            briefing_deadline: workerData[14],
                            exam_deadline: workerData[15],
                            company_place: workerData[16],
                            briefing_number: workerData[17],
                            exam_number: workerData[18],
                            internal_constant: workerData[19],
                            target: workerData[20],
                            international: workerData[21],
                            disability: workerData[22],
                            company_info: workerData[23],
                            last_updated: workerData[24],
                        };
                        briefings.push(worker);
                    });
                    this.briefings = briefings;
                };
                reader.onload = loadFunc;
                reader.readAsText(file)
            },

            // 連番表示アラート
            alert_number:function (array) {
                alert("連番は" + array.autoincrement_no)
            }
        },
        computed:{
            filteredBriefings:function(){
                let data = this.briefings;

                let sortKey = this.sortKey;
                let order = this.sortOrders[sortKey] || 1;

                let filterWord = this.searchWord && this.searchWord.toLowerCase();

                if(filterWord){
                    data = data.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return String(row[key]).toLowerCase().indexOf(filterWord) > -1
                        })
                    })
                }

                if(sortKey){
                    data = data.slice().sort(function (a,b) {
                        a = a[sortKey];
                        b = b[sortKey];
                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    })
                }
                return data;
            }
        }
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