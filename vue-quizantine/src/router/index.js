import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Dashboard from '../views/Dashboard.vue'
import Main from '../views/Main.vue'
import Host from '../views/Host/Host.vue'
import BuildQuiz from '../views/Host/BuildQuiz.vue'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		name: 'Home',
		component: Home
	},
	{
		path: '/about',
		name: 'About',
		// route level code-splitting
		// this generates a separate chunk (about.[hash].js) for this route
		// which is lazy-loaded when the route is visited.
		component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
	},
	{
		path: '/dashboard',
		name: 'Dashboard',
		component: Dashboard
	},
	{
		path: '/main',
		name: 'Main',
		component: Main
	},
	{
		path: '/host',
		name: 'Host',
		component: Host
	},
	{
		path: '/buildQuiz',
		name: 'Build Quiz',
		component: BuildQuiz
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
