<template>
<v-container>
    <v-main>
   <v-form @submit.prevent="signup">
        <v-text-field
          label="Name"
          v-model="form.name"
          type="text"
        ></v-text-field>
           <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
        <v-text-field
          label="E-mail"
          v-model="form.email"
          type="email"
        ></v-text-field>
        <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>
    <v-text-field
            v-model="form.password"
            type="password"
            label="Password"
            hint="At least 8 characters"
          ></v-text-field>
             <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
              <v-text-field
            v-model="form.password_confirmation"
            type="password"
            label="Password Confirmation"
            hint="At least 8 characters"
          ></v-text-field>
      <v-btn
        type="submit"
        color="green"
      >
        Sign Up
      </v-btn>
   </v-form>
    </v-main>
    </v-container>
</template>
<script>
export default {
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            errors: {}
        }
    },
        created(){
        if(User.loggedIn()){
            this.$router.push({name:'forum'})
            //this if for redirect if user is authenticated
        }
    },
    methods: {
        signup(){
            axios.post('/api/auth/signup', this.form)
            .then(res => User.responseAfterLogin(res))
            .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style>

</style>
