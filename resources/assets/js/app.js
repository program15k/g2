
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueResource from 'vue-resource'
Vue.use(VueResource);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('example-component1', require('./components/formHelper.vue'));
Vue.component('example-component2', require('./components/showBlogs.vue'));
Vue.component('example-component3', require('./components/addBlogs.vue'));

//import Example from './components/ExampleComponent.vue';

const app = new Vue({
    el: '#app'
});

function daysInMonth (month, year) {
    return new Date(year, month, 0).getDate();
}

daysInMonth(7,2009);