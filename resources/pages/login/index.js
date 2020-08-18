import Vue from 'vue'
import App from './App'
import ElementUI from 'element-ui'

Vue.use(ElementUI)

new Vue({ // eslint-disable-line no-new
  el: '#app',
  render: h => h(App)
})
