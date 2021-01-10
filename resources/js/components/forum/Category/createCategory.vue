<template>
  <v-container>
      <v-form @submit.prevent="submit">

        <v-text-field
          label="Category"
          v-model="form.name"
         required
        ></v-text-field>

      <v-btn
        type="submit"
        color="green"
        v-if="editSlug"
      >
        Update
      </v-btn>

            <v-btn
        type="submit"
        color="blue"
        v-else
      >
        Create
      </v-btn>

      </v-form>

      <v-card>
 <v-list flat>
      <v-divider></v-divider>
      <v-subheader>Categories</v-subheader>
      <v-list-item-group
        v-model="selectedItem"
        color="primary"
      >
      <div>
        <v-list-item
          v-for="(item, i) in categories"
          :key="i"
        >

            <v-list-item-action>
                <v-btn icon small @click="edit(i)">
                <v-icon color="orange">mdi-pencil</v-icon>
                </v-btn>
            </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title v-text="item.name"></v-list-item-title>
             <v-divider></v-divider>
          </v-list-item-content>
                     <v-list-item-action>
                 <v-btn icon small @click="destroy(item.slug, i)">
                <v-icon color="red">mdi-delete</v-icon>
                </v-btn>
            </v-list-item-action>
        </v-list-item>
      </div>
      </v-list-item-group>
    </v-list>

      </v-card>
  </v-container>
</template>

<script>
export default {
        data(){
            return {
                selectedItem : 1,
                categories : {},
                editSlug:null,
                form: {
                    name: null,
                }

            }
        },
        created(){

        if (!User.admin()) {
            this.$router.push('/forum')
        }
        axios.get('/api/category')
        .then(res => this.categories = res.data)
        .catch(err => console.log("Error Happened"))
        },
        methods: {
            submit(){
                this.editSlug ? this.update() : this.create //Inline statement

            },
            create(){
                axios.post('/api/category', this.form)
                .then(res => {
                    this.categories.unshift(res.data) //Add item at the first position of the array
                    this.form.name = null
                    console.log(res.data)
                })
            },
            update(){
                axios.patch(`/api/category/${this.editSlug}`, this.form)
                .then(res => {
                    this.categories.unshift(res.data) //Add item at the first position of the array
                    this.form.name = null
                    console.log(res.data)
                })
            },
            destroy(slug, index){
                console.log(slug)
                axios.delete(`/api/category/${slug}`)
                .then(res => this.categories.splice(index, 1))
            },
            edit(index){
                this.form.name = this.categories[index].name
                 this.editSlug = this.categories[index].slug
                 this.categories.splice(index, 1) //Remove the edited category
            }
        }
}
</script>

<style>

</style>
