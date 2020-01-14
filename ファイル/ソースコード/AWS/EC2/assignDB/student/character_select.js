$(function () {
    $("#btn_select").click(
        function () {
            data = {
                student_number: $('#student_number').val(),
            };

            json_data = JSON.stringify(data);

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
                    obj = JSON.parse(data);
                    console.log(obj);

                    obj = obj['data'][1];

                    $('#student_number').val(obj['student_number']);
                    $('#character_id').val(obj['character_id']);

                    $("#debug").text("取得が完了しました");

                })
                .catch(function (error) {
                    console.log(error);
                    $("#debug").text("取得に失敗しました");
                })

        });
});