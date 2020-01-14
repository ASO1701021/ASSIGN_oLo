import Vue from 'vue'
import Router from 'vue-router'
import home from '@/components/home'
import HisyoImagechange from '@/components/Hisyo_Imagechange'
import schedulecheck from '@/components/schedulecheck'
import account from '@/components/account'
import accountchange from '@/components/accountchange'
import signinslack from '@/components/signinslack'
import calendar from '@/components/calendar'
import briefingadd from '@/components/briefing_add'
import Briefing from '@/components/Briefing'
import Details from '@/components/Details'
import ProofReading from '@/components/ProofReading'
Vue.use(Router)
export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/home',
      name: 'home',
      component: home
    },
    {
      path: '/Hisyo',
      name: 'HisyoImagechange',
      component: HisyoImagechange
    },
    {
      path: '/account',
      name: 'account',
      component: account
    },
    {
      path: '/accountchange',
      name: 'accountchange',
      component: accountchange
    },
    {
      path: '/schedulecheck',
      name: 'schedulecheck',
      component: schedulecheck
    },
    {
      path: '/calendar',
      component: calendar
    },
    {
      path: '/briefing_add',
      component: briefingadd
    },
    {
      path: '/Briefing',
      component: Briefing
    },
    {
      path: '/Details',
      name: 'Details',
      component: Details
    },
    {
      path: '/',
      name: 'signinslack',
      component: signinslack
    },
    {
      path: '/ProofReading',
      name: 'ProofReading',
      component: ProofReading
    }

  ]
})
