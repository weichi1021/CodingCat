import Vue from 'vue'
import VueRouter from 'vue-router'
import { isLogin } from '@utils/auth'
import config from './config'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: '/admin',
  routes: config
})

router.beforeEach((to, from, next) => {
  console.log(to, from)
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!isLogin()) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else if (isLogin() && to.path === '/login') {
      next({ path: '/' })
    } else {
      next()
    }
  } else {
    next()
  }
})

export default router
