$(function () {
    $("#btn_update").click(
        function () {
            data = {
                student_number: $('#student_number').val(),
                character_id: $('#character_id').val(),
            };

            json_data = JSON.stringify(data);

            fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/student/character_update.php', {
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
                    $("#debug").text("更新が完了しました");
                })
                .catch(function (error) {
                    // document.getElementById('result').textContent = error;
                    $("#debug").text("更新に失敗しました");
                })

        });
});