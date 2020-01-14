import Vue from 'vue'
import Router from 'vue-router'
import sign_in from '@/components/sign_in'
import student_user from "@/components/student_user"
import briefing_list from "@/components/briefing_list"
import briefings_list from "@/components/briefings_list"
import briefing_update from "@/components/briefing_update"
import calendar from "@/components/calendar"
import briefing_add from "@/components/briefing_add"

Vue.use(Router)

export default new Router({
    routes:[
        {
            path:'/',
            component: sign_in
        },
        {
            path: '/student_user',
            component: student_user
        },
        {
            path: '/briefings_list',
            component: briefings_list
        },
        {
            path: '/briefing_list',
            component: briefing_list
        },
        {
            path: '/briefing_update',
            component: briefing_update
        },
        {
            path: '/calendar',
            component: calendar
        },
        {
            path: '/briefing_add',
            component: briefing_add
        }
    ]
})