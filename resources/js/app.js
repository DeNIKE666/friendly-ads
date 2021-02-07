import Vue from 'vue'

require('./bootstrap')

Vue.component('projects-component', require('./components/ProjectComponent.vue').default);

const app = new Vue({
    el: '#app',
});
