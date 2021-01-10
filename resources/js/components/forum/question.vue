<template>
  <v-card
    class="mx-auto mt-2"
  >
      <v-card-title>
          <router-link :to="question.path">
          {{question.title}}
          </router-link>
        </v-card-title>
    <v-card-subtitle class="pb-0 grey--text">
        {{question.user}} said
      {{question.created_at}}
    </v-card-subtitle>
    <div>
    <v-card-text class="text--primary">
     <!-- <div>Whitehaven Beach</div> -->

      <div>{{question.body}}</div>
    </v-card-text>
    </div>
   <!-- <v-card-actions>
      <v-btn
        color="orange"
        text
      >
        Share
      </v-btn>

      <v-btn
        color="orange"
        text
      >
        Explore
      </v-btn>
    </v-card-actions> -->
  </v-card>
</template>

<script>
export default {
    props:['question']
}
</script>

<style>

</style>
