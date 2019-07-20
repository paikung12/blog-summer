import router from './router/cat.js'

require('./bootstrap');

window.Vue = require('vue');
window.axios  = require('axios');
window.moment = require('moment-timezone');

moment.tz('Asia/Bangkok')


Vue.component('app', require('./app.vue').default);
if(document.querySelector("meta[name='user-id']")){
    Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

}



const app = new Vue({
    el: '#app',
    router:router
});

