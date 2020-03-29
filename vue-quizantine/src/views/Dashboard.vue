<template>
	<div class="dashboard">
		<h1>Dashboard view</h1>
		<div>
			Name: {{ name }}
		</div>
		<div>
			Email: {{ email }}
		</div>
		<button @click='logout'>Logout</button>
	</div>
</template>


<script>

	import axios from 'axios'

	axios.defaults.withCredentials = true
	axios.defaults.baseURL = 'http://localhost:8014'

	export default {
		data() {
			return {
				email: '',
				name: '',
			}
		},
		mounted() {
			axios.get('/api/user').then(response => {
				console.log(response)
				this.name = response.data.name
				this.email = response.data.email
			})
		},
		methods: {
			logout() {
				axios.post('/logout').then(response => {
					this.$router.push({ name: 'Home'})
				})
			} 
		}
	}
</script>
