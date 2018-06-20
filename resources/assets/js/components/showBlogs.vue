<template>
  <div id="show-blogs">
    <h1>All Blog Articles</h1>
    <div v-for="blog in blogs" class="single-blog">
        <h2>{{ blog.year }}</h2>
        <article>{{ blog.month }}</article>
    </div>
  </div>
</template>

<script>

    export default {
        data(){
            return{
                blogs:[]
            }
        },
        methods:{
            
        },
        created(){
            this.$http.get('http://192.168.0.102/g2/public/start').then(function(data){
                this.blogs = data.body.slice(0,5);
            })
        }
    }

</script>

<style>


</style>
