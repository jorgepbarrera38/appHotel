
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import AppMain from './AppMain'
import LoginComponent from './components/LoginComponent'
import RoomComponent from './components/RoomComponent'
import NotFoundComponent from './components/NotFoundComponent'
import ClientComponent from './components/ClientComponent'

Vue.use(VueRouter);

const routes = [
    { path:'/login', name:'login', component: LoginComponent},
    { path:'/rooms', name:'rooms', component: RoomComponent},
    { path:'/clients', name:'clients', component: ClientComponent},
    { path:'*', component: NotFoundComponent }
]

const router = new VueRouter({
    routes
});

Vue.component('appmain', require('./AppMain'));

const app = new Vue({
    el: '#app',
    router,
    render: h => h(AppMain)
});
