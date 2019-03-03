<template style="background-color: gray; width: 100%; height: 100%;">
  <div id="app" style="background-color: gray; min-width: 1280px; min-height: 580px;">
    <router-link to="/diary"><h1>MaiDiarai</h1></router-link>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App',
  
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
