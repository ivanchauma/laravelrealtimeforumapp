<template>
<div class="mt-3">
    <v-card>
        <v-card-title>
            <div class="headline">{{data.user}}</div>
            <div class="ml-2">said {{data.created_at}} </div>
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text v-html="data.reply">
        </v-card-text>
        <v-divider></v-divider>
       <!-- <v-card-actions v-if="this.user_id == data.user_id"> -->
             <v-card-actions>
            <v-btn icon small>
                <v-icon color="orange">mdi-pencil</v-icon>
            </v-btn>
            <v-btn icon small @click="destroy">
                <v-icon color="red">mdi-delete</v-icon>
            </v-btn>
        </v-card-actions>
    </v-card>
</div>
</template>

<script>
export default {
    props:['data', 'index'],
    data(){
        return {
            user_id: User.id() //Or use own:User.own(this.data.user_id) it will return true
        }
    },
    methods:{
        destroy(){
            EventBus.$emit('deleteReply', this.index) //Emite o evento
        }
    }

}
</script>

<style>

</style>
