<template>
    <div class="home">
        <h1>Home page</h1>
        <Posts />
    </div>
</template>

<script>
import Posts from "../components/Posts.vue";
export default {
    name: "Home",
    components: {
        Posts,
    },
};
</script>

<style scoped lang="scss">
.home {
    width: 80%;
    margin: auto;
    h1 {
        text-align: center;
        margin: 10px;
        padding: 10px;
    }
}
</style>
