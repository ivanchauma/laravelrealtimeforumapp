<template>
  <v-container>
      <reply v-for="(reply, index) in content"
      :data="reply"
      :index=index
      :key="reply.id"> </reply>
  </v-container>
</template>

<script>
import reply from './reply.vue'

export default {
  components: { reply },
    props: ['question'],
    data(){
        return{
            content: this.question.replies
        }
    },
    created(){
        this.listen()
    },
    methods: {
        listen(){
            EventBus.$on('newReply', (reply) => {
                this.content.unshift(reply)
            })
            EventBus.$on('deleteReply', (index) => {
                axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                .then(res => {
                    this.content.splice(index,1) //delete
                })

            })


    }
    }
}
</script>

<style>

</style>
