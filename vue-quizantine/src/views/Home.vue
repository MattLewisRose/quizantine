<template>
    <div class="home">
        <form action="#" method="POST" @submit.prevent="login">
            <div>
                <input v-model="email" type="email" name="email" placeholder="email">
            </div>
            <div>
                <input v-model="password" type="password" name="password" placeholder="password">
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</template>

<script>

    import axios from 'axios'

    axios.defaults.withCredentials = true
    axios.defaults.baseURL = 'http://localhost:8014'

    export default {
        name: 'Home',
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        this.$router.push({ name: 'Dashboard' })
                    })
                });
            }
        }
    }
</script>
