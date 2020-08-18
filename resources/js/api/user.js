import axios from 'axios'

class User {
  /**
   * @param {string} account
   * @param {string} password
   */
  async login ({ account, password }) {
    try {
      const resp = await axios.post('/login', {
        account, password
      })
      return resp.data
    } catch (error) {
      throw (error.response.data)
    }
  }
}

export default new User()
