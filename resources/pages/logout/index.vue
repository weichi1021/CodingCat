<template>
  <div class="p-4">Logout ...</div>
</template>

<script>
import User from '@api/User'

export default {
  created () {
    this.logout()
  },
  methods: {
    async logout () {
      try {
        await User.logout()
        this.$router.push('/login')
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>
