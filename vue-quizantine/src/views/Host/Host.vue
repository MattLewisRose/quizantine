<template>
    <div class="Host">
        <div>
            <h1>
                New Quiz
            </h1>
        </div>
         <form action="#" method="POST" @submit.prevent="next">
            <div>
                <h4>
                    Quiz Name
                </h4>
            </div>
            <div>
                <input v-model="name" type="text" name="name" placeholder="Quiz Name">
            </div>
            <div>
                <h4>
                    Number of rounds
                </h4>
            </div>
            <div>
                <select v-model="rounds">
                    <option disabled value="">Please select one</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </div>
            <br/>
            <div>
                <button type="submit">Continue</button>
            </div>
        </form>
        <div v-if="error" style="color: red">
            {{ msg }}
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
               name: '',
               rounds: '',
               error: false,
               msg: ""
            }
        },
        mounted() {
            
        },
        methods: {
            next() {
                
                if(this.name !== '' && this.rounds !== '') {
                    this.error = false
                    this.$store.commit('startNewQuiz', {name: this.name, numRounds: this.rounds}).then(response => {
                        this.$router.push({name: "Build Quiz"})
                    })
                } else {
                    this.error = true
                    if(this.name === '') {
                        this.msg = "Name cannot be blank."
                    } else {
                        this.msg = "Please select a number of rounds"
                    }

                }
                
            }
        }
    }
</script>
