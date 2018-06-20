require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

new Vue({
  el: '#app',
  render: h => h(App)
})
