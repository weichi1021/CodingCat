// pages
import Login from '@pages/login'
import Logout from '@pages/logout'
import Layout from '@pages/layout'
import Home from '@pages/home'
import Users from '@pages/users'
import UsersAction from '@pages/users/Action'
import NotFoundPage from '@pages/404'

const config = [
  {
    name: 'Login',
    path: '/login',
    component: Login,
    meta: {
      requiresAuth: false
    }
  },
  {
    name: 'Logout',
    path: '/logout',
    component: Logout
  },
  {
    name: 'Dashboard',
    path: '/',
    component: Layout,
    meta: {
      requiresAuth: true
    },
    children: [
      {
        name: 'Home',
        path: '/',
        component: Home
      },
      {
        name: 'Users',
        path: '/users',
        component: Users
      },
      {
        name: 'users-action',
        path: '/users/:uid(add|\\d+)',
        component: UsersAction
      }
    ]
  },
  {
    name: '404',
    path: '/404',
    component: NotFoundPage
  },
  {
    path: '*',
    redirect: '/404'
  }
]

export default config
