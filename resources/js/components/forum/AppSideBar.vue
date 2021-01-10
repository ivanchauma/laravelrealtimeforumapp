<template>

    <v-card
    class="mx-auto"
    max-width="300"
    tile
  >
    <v-list flat>
      <v-subheader>Categories</v-subheader>
      <v-list-item-group
        v-model="selectedItem"
        color="primary"
      >
        <v-list-item
          v-for="(item, i) in categories"
          :key="i"
        >
          <v-list-item-icon>
            <v-icon v-text="item.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="item.name"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-card>

</template>

<script>
export default {
    data(){
        return{
            selectedItem: 1,
            categories: {}
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data)
        .catch(err => console.log("Error Happened"))
    }
}
</script>

<style>

</style>
