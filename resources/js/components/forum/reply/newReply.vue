<template>
<div>
     <vue-simplemde v-model="form.body" ref="markdownEditor" />

  <v-btn
        type="submit"
        color="green"
        @click="submit"
      >
       Reply
      </v-btn>
</div>
</template>

<script>
export default {
    props:['QuestionSlug'],
    data(){
        return {
            form : {
               body : null
            }
        }
    },
    methods : {
        submit(){
            axios.post(`/api/question/${this.QuestionSlug}/reply`, {body: this.form.body})
            .then(res => {
                this.form.body = null
                EventBus.$emit('newReply', res.data.reply)
                window.scrollTo(0,0)
            })
        }
    }
}
</script>

<style>

</style>
