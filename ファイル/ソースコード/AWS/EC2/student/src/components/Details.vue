<template>
        <div id="details">
            <span id="title">詳細</span>
            <slot name="message"></slot>
            <p>[日にち]</p>
            <span id="Date"></span>
            <p>[時間]</p>
            <span id="Time"></span>
            <p>[企業名]</p>
            <span id="Company"></span>
            <p>[職種]</p>
            <span id="Occupation"></span>
            <p>[内容]</p>
            <span id="Content"></span>
            <p>[開催場所]</p>
            <span id="Place"></span>
            <p>[持参物]</p>
            <span id="Bring"></span>
            <p>[説明会入力〆切]</p>
            <span id="Deadline"></span>
            <p>[勤務地]</p>
            <span id="Worklocation"></span>
            <p>[対象]</p>
            <span id="Target"></span>
            <p>[留学生]</p>
            <span id="International"></span>
            <p>[障がい者]</p>
            <span id="Disability"></span>
            <p>[会社情報など]</p>
            <span id="Information"></span>
            <p></p>
        </div>
</template>

<script>
// import Briefing from 'Briefing.vue';

export default {
  name: 'Details.vue',
  // conponents: {
  //     Briefing
  // },
  created () {
    let getid = this.$route.query.q
    console.log(getid)

    fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/all_post.php')
      .then(function (response) {
        return response.text()
      })
      .then(function (data) {
        let i = getid
        console.log(JSON.stringify(data))
        let obj = JSON.parse(data)
        let rdata = obj['data']
        document.getElementById('Date').textContent = rdata[i]['event_date']
        document.getElementById('Time').textContent = rdata[i]['start_time']
        document.getElementById('Company').textContent = rdata[i]['company_name']
        document.getElementById('Occupation').textContent = rdata[i]['occupation']
        document.getElementById('Content').textContent = rdata[i]['content']
        document.getElementById('Place').textContent = rdata[i]['venue']
        document.getElementById('Bring').textContent = rdata[i]['bring_item']
        document.getElementById('Deadline').textContent = rdata[i]['briefing_deadline']
        document.getElementById('Worklocation').textContent = rdata[i]['workplace']
        document.getElementById('Target').textContent = rdata[i]['target']
        if (rdata[i]['international_flg'] === '0') {
          document.getElementById('International').textContent = '不可'
        } else if (rdata[i]['international_flg'] === '1') {
          document.getElementById('International').textContent = '可'
        } else {
          document.getElementById('International').textContent = '不明'
        }

        if (rdata[i]['disability_flg'] === '0') {
          document.getElementById('Disability').textContent = '不可'
        } else if (rdata[i]['disability_flg'] === '1') {
          document.getElementById('Disability').textContent = '可'
        } else {
          document.getElementById('Disability').textContent = '不明'
        }
        document.getElementById('Information').textContent = rdata[0]['supplementary']
      })
  }
}
</script>

<style scoped>
    /* スマホサイズにカスタマイズ */
    div.box {
        width: 276px;
        height: 597px;
    }

    /*詳細本文*/
    div p {
        font-size: 10px;
    }

    /*googlemap*/
    #maplink {
        font-size: 10px;
    }

    div#details {
        padding: 0px;
        border: 1px solid #333333;
        border-radius: 10px;
        width: 200px;
    }

    p#title {
        text-align: center;
        font-size: 20px
    }
</style>
