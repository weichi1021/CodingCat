import axios from 'axios'
import { getCookie } from '@utils/cookie'

// Add a request interceptor
axios.interceptors.request.use(function (config) {
  const token = getCookie('user-token') || null
  const addTokenConfig = {
    ...config,
    headers: {
      Authorization: `Bearer ${token}`
    }
  }
  return (token) ? addTokenConfig : config
}, function (error) {
  return Promise.reject(error)
})

export default axios
