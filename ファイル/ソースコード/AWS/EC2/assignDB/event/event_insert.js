$(function () {
    $("#btn_insert").click(
        function () {
            data = {
                // event_number: $('#event_number').val(),
                finish_flg: $('#finish_flg').val(),
                division: $('#division').val(),
                joboffer_number: $('#joboffer_number').val(),
                event_date: $('#event_date').val(),

                start_time: $('#start_time').val(),
                finish_time: $('#finish_time').val(),
                company_name: $('#company_name').val(),
                venue: $('#venue').val(),
                occupation: $('#occupation').val(),
                content: $('#content').val(),

                bring_item: $('#bring_item').val(),
                briefing_deadline: $('#briefing_deadline').val(),
                exam_deadline: $('#exam_deadline').val(),
                workplace: $('#workplace').val(),
                briefing_number: $('#briefing_number').val(),

                exam_number: $('#exam_number').val(),
                offer_number: $('#offer_number').val(),
                target: $('#target').val(),
                international_flg: $('#international_flg').val(),
                disability_flg: $('#disability_flg').val(),

                supplementary: $('#supplementary').val(),
                update_date: $('#update_date').val()
            };

            json_data = JSON.stringify(data);

            fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/event/event_insert.php', {
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
                    $("#debug").text("追加が完了しました");
                })
                .catch(function (error) {
                    // document.getElementById('result').textContent = error;
                    $("#debug").text("追加に失敗しました");
                })

        });
});