import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'

require('./bootstrap');
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from './router.js';
import VueApexCharts from 'vue-apexcharts'

window.Vue = require('vue').default;

Vue.use(BootstrapVue)
Vue.use(VueApexCharts)
Vue.component('apexchart', VueApexCharts)
Vue.component('example-component', require('./components/ProfessorsComponent.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('sidebar', require('./components/Sidebar.vue').default);
Vue.component('table-admin', require('./components/TableAdmin.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('students', require('./components/StudentsTable.vue').default);
Vue.component('grades', require('./components/StudentsGrades.vue').default);
Vue.component('classes', require('./components/ClassesTable.vue').default);


const app = new Vue({
    el: '#app',
    router
});
