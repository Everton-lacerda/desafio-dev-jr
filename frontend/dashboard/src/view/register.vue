<template>
  <div>
    <div class="text container bg">
      <div class="ui middle aligned center aligned grid">
        <div class="column form-center">
          <form class="ui large form" @submit.prevent="register">
            <div class="ui stacked segment">
              <div class="field">
                <h2 class="ui teal image header">
                  <div class="content">Criar Conta</div>
                </h2>
                <div class="ui left icon input">
                  <i class="user icon"></i>
                  <input type="text" name="name" placeholder="Nome..." v-model="users.name" />
                </div>
              </div>
              <div class="field">
                <div class="ui left icon input">
                  <i class="envelope icon"></i>
                  <input type="text" name="email" placeholder="Email..." v-model="users.email" />
                </div>
              </div>
              <div class="field">
                <div class="ui left icon input">
                  <i class="lock icon"></i>
                  <input
                    type="password"
                    name="password"
                    placeholder="Senha..."
                    v-model="users.password"
                  />
                </div>
              </div>
              <button class="ui fluid large teal submit button">Enviar</button>
            </div>

            <div class="ui error message"></div>
          </form>

          <div class="ui message">
            Já tem conta?
            <router-link to="login">Login</router-link>
          </div>
          <router-link to="/">Inicio</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { required, minLength, between } from "vuelidate/lib/validators";
import Users from "../services/users";
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
    register() {
      Users.salvar(this.users).then(resp => {
        console.log(resp);
        this.users = {};
        this.$router.push({ name: "login" });
        alert("Usuário Cadastrado com sucesso!");
      });
    },
    // ValidateForm : function ( ) {
    //   const error = 0;

    //     if(this.users.email.indexOf("@") < 0){
    //     this.error.email = "Invalid email";
    //     error++;
    //   }

    //   if(this.users.password.length < 4){
    //     this.error.password = "Invalid message (10 characters)";
    //     error++;
    //   }

    //   if(this.users.password.length < 4){
    //     this.error.password = "Invalid message (10 characters)";
    //     error++;
    //   }

    //   return (error === 0)
    // }
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