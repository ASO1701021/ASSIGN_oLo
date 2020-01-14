<template>
    <div id="app">
        <p id="title">就職支援</p>
        <p id="subtitle">Slackとのアカウント連携でログインしてください</p>
        <a href="https://slack.com/oauth/authorize?scope=identity.basic,identity.email&client_id=741763675202.861812900708"><img src="https://api.slack.com/img/sign_in_with_slack.png" /></a>
    </div>
</template>

<script>
export default {
  name: 'signin'
}
</script>

<style scoped>
</style>
