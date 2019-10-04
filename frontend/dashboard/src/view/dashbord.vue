<template>
  <div>
    <div class="ui grid">
      <div class="three wide column bg-sidebar">
        <aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
          <header class="sidebar-header"></header>
          <nav class="sidebar-navigation ps-container ps-theme-default ps-active-y">
            <ul class="menu">
              <li class="text-white text-center pt-3 pb-3">Dashbord</li>
              <li class="menu-item">
                <router-link class="menu-link" to="/">
                  <span class="icon fa fa-home"></span>
                  <span class="title">Voltar Home</span>
                </router-link>
              </li>
            </ul>
          </nav>
        </aside>
      </div>
      <div class="content wide">
        <div class="text container form-create-users">
          <h2 class="form-title">Usuários</h2>
          <form class="ui form" @submit.prevent="salvar">
            <div class="field">
              <label>Nome</label>
              <input type="text" name="name" placeholder="Digite o nome" v-model="users.name" />
            </div>
            <div class="field">
              <label>Email</label>
              <input type="email" name="email" placeholder="Digite o email" v-model="users.email" />
            </div>
            <div class="field">
              <label>Senha</label>
              <input
                type="password"
                name="password"
                placeholder="Digite a senha"
                v-model="users.password"
              />
            </div>
            <button class="ui primary button" type="submit">Criar</button>
          </form>
          <!-- <ul>
            <li v-for="(erro, index) of errors"  :key="index">
            {{erro}}

            </li>
          </ul>-->

          <table class="ui celled padded table">
            <thead>
              <tr>
                <th>name</th>
                <th>email</th>
                <th>Opção</th>
              </tr>
            </thead>
            <tbody v-for="user in users.data" :key="user.id">
              <tr>
                <td class="single line">{{user.name}}</td>
                <td class="single line">{{user.email}}</td>
                <td>
                  <button class="ui teal button" @click="update(user)">Editar</button>
                  <button class="ui red button" @click="remover(user)">Excluir</button>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="5">
                  <div class="ui right floated pagination menu">
                    <a class="icon item">
                      <i class="left chevron icon"></i>
                    </a>
                    <a class="item">1</a>
                    <a class="item">2</a>
                    <a class="icon item">
                      <i class="right chevron icon"></i>
                    </a>
                  </div>
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import navbarPrincipal from "../components/menu.vue";
import Users from "../services/users";
export default {
  components: {
    navbarPrincipal
  },
  data() {
    return {
      users: {
        id: "",
        name: "",
        email: "",
        password: ""
      },
      users: [],
      errors: []
    };
  },
  mounted() {
    this.listar();
  },
  methods: {
    listar() {
      Users.getUser().then(resp => {
        this.users = resp.data.data;
      });
    },
    salvar() {
      if (!this.users.id) {
        Users.salvar(this.users)
          .then(resp => {
            this.users = {};
            alert("salvo com sucesso!");
            this.listar();
          })
          .catch(e => {});
      } else {
        Users.update(this.users, this.users.id)
          .then(reso => {
            this.users = {};
            alert("atualizado com sucesso!");
            this.listar();
          })
          .catch(e => {
            this.errors = e.response.data;
            console.log(this.errors);
          });
      }
    },
    update(users) {
      this.users = users;
    },
    remover(users) {
      if (confirm("Deseja ecluir o Usuário?")) {
        Users.delete(users, users.id)
          .then(resp => {
            this.listar();
            this.errors = [];
          })
          .catch(e => {
            this.errors = this.errors = e.response.data;
          });
      }
    }
  }
};
</script>

<style>
.form-title {
  text-align: center;
}
.form-create-users {
  max-width: 80%;
  margin: auto;
}
.content {
  width: 80% !important;
  padding: 50px;
}
.grid {
  height: 100vh;
}
.bg-sidebar {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  width: 260px;
  background-color: #3f4a59;
  white-space: nowrap;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.08);
  display: flex;
  overflow: hidden;
  flex-direction: column;
  z-index: 997;
  padding-right: 0px !important;
  height: 100% !important;
}
.sidebar-header {
  background-color: #926dde !important;
  padding: 0 12px;
  display: flex;
  align-items: center;
  color: #fff;
}
.sidebar-header {
  height: 64px !important;
  width: 100vh;
}
.menu {
  list-style: none;
  padding-left: 0;
  margin-bottom: 30px;
}
dl,
ol,
ul {
  margin-top: 0;
  margin-bottom: 1rem;
}
.text-white {
  color: #fff !important;
}
.text-center {
  text-align: center !important;
}
.pb-3,
.py-3 {
  padding-bottom: 1rem !important;
}
.pt-3,
.py-3 {
  padding-top: 1rem !important;
}
.sidebar .menu-link {
  color: #fff;
}
.menu-link .title {
  flex-grow: 1;
  display: flex;
  flex-shrink: 0;
  flex-direction: column;
  line-height: 1;
  font-size: 16px;
  padding: 25px;
}
</style>