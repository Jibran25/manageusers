

require('./bootstrap');
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
// window.Vue = require('vue').default;

Vue.use(VueAxios, axios)

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('users-management-dashboard', require('./components/users/UsersManagementDashboard.vue').default);
Vue.component('manage-users', require('./components/Manage.vue').default);


const app = new Vue({
    el: '#app',
});
