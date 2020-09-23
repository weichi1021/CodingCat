import Vue from 'vue'
import App from './App'
import ElementUI from 'element-ui'
import { library } from '@fortawesome/fontawesome-svg-core'
import {
  faHome,
  faFileWord,
  faTags,
  faUsers,
  faSearch,
  faPlus
} from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import router from '../../routes'
import store from '../../store'

Vue.use(ElementUI)
Vue.component('font-awesome-icon', FontAwesomeIcon)
library.add(faHome, faFileWord, faTags, faUsers, faSearch, faPlus, fab, far)
Vue.config.productionTip = false

export default new Vue({ // eslint-disable-line no-new
  el: '#app',
  router,
  store,
  render: h => h(App)
})
