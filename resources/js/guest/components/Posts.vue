<template>
    <div class="container">
        <div class="cards">
            <div class="card" v-for="post in posts" :key="post.id">
                <h3>{{ post.title }}</h3>
                <h4 v-if="post.category">
                    <strong>Category:</strong>{{ post.category.name }}
                </h4>
                <p>{{ post.content }}</p>
                <div v-if="post.tags.length > 0">
                    <strong>Tags</strong>
                    <ul>
                        <li v-for="tag in post.tags" :key="tag.id">
                            {{ tag.name }}
                        </li>
                    </ul>
                </div>
                <router-link
                    :to="{ name: 'single-post', params: { slug: post.slug } }"
                    >Visualizza Post</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Posts",
    data() {
        return {
            posts: [],
        };
    },

    created() {
        axios.get("/api/posts").then((response) => {
            this.posts = response.data;
        });
    },
};
</script>

<style scoped lang="scss"></style>
