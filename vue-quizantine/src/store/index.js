import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import axios from 'axios'

axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://localhost:8014'

export default new Vuex.Store({
  state: {
    hostingQuiz: false,
    quiz: {
      id: '',
      name: '',
      numRounds: 0,
      rounds: {

      }
    }
  },
  getters: {
    getQuiz: state => {
      return state.quiz
    }
  },
  mutations: {
    hostQuiz(state, quiz) {
      axios.post('/api/quiz/create', {
        quiz: quiz
      })
      .then(response => {
          state.quiz = response.data.quiz
      })
    },
    startNewQuiz(state, data) {
      state.quiz.name = data.name
      state.quiz.numRounds = data.numRounds
      state.hostingQuiz = true
    }
  },
  actions: {
  },
  modules: {
  }
})
