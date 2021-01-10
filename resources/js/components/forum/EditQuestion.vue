<template>
  <v-container>
       <v-form @submit.prevent="update">
        <v-text-field
          label="Title"
          v-model="form.title"
          type="text"
        ></v-text-field>

        <vue-simplemde v-model="form.body" ref="markdownEditor" />
      <v-card-actions>

      <v-btn
        icon small
        color="green"
        type="submit"
      >
      <v-icon>mdi-content-save </v-icon>
      </v-btn>

         <v-btn
        icon small
        color="green"
        @click="cancel"
      >
      <v-icon>mdi-close </v-icon>
      </v-btn>
      </v-card-actions>
   </v-form>
  </v-container>
</template>

<script>
export default {
    props:['data'],
    data(){
        return {
            form: {
                title: null,
                body: null
            }
        }
    },
    methods: {
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.form.slug}`, this.form)
            .then(res => this.cancel())
        }
    },
   created(){
        this.form = this.data
    }

}
</script>

<style>

</style>
