/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/admin-customer-component.vue -> <AdminCustomerComponent></AdminCustomerComponentt>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('admin-customer-component', require('./components/admin-customer-component.vue').default);
Vue.component('admin-clothes-component', require('./components/admin-clothes-component.vue').default);
Vue.component('admin-create-cloth-component', require('./components/admin-create-cloth-component.vue').default);
Vue.component('admin-settings-component', require('./components/admin-settings-component.vue').default);
Vue.component('admin-sets-component', require('./components/admin-sets-component.vue').default);
Vue.component('admin-create-set-component', require('./components/admin-create-set-component.vue').default);
Vue.component('load-set-component', require('./components/load-set-component.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [ ]
});

const app = new Vue({
    router,

    el: '#app',
});
