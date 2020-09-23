import axios from '@utils/request'
import { setCookie, getCookie } from '@utils/cookie'

class User {
  constructor () {
    this.token = getCookie('user-token') || null
  }

  /**
   * @param {String} account
   * @param {String} password
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
      const resp = await axios.get('/api/logout')
      setCookie('user-token', null, 1)
      return resp.data
    } catch (error) {
      throw (error.response.data)
    }
  }

  // get user list
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

  // get token user info
  async getUserInfo () {
    try {
      const resp = await axios.get('/api/user')
      return resp.data
    } catch (error) {
      console.log(error)
    }
  }

  /**
   * @param {Number} uid
   */
  async getUserInfoById ({ uid }) {
    try {
      const resp = await axios.get('/api/admin/user', {
        params: {
          uid
        }
      })
      return resp.data
    } catch (error) {
      console.log(error)
    }
  }

  /**
   * @param {String} account
   * @param {String} password
   * @param {String} name      // user name
   * @param {String} pic       // link or file path
   * @param {String} description
   * @param {String} email
   * @param {String} github    // link
   * @param {String} facebook  // link
   */
  async userCreate ({ account, password, name, pic, description, email, github, facebook }) {
    try {
      const resp = await axios.post('/api/admin/user_create', {
        account, password, name, pic, description, email, github, facebook
      })
      return resp.data
    } catch (error) {
      console.log(error)
    }
  }

  /**
   * @param {String} id
   * @param {String} account
   * @param {String} password
   * @param {String} name      // user name
   * @param {String} pic       // link or file path
   * @param {String} description
   * @param {String} email
   * @param {String} github    // link
   * @param {String} facebook  // link
   */
  async userUpdate ({ id, account, password, name, pic, description, email, github, facebook }) {
    try {
      const resp = await axios.post('/api/admin/user_update', {
        id, account, password, name, pic, description, email, github, facebook
      })
      return resp.data
    } catch (error) {
      console.log(error)
    }
  }

  /**
   * @param {Number} uid
   */
  async userDelete ({ uid }) {
    try {
      const resp = await axios.get('/api/admin/user_delete', {
        params: {
          uid
        }
      })
      return resp.data
    } catch (error) {
      console.log(error)
    }
  }
}

export default new User()
