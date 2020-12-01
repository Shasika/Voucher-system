<template>
    <div class="app">
        <Nav/>
        <h1>App vue</h1>
        <router-view></router-view>
<!--        <div class="container-xl mh-100 p-3 my-3 bg-dark text-white -xl">-->
<!--            <h1>HOME</h1>-->
<!--        </div>-->
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
