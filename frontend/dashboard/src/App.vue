<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
import Home from './view/home'

export default {
  name: 'app',
  components: {
    Home
  }
}
</script>

<style>

</style>
