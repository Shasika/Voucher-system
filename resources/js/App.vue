<template>
    <div class="app">
        <Nav/>
        <h1>App vue</h1>
        <router-view></router-view>
    </div>
</template>

<script>

import Nav from './Nav'

export default {
    name: "App",

    components: {
        Nav
    },
}
</script>

<style  scoped>

</style>
