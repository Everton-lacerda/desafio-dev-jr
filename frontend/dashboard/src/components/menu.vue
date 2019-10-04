<template>
    <div class="ui secondary menu">
      <div class="ui container">
        <a class="header item" href="#">LOGO</a>
        <router-link class="menu-item item" to="dashbord">DASHBORD</router-link>
        <router-link class="menu-item item right float" to="login">LOGIN</router-link>
        <router-link class="menu-item-register menu-item item" to="register">REGISTRAR-SE</router-link>
      </div>
    </div>
</template>
<script>
export default {
  name: 'navbarPrincipal',
  data () {
    return {
    }
  }
}
</script>