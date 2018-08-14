<template>
  <div id="app">
    <router-view name="header"/>
    <router-view/>
    <footer>
        stopka
    </footer>
  </div>
</template>

<script>
    import PageHeader from './components/PageHeader';

    export default {
        components: {
            PageHeader
        },
        name: 'App'
    }

</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }

</style>
