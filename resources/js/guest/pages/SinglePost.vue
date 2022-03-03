<template>
    <div>
        <h1>{{ post.title }}</h1>
        <img :src="`/storage/${post.image}`" :alt="post.title" />
        <p>
            {{ post.content }}
        </p>
        <div>
            <h3>Lascia un commento</h3>
            <form @submit.prevent="addComment()">
                <div>
                    <input
                        type="text"
                        id="name"
                        placeholder="inserisci un nome"
                        v-model="formData.name"
                    />
                </div>
                <div>
                    <textarea
                        id="content"
                        cols="30"
                        rows="10"
                        placeholder="inserisci un commento"
                        v-model="formData.content"
                    ></textarea>
                    <div
                        v-if="formErrors.content"
                        style="background: red; color: white"
                    >
                        <ul>
                            <li
                                v-for="(error, index) in formErrors.content"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <button type="submit">Aggiungi commento</button>
                </div>
            </form>
            <div
                v-show="commentSent"
                style="background: green; color: white; text-align: center"
            >
                Commento in fase di approvazione
            </div>
        </div>
        <div>
            <h3>Commenti</h3>
            <ul>
                <li v-for="comment in post.comments" :key="comment.id">
                    <h4>{{ comment.name }}</h4>
                    <p>{{ comment.content }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return {
            post: {},
            formData: {
                name: "",
                content: "",
                post_id: null,
            },
            commentSent: false,
            formErrors: {},
        };
    },
    methods: {
        addComment() {
            axios
                .post(`/api/comments`, this.formData)
                .then((response) => {
                    this.formData.name = "";
                    this.formData.content = "";
                    this.commentSent = true;
                    console.log(response.data);
                })
                .catch((error) => {
                    this.formErrors = error.response.data.errors;
                    this.commentSent = false;
                });
        },
    },
    created() {
        axios
            .get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data;
                this.formData.post_id = this.post.id;
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
            });
    },
};
</script>

<style></style>
