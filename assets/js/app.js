import "@babel/polyfill";
import Vue from 'vue';
import router from '../router'
import vueResource from 'vue-resource'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import '../css/app.css'
import HeaderComponent from '../components/HeaderComponent'
import CopyrightsComponent from '../components/CopyrightsComponent'
import * as VueGoogleMaps from "vue2-google-maps";
import PhotoSwipe from 'vue-simple-photoswipe/dist/vue-simple-photoswipe'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faGraduationCap, faListAlt,faClipboardCheck, faPhone, faMapMarkerAlt, faAt, faExternalLinkAlt, faCopyright, faTimes} from '@fortawesome/free-solid-svg-icons'
import {faFacebookF} from '@fortawesome/free-brands-svg-icons'
import Meta from 'vue-meta'

Vue.use(PhotoSwipe)
Vue.use(BootstrapVue);
Vue.use(vueResource);
library.add(faGraduationCap,faListAlt,faClipboardCheck,faPhone,faMapMarkerAlt, faAt, faFacebookF, faExternalLinkAlt, faCopyright, faTimes)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyB_OVAmCxEHt9BiVm6kulF2csSya6BhZ3c",
        libraries: "places" // necessary for places input
    }
});
// Vue.use(Meta);




new Vue({
    el: '#app',
    router,
    components: {
                HeaderComponent,
                CopyrightsComponent
                },
    created: function() {

    }
});