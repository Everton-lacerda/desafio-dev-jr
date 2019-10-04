import Vue from 'vue'
import Router from 'vue-router'
import home from './view/home.vue'
import dashbord from './view/dashbord.vue'
import login from './view/login.vue'
import register from './view/register.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        { path: '/', component: home , name: 'home'},
        { path: '/dashbord', component: dashbord, name: 'dashbord'},
        { path: '/login', component: login , name: 'login' },
        { path: '/register', component: register, name: 'register'  },
    ]

})