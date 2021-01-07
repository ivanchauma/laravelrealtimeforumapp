<template>
  <v-container>
      <v-form @submit.prevent="create">
        <v-text-field
          label="Title"
          v-model="form.title"
          type="text"
        ></v-text-field>

        <v-select
        :items="categories"
        v-model="form.category_id"
        item-text="name"
        item-value="id"
        label="Category"
        autocomplete
        >
        </v-select>

        <vue-simplemde v-model="form.body" ref="markdownEditor" />
      <v-btn
        type="submit"
        color="green"
      >
        Create
      </v-btn>
    <router-link to="/signup">
    </router-link>
      <router-view></router-view>
   </v-form>
  </v-container>

</template>

<script>
export default {
    data(){
        return {
            form : {
                title:null,
                category_id:null,
                body:null
            },
            categories: {},
            errors: {}
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data)
    },
    methods: {
        create(){
            axios.post('/api/question', this.form)
            //.then(res => console.log(res.data))
            .then(res => this.$router.push(res.data.path))
            .catch(error => console.log("Some error happened"))
        }
    }
}
</script>

<style>
@import '~simplemde/dist/simplemde.min.css';
</style>
