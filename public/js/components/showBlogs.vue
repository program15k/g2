<template>
  <div id="show-blogs">
    <h1>All Blog Articles</h1>
    <div v-for="blog in blogs" class="single-blog">
        <h2>{{ blog.title }}</h2>
        <article>{{ blog.body }}</article>
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
            this.$http.get('https://jsonplaceholder.typicode.com/posts').then(function(data){
                this.blogs = data.body.slice(0,5);
            })
        }
    }

</script>

<style>


</style>
