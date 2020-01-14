<template>
    <div id="app">
        <p id="title">就職支援</p>
        <p id="subtitle">Slackとのアカウント連携でログインしてください</p>
        <a href="https://slack.com/oauth/authorize?scope=identity.basic,identity.email&client_id=[741763675202.836957417009741763675202.836957417009]"><img src="https://api.slack.com/img/sign_in_with_slack.png" /></a>
        <br><router-link to="/student_user">簡易ログイン</router-link>
    </div>
</template>

<script>
    export default {
        name: "sign_in"
    }
</script>

<style scoped>

</style>