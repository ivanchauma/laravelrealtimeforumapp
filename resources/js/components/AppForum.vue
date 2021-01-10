<template>
  <v-container fluid grid-list-md>
      <v-layout row wrap>
          <v-flex xs8>
            <question
            v-for="question in questions"
            :key="question.path"
            :question=question
            >
            <!--This is a child componet, so in component question you create a props -->
            </question>
          </v-flex>
          <v-flex xs4>
              <app-side-bar>
              </app-side-bar>
          </v-flex>
      </v-layout>
  </v-container>
</template>

<script>
import AppSideBar from './forum/AppSideBar.vue'
import question from './forum/question'
export default {
    data(){
        return {
            questions:{}
        }
    },
    components: {question, AppSideBar},
    created() {
        axios.get('/api/question')
        .then(res => this.questions = res.data.data)
        .catch(error => console.log(error.reponse.data))
    }
}
</script>

<style>

</style>
