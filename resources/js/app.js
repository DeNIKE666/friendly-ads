import Vue from 'vue'
import VeeValidate from 'vee-validate';
import VeeValidateLaravel from '@pmochine/vee-validate-laravel';

require('./bootstrap')

Vue.use(VeeValidate)
Vue.use(VeeValidateLaravel);

Vue.component('create-task', require('./components/Customer/createTask.vue').default);
Vue.component('update-task', require('./components/Customer/updateTask.vue').default);

const app = new Vue({
    el: '#app',
});
