<template>
<div v-if="question">
    <edit-question v-if="editing"
    :data = question
    ></edit-question>
        <show-question
        v-else
        :data = question
        >
        </show-question>

    <v-container>
        <replies :question="question">
        </replies>

        <new-reply :QuestionSlug="question.slug">
        </new-reply>
    </v-container>
</div>

</template>

<script>
import EditQuestion from './EditQuestion.vue'
import NewReply from './reply/newReply.vue'
import Replies from './reply/replies'
import ShowQuestion from "./ShowQuestion.vue"

export default
{
  components: { ShowQuestion, EditQuestion, Replies, NewReply },
    data(){
        return {
            question:null,
            editing: false
        }
    },
    created(){
        //console.log(this.$route.params.slug);
        this.listen()
        this.getQuestion()
    },
    methods:{
        listen(){
            EventBus.$on('startEditing', () => {
                this.editing = true
            })

              EventBus.$on('cancelEditing', () => {
                this.editing = false
            })
        },
        getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then(res => this.question = res.data.data)
        }
    }
}
</script>

<style>

</style>
