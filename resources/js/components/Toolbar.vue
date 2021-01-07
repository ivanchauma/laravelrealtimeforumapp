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

    <router-link
        v-for="item in items"
        :key="item.title"
        :to="item.to">
      <v-btn icon
      v-if="item.show">
        <v-icon>{{item.icon}}</v-icon>

      </v-btn>
      </router-link>
    </v-toolbar>
      <router-view></router-view>
  </v-card>

</template>

<script>
export default {
        data(){
            return {
                items: [
                    {'title' : 'Forum',icon: 'mdi-forum', to:'/forum', show:true},
                    {'title' : 'Ask Question',icon: 'mdi-information', to:'/ask', show:User.loggedIn()},
                    {'title' : 'Category',icon: 'mdi-bookmark', to:'/forum', show:User.loggedIn()},
                    {'title' : 'Login',icon: 'mdi-login', to:'/login', show:!User.loggedIn()},
                    {'title' : 'Logout', icon: 'mdi-login',to:'/logout', show:User.loggedIn()},
                ]
            }
        },
        created(){
            EventBus.$on('logout', () => {
                User.logout();
            })
        }
}
</script>

<style>

</style>
