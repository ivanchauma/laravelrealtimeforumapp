<template>
<div>
    <toolbar> </toolbar>
   <!-- <app-login> </app-login> -->
   <div class="footer">
<!--<app-footer> </app-footer> -->
   </div>
    </div>


</template>

<script>
import AppFooter from './AppFooter.vue'
import AppLogin from './AppLogin.vue'
import Toolbar from './Toolbar.vue'
//import router from './Router/router.js'
//import Footer from './Footer'
export default {
  components: { Toolbar, AppFooter, AppLogin},
  //router
}
</script>

<style>

</style>
