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
    methods: {
        login(){
//alert('login')
        axios.post('/api/auth/login', this.form)
        .then(res => console.log(res.data))
        .catch(err => console.log(error.reponse.data))
        }
    }
}
</script>

<style>

</style>
