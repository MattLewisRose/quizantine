<template>
    <div class="Main">
        <div>
            <h1>Main</h1>
        </div>
        <div>
            <button @click="host">Host Game</button>
        </div>

        <div>
            <button @click="join">Join Game</button>
        </div>
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
            host() {
                this.$router.push({ name: 'Host' })
            },
            join() {
                this.$router.push({ name: 'Join' })
            }
        }
    }
</script>
