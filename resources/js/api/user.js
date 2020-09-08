import axios from 'axios'
import { setCookie, getCookie } from '@utils/cookie'

class User {
  constructor () {
    this.token = getCookie('user-token') || null
  }

  /**
   * @param {string} account
   * @param {string} password
   */
  async login ({ account, password }) {
    try {
      const resp = await axios.post('/api/login', {
        account, password
      })
      const token = resp.data.data.token
      setCookie('user-token', token, 1)
      return resp.data
    } catch (error) {
      throw (error.response.data)
    }
  }

  async logout () {
    try {
      const resp = await axios.post('/api/logout')
      setCookie('user-token', null, 1)
      return resp.data
    } catch (error) {
      throw (error.response.data)
    }
  }

  async getList () {
    try {
      const resp = await axios.get('/api/admin/user_list', {
        headers: {
          Authorization: `Bearer ${this.token}`
        }
      })
      return resp.data
    } catch (error) {
      throw (error.response.data)
    }
  }
}

export default new User()
