<template>
  <div>
    <navbar-principal></navbar-principal>
    <div class="fullbanner">
      <div class="ui text container">
        <h1 class="text-uppercase banner-text">Lorem Ipsums</h1>
        <p
          class="text-uppercase banner-text-p"
        >Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        <div class="pt-3">
          <a class="btn btn-lg btn_banner" href="#">
            <strong>Saber Mais...</strong>
          </a>
        </div>
      </div>
    </div>

    <div class="ui container">
      <div class>
        <h1 class="text-sub">Lorem Ipsums</h1>
        <p class="text-sub-p">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet,
          consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit
        </p>
        <h1 class="text-sub">Lorem Ipsums</h1>
        <p class="text-sub-p">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet,
          consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit
        </p>
      </div>
    </div>
    <footer>
      <footer>
        <div class="container">
          <div class="text">
            <div class>
              <p class="footer_copy">Users © 2019 - Todos os direitos reservados</p>
            </div>
          </div>
        </div>
      </footer>
    </footer>
  </div>
</template>

<script>
import navbarPrincipal from "../components/menu.vue";

export default {
  components: {
    navbarPrincipal,
  }
};
</script>

<style>
.menu {
  height: 65px;
  margin: 0px !important;
}
.menu-item {
  text-decoration: none !important;
  font-weight: bold !important;
  color: #6c757d !important;
}
.menu-item-register {
  color: #fff;
  background-color: #00c8e2 !important;
  border-color: #00c8e2 !important;
  border-radius: 5px !important;
  color: #fff !important;
}
.menu-item-register:hover {
  background-color: rgb(28, 124, 128) !important;
  border-color: rgb(28, 124, 128) !important;
  border-radius: 5px !important;
  color: #fff !important;
}
.fullbanner {
  height: 70vh;
  display: flex;
  align-items: center;
  background-image: linear-gradient(
      -225deg,
      rgba(0, 78, 146, 0.65) 0%,
      rgba(0, 12, 64, 0.65) 20%
    ),
    url(../assets/banner.jpg);
  background-size: cover;
  background-attachment: fixed;
  padding: 10px;
}
.banner-text {
  color: #fff;
  font-size: 40px;
  font-weight: 600;
  text-shadow: 0px 0px 30px #000000;
  line-height: 1.5;
}
.banner-text-p {
  color: rgb(199, 198, 198);
  font-weight: 600;
  text-shadow: 0px 0px 30px #000000;
  line-height: 1.5;
}
.pt-3 {
  padding-top: 1rem !important;
}
.btn_banner {
  color: #fff;
  background-color: #31afb4;
  border-color: #31afb4;
  border-radius: 5px;
  padding: 15px;
}
.btn_banner:hover {
  color: #fff;
  background-color: rgb(28, 124, 128);
  border-color: rgb(28, 124, 128);
  border-radius: 5px;
  padding: 15px;
}
.text-sub {
  text-align: center;
  padding-top: 65px;
  font-size: 42px;
}
.text-sub-p {
  text-align: center;
  padding-top: 5px;
  font-size: 22px;
  line-height: 34px;
}
footer {
  margin-top: 125px;
  padding: 20px 0;
  width: 100%;
  background: #25323f;
  color: rgb(133, 131, 131);
}
.footer_copy {
  text-align: center;
  font-size: 19px;
}
</style>