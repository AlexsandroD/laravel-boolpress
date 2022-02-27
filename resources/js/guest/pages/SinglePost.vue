<template>
    <div>
        <h1>
            {{ post.title }}
        </h1>
        <p>{{ post.content }}</p>
        <img :src="`/storage/${post.image}`" :alt="post.title" />
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return {
            post: {},
        };
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`).then((response) => {
            this.post = response.data;
        });
    },
};
</script>

<style></style>
