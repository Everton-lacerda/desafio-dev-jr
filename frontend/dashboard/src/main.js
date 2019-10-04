import Vue from 'vue'
import App from './App.vue'
import router from './routes'
import SuiVue from 'semantic-ui-vue';
import 'semantic-ui-css/semantic.min.css';
import Vuelidate from 'vuelidate'

Vue.config.productionTip = false
Vue.use (SuiVue);
Vue.use(Vuelidate)

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
