<template>
<v-container>
    <v-main>
   <v-form @submit.prevent="login">
        <v-text-field
          label="E-mail"
          v-model="form.email"
          type="email"
        ></v-text-field>
    <v-text-field
            v-model="form.password"
            type="password"
            label="Password"
            hint="At least 8 characters"
          ></v-text-field>
      <v-btn
        type="submit"
        color="green"
      >
        Login
      </v-btn>
    <router-link to="/signup">
        <v-btn
        type="submit"
        color="green"
      >
       Sign Up
      </v-btn>
    </router-link>
      <router-view></router-view>
   </v-form>
    </v-main>
    </v-container>
</template>


<script>
export default {
    data(){
        return {
            form: {
                email:null,
                password:null
            }
        }
    },
    created(){
        if(User.loggedIn()){
            this.$router.push({name:'forum'});
        }
    },
    methods: {
        login(){
            User.login(this.form)
            //this.$router.push({name:'forum'});
        }
    }
}
</script>

<style>

</style>
