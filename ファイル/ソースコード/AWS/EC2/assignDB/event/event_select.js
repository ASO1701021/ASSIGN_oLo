$(function () {
    $("#btn_select").click(
        function () {
            data = {
                event_number: $('#event_number').val(),
            };

            json_data = JSON.stringify(data);

            fetch('http://ec2-18-177-93-10.ap-northeast-1.compute.amazonaws.com/assignDB/event/event_select.php', {
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
                    // console.log(obj['event_number']);
                    // console.log(obj['venue']);

                    $('#event_number').val(obj['event_number']);
                    $('#finish_flg').val(obj['finish_flg']);
                    $('#division').val(obj['division']);
                    $('#joboffer_number').val(obj['joboffer_number']);
                    $('#event_date').val(obj['event_date']);

                    $('#start_time').val(obj['start_time']);
                    $('#finish_time').val(obj['finish_time']);
                    $('#company_name').val(obj['company_name']);
                    $('#venue').val(obj['venue']);
                    $('#occupation').val(obj['occupation']);

                    $('#content').val(obj['content']);
                    $('#bring_item').val(obj['bring_item']);
                    $('#briefing_deadline').val(obj['briefing_deadline']);
                    $('#exam_deadline').val(obj['exam_deadline']);
                    $('#workplace').val(obj['workplace']);

                    $('#briefing_number').val(obj['briefing_number']);
                    $('#exam_number').val(obj['exam_number']);
                    $('#offer_number').val(obj['offer_number']);
                    $('#target').val(obj['target']);
                    $('#international_flg').val(obj['international_flg']);

                    $('#disability_flg').val(obj['disability_flg']);
                    $('#supplementary').val(obj['supplementary']);
                    $('#update_date').val(obj['update_date']);

                    $("#debug").text("取得が完了しました");

                })
                .catch(function (error) {
                    console.log(error);
                    $("#debug").text("取得に失敗しました");
                })

        });
});