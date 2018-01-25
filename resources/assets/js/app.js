
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Router from './routes.js'
import Auth from './packages/Auth';

Vue.use(Auth);

// frontend middleware for checking auth
Router.beforeEach((to, from, each) => {
    if(to.matched.some(record => record.meta.forVisitors)){
        if(Vue.auth.isAuthenticated()){
            next({
                path: '/feed'
            })
        } else next()
    } else next()
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('connectService', require('./components/ConnectService.vue'));
Vue.component('refreshProducts', require('./components/RefreshProducts.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app',
    router: Router
});
