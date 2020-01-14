window.onload = function () {
// ページ読み込み時に実行したい処理

    post_data = {
        'student_number': 1901001
    };

    json_data = JSON.stringify(post_data);

    fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/student_personal_post.php', {
        method: 'POST',
        body: json_data,
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            console.log(JSON.stringify(data));
            obj = JSON.parse(data);
            console.log(obj);
            $("#span1").text(obj);
        })
        .catch(function (error) {
            // $("#span1").text("データを取得できませんでした");
            console.log(error)
        })

};