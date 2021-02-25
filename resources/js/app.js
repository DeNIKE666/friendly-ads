import Vue from 'vue'

import {HasError, AlertError } from 'vform'

require('./bootstrap')

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('create-task', require('./components/Customer/createTask.vue').default);

const app = new Vue({
    el: '#app',
});
