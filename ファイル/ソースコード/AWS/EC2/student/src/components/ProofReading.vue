
<template>
    <div>
        <h1>文章校正</h1>
        <p>自己PRなどの添削したい文章の写真から、怪しい部分を赤くして指摘します。</p>

        <input type="file" class="file_input" name="image" @change="onFileChange" accept="image/*"/>
        <br>
        <textarea id="main_text" name="post_sentence" rows="10" cols="60"
                  placeholder="ここに写真から取り込んだテキストが入力されます"></textarea>
        <br>
        <button @click="sentence_post">文章送信</button>
        <p>取得状況:<span id="span1"></span></p>
        <p>入力した文章:<span id="text_input"></span></p>
        <p>添削した文章:<span id="text_proofreading"></span></p>
    </div>
</template>

<script>
export default {
  data () {
    return {
    }
  },
  methods: {
    onFileChange (e) {
      alert('写真を送信します')
      document.getElementById('span1').innerHTML = '写真の送信中です'
      let files = e.target.files || e.dataTransfer.files
      this.createImage(files[0])
    },
    createImage (file) {
      let fr = new FileReader()
      fr.onload = function (evt) {
        let base64temp = evt.target.result.split(',')
        let base64file = base64temp[1]
        let data = {
          'image_base64': base64file
        }
        let jsondata = JSON.stringify(data)

        fetch('https://40u3qp7rhb.execute-api.us-east-1.amazonaws.com/default/nakaocr', {
          method: 'POST',
          body: jsondata,
          headers: {
            'Content-Type': 'application/json'
          }
        })
          .then(function (response) {
            return response.text()
          })
          .then(function (data) {
            let obj = JSON.parse(data)
            // eslint-disable-next-line no-console

            let btext = obj['responses'][0]['fullTextAnnotation']['text']
            let rtext = btext.replace(/\r?\n/g, '')

            // eslint-disable-next-line no-console
            console.log(rtext)
            document.getElementById('main_text').value = rtext
            document.getElementById('span1').innerHTML = '写真の読み込み完了'
          })
          .catch(function (error) {
            // eslint-disable-next-line no-console
            console.log(error)
            document.getElementById('span1').innerHTML = 'データを取得できませんでした'
          })
      }
      fr.readAsDataURL(file)
    },
    sentence_post () {
      alert('文章を送信します')
      document.getElementById('span1').innerHTML = 'データ取得中です'
      let data = {
        post_sentence: document.getElementById('main_text').value
      }
      let jsondata = JSON.stringify(data)

      fetch('https://i3se9zbaie.execute-api.us-east-1.amazonaws.com/default/ProofreadingZIP', {
        method: 'POST',
        body: jsondata,
        headers: {
          'Content-Type': 'application/json'
        }
      })
        .then(function (response) {
          return response.text()
        })
        .then(function (data) {
          let obj = JSON.parse(data)
          document.getElementById('text_input').textContent = obj['inputSentence']

          let textchecked1 = obj['checkedSentence'].replace(/\s+/g, '').replace(/<{2}/g, '<span style="color:#ff0000;">')
          let textchecked2 = textchecked1.replace(/>{2}/g, '</span>')
          // document.getElementById('text_proofreading').textContent = textchecked2;
          let greet = document.getElementById('text_proofreading')
          greet.innerHTML = textchecked2
          // eslint-disable-next-line no-console
          console.log(textchecked2)
          // eslint-disable-next-line no-console
          console.log(data)
          // eslint-disable-next-line no-console
          console.log(obj['checkedSentence'])

          document.getElementById('span1').innerHTML = 'データを取得しました'
        })
        .catch(function (error) {
          // eslint-disable-next-line no-console
          console.log(error)
          document.getElementById('span1').innerHTML = 'データを取得できませんでした'
        })
    }
  }
}
</script>

<style scoped>

</style>
