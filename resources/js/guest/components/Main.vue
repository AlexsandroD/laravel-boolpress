<template>
    <main>
        <div class="cards">
            <div v-for="(post, index) in posts" :key="index" class="card">
                <h4>{{ post.title }}</h4>
                <div v-if="post.image">
                    <img v-bind:src="'../storage/' + post.image" />
                </div>
                <div v-else>
                    <img
                        src="https://st2.depositphotos.com/1669000/5774/v/600/depositphotos_57749055-stock-illustration-happy-man-is-waiting-for.jpg"
                        alt=""
                    />
                </div>
                <p>{{ post.content }}</p>
            </div>
        </div>
    </main>
</template>
<script>
export default {
    name: "Main"

};
</script>

<style></style>
