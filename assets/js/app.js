import Vue from 'vue';
import router from '../router'
import vueResource from 'vue-resource'
import Example from '../components/Example'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import '../css/app.css'
import HeaderComponent from '../components/HeaderComponent'
import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(BootstrapVue);
Vue.use(vueResource);

Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyB_OVAmCxEHt9BiVm6kulF2csSya6BhZ3c",
        libraries: "places" // necessary for places input
    }
});
/**
 * Create a fresh Vue Application instance
 */
new Vue({
    el: '#app',
    router,
    components: {Example,
                HeaderComponent
                }
});