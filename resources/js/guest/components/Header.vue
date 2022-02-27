<template>
    <header>
        <h1>Header</h1>
        <a href="/admin/home">Area riservata</a>
        <nav>
            <ul>
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'about' }">About</router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style scoped lang="scss">
li {
    margin: 10px;
    router-link {
        font-size: 1.5rem;
    }
}
</style>
