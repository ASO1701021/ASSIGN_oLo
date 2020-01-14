<template>
    <div id="app">
        <!--ヘッダー-->
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

        <div style="border: 1px solid #cccccc; padding: 10px;">
            <table align="center">
                <tr>
                    <td width="22"><input v-model="job_offer_no" size="22" placeholder="求人No."></td><!--求人No.-->
                    <td width="15"><select v-model="district" name="district"><!--区分 -->
                        <option disabled value="">区分</option>
                        <option value="福岡校">福岡校</option>
                        <option value="北九州校">北九州校</option>
                    </select></td>
                    <td width="40"><input v-model="company_name" size="40" placeholder="企業名"></td>  <!-- 企業名-->
                    <td width="15"><select v-model="content" name="Content">                    <!--内容 -->
                        <option disabled value="">内容</option>
                        <option value="説明会">説明会</option>
                        <option value="セミナー">セミナー</option>
                        <option value="OB会">OB会</option>
                    </select></td>
                    <td width="20"><input v-model="briefing_date" size="20"></td><!--開催日-->
                    <vuejs-datepicker v-model="briefing_date" ></vuejs-datepicker>
                    <td width="40"><input type="text" size="40" placeholder="職種"></td>    <!--職種 -->
                    <td width="20"><input type="text" size="20" placeholder="対象"></td>    <!--対象 -->
                    <td width="10"><select name="International" id="International">        <!--留学生 -->
                        <option disabled selected value>留学生</option>
                        <option value="◯">◯</option>
                        <option value="×">×</option>
                    </select></td>
                    <td width="10"><select name="Disability" id="Disability">        <!--障がい者 -->
                        <option disabled selected value>障がい者</option>
                        <option value="◯">◯</option>
                        <option value="×">×</option>
                    </select></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div align="left" style="border: 2px solid #cccccc; padding: 10px; margin: 0 5% 5px 5%;">
            <table>
                <tr>
                    <th>開催時間</th>
                    <td>
                        <select name="Start_time" id="Start_time"><!-- 開始時間-->
                            <option disabled selected value>----</option>
                            <option v-for="start_hour of time" v-bind:key="start_hour.value">
                                {{start_hour.value}}
                            </option>
                        </select>
                        <span> 〜 </span>
                        <select name="last_time" id="last_time"><!-- 開始時間-->
                            <option disabled selected value>----</option>
                            <option v-for="last_hour of time" v-bind:key="last_hour.value">
                                {{last_hour.value}}
                            </option>
                        </select>
<!--                        <select name="Last_time" id="Last_time">-->
<!--                            <option disabled selected value>&#45;&#45;&#45;&#45;</option>-->
<!--                            <option v-for="last_hour of time" v-bind:key="last_hour.value">-->
<!--                                {{last_hour.value}}-->
<!--                            </option>-->
<!--                        </select>-->
                        <v-hour-minute></v-hour-minute>
                    </td>
                </tr>
                <tr>
                    <th>開催場所</th>
                    <td>
                        <input type="text" id="Briefing_place" size="40"><br><!--開催場所-->
                    </td>
                </tr>
                <tr>
                    <th>持参物</th>
                    <td>
                        <input type="text" id="Briefing_Bring" size="40"><br><!--持参物-->

                    </td>
                </tr>
                <tr>
                    <th>説明会入力〆切</th>
                    <td>
                        <input type="date" name="Deadline_year" id="Deadline_year"><!-- 説明会入力〆切 --> <!--〆切年 -->
<!--                        <vuejs-datepicker></vuejs-datepicker>-->
                    </td>
                </tr>
                <tr>
                    <th>受験確認入力〆切</th>
                    <td>
                        <input type="date" name="Exam_year" id="Exam_year"><!-- 受験確認入力〆切 --> <!--〆切年 -->
                    </td>
                </tr>
                <tr>
                    <th>勤務地</th>
                    <td>
                        <input type="text" id="Work_Location" size="20"><!--勤務地-->
                    </td>
                </tr>
                <tr>
                    <th>説明会参加数</th>
                    <td>
                        <input type="text" id="Briefing_Number" size="10"><!--説明会参加数--> <!-- DBから読み込む -->
                    </td>
                </tr>
                <tr>
                    <th>受験参加数</th>
                    <td>
                        <input type="text" id="Exam_Number" size="10"><!--受験参加数--> <!--DBから読み込む-->
                    </td>
                </tr>
                <tr>
                    <th>内定数</th>
                    <td>
                        <input type="text" id="Offer_Number" size="10"> <!--内定数--> <!--DBから読み込む-->
                    </td>
                </tr>
                <tr>
                    <th>備考</th>
                    <td>
                        <input type="text" id="Briefing_Remarks" size="150"><!--備考-->
                    </td>
                </tr>
            </table>
        </div>
        <input type="button" id="Briefing_Join" value="追加" style="position: absolute; right: 5%;">
    </div>
</template>

<script>
export default {
  name: 'briefing_add',
  props: {
    job_offer_no: Number,
    district: String,
    company_name: String,
    content: String,
    briefing_date: Date,
    occupation: String,
    target: String,
    international: String,
    disability: String
  },
  component: {
    props: {
      name: String,
      value: String
    }
  },
  data: function () {
    return {
      time: [
        {value: '8:00'},
        {value: '9:00'},
        {value: '10:00'},
        {value: '11:00'},
        {value: '12:00'},
        {value: '13:00'},
        {value: '14:00'},
        {value: '15:00'},
        {value: '16:00'},
        {value: '17:00'},
        {value: '18:00'},
        {value: '19:00'},
        {value: '20:00'},
        {value: '21:00'},
        {value: '22:00'}
      ]
    }
  }

}
</script>

<style scoped>

</style>
