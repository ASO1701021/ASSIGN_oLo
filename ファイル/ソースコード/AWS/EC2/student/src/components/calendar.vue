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

        <div id="CenterID">
            <iframe src="https://calendar.google.com/calendar/embed?src=7lk992skpl91uuj7rpgjlpiuq0%40group.calendar.google.com&ctz=Asia%2FTokyo" style ="border:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
</template>

<script>
export default {
  name: 'calendar'
}
</script>

<style scoped>

</style>
