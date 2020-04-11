<template>
    <div class="Host">
        <h1>Build Quiz</h1>
        <h3>Round {{ round }}</h3>
         
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
               quiz: {},
            }
        },
        mounted() { 
            this.quiz = this.$store.getters.getQuiz
        },
        methods: {
            next() {
                
            }
        }
    }
</script>
