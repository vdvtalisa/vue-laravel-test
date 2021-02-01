<template>
    <div>
        <h1>The number is {{ views }}</h1>
        <button @click="updateCounter(1)">Increase</button>
        <button @click="updateCounter(-1)">Decrease</button>
        <br>
        <br>

        <div v-for="(blog, i) in blogs" :key="i" v-if="blogs.length">
            <h1>{{ blog.title }} {{ blog.id }}</h1>
            <p>{{ blog.post }}</p>
        </div>

        <br>
        <br>
        <br>

        <div>
            <h1 v-if="showItem">Show this item if "showItem" is true</h1>
            <h1 v-else>Show this item if "showItem" is false</h1>
        </div>

        <button @click="changeItem">Change this shite</button>
    </div>
</template>

<script>
    export default {
        name: "Methods.vue",
        data() {
            return {
                views: 0,
                blogs: [],
                showItem: false
            }
        },
        methods: {
            updateCounter(number) {
                this.views += number
            },
            changeItem() {
                this.showItem = !this.showItem
            }
        },

        created() {
            //call the server to get the views of this blog post...
            this.views = 100
            // get the blog posts
            let posts = [
                {title: 'this is blog title', 'post' : 'this is the blog post', id: 1},
                {title: 'this is blog title', 'post' : 'this is the blog post', id: 2},
                {title: 'this is blog title', 'post' : 'this is the blog post', id: 3},
                {title: 'this is blog title', 'post' : 'this is the blog post', id: 4}
            ]
            this.blogs = posts
        }
    }
</script>

<style scoped>

</style>
