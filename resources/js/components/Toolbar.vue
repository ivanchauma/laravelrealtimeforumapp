<template>
  <v-card
    color="grey lighten-4"
    flat
    height="200px"
    tile
  >
    <v-toolbar dense>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Bitfumes</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-forum</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-information</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-bookmark</v-icon>
      </v-btn>
        <router-link to="/login">
        <v-btn icon>
        <v-icon>mdi-login</v-icon>
      </v-btn>
               </router-link>
    </v-toolbar>
      <router-view></router-view>
  </v-card>

</template>

<script>
export default {

}
</script>

<style>

</style>
