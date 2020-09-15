import User from '@api/User'

const actions = {
  async getUserInfo ({ commit }) {
    try {
      const resp = await User.getUserInfo()
      commit('SET_USERINFO', resp)
    } catch (error) {
      console.log(error)
    }
  }
}

export default actions
