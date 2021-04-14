import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Login'
import Home from '../views/Home'

Vue.use(VueRouter)

const routes = [
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/',
    name: 'home',
    component: Home,
    children: [
      {
        path: '/articl',
        name: 'articl',
        component: () => import('../views/Articl')
      }
    ]
  }
]

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {
  if(to.path === '/login') {
    next()
  }

  if(!window.sessionStorage.getItem('token') || window.sessionStorage.getItem('token') === '' || window.sessionStorage.getItem('token') === null || window.sessionStorage.getItem('token') === undefined) {
    next('/login')
  }

  next()
})

export default router
