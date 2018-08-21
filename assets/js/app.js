import Vue from 'vue';
import router from '../router'
import vueResource from 'vue-resource'
import Example from '../components/Example'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import '../css/app.css'

Vue.use(BootstrapVue);
Vue.use(vueResource);
/**
 * Create a fresh Vue Application instance
 */
new Vue({
    el: '#app',
    router,
    components: {Example}
});