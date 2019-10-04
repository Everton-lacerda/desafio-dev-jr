<template>
  <div>
    <div class="text container bg">
      <div class="ui middle aligned center aligned grid">
        <div class="column form-center">
          <form class="ui large form" @submit.prevent="auth">
            <div class="ui stacked segment">
              <div class="field">
                <h2 class="ui teal image header">
                  <div class="content">Login</div>
                </h2>
                <div class="ui left icon input">
                  <i class="user icon"></i>
                  <input
                    type="text"
                    name="email"
                    placeholder="Digite Seu Email..."
                    v-model="users.email"
                  />
                </div>
              </div>
              <div class="field">
                <div class="ui left icon input">
                  <i class="lock icon"></i>
                  <input
                    type="password"
                    name="password"
                    placeholder="Digite Sua Senha"
                    v-model="users.password"
                  />
                </div>
              </div>
              <button class="ui teal fluid large button" type="submit">Login</button>
            </div>

            <div class="ui error message"></div>
          </form>

          <div class="ui message">
            Ainda não tem cadastro?
            <router-link  to="register">Cadastrar-se</router-link>
          </div>
        <router-link  to="/">Inicio</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Users from "../services/users";
import Router from 'vue-router'
export default {
  data() {
    return {
      users: {
        id: "",
        name: "",
        email: "",
        password: ""
      },
      errors: []
    };
  },
  mounted() {},
  methods: {
    async auth() {
      const authUser = {}
      try {
        const data = await Users.auth(this.users.email, this.users.password);
        authUser.access_token = data.data.token;
        window.localStorage.setItem('authUser', JSON.stringify(authUser))
        this.users = {};

        this.$router.push({name: 'dashbord'})
        console.log(data);
        console.log(authUser);
      } catch (error) {
        this.errors = "Email ou senha invalida";
        console.log(error);
      }
    }
  }
};
</script>

<style>
body > .bg {
  height: 100vh !important;
}
.grid {
  height: 100vh !important;
}
.column {
  max-width: 450px;
}
.form-center {
  margin: auto;
}
</style>