import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './components/authentication/Login.vue'
import Register from './components/authentication/Register.vue'

Vue.use(VueRouter);

const router = new VueRouter({
	routes: [
		{ path: '/dashboard', component: Dashboard, meta: { forAuth: true } },
		{ path: '/login', component: Login, meta: { forVisitors: true } },
		{ path: '/register', component: Register, meta: { forVisitors: true } }
	]
});

export default router;