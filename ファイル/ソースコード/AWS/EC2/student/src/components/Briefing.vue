<template>
    <div class="box" align="center">
        <p id="title">説明会一覧</p>
        <table>
            <tbody>
            <tr v-for="item in datas" v-bind:key="item.id" >
                <td>{{ item.company_name }}
                    <router-link v-bind:to="{path:'Details',query:{q:item.id}}">詳細</router-link>
                </td>
            </tr>
            </tbody>
        </table>
        <!--</ul>-->
        <router-link to="/Join">新規登録</router-link>
    </div>
</template>
<script>
export default {
  name: 'Briefing.vue',
  data () {
    return {
      datas: []
    }
  },
  created () {
    let brdata = this
    fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/all_post.php')
      .then(function (response) {
        return response.text()
      })
      .then(function (data) {
        let obj = JSON.parse(data)
        let rdata = obj['data']
        for (let i in rdata) {
          console.log(rdata[i]['company_name'])
          brdata.datas.push({
            id: i,
            company_name: rdata[i]['company_name'],
            dataid: rdata[i]['event_number']
          })
        }
      })
  }
}
</script>
<style scoped>
    #title{
        text-align: center;
        color: gray;
    }
    table, th, td {
        border-spacing: 0 10px;
        text-align: center;
        color: gray;
    }
    td{border-top: solid 1px;border-bottom:solid 2px; width: 200px; padding: 15px; border-color: gray}
    td{border-radius: 15px 15px 15px 15px ; border-left:solid 1px; border-right:solid 1px; border-color: gray}
</style>
