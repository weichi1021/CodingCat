<template>
  <el-header height="55px" class="cc-navbar d-flex justify-content-between align-items-center">
    <!-- Path -->
    <el-breadcrumb separator="/">
      <el-breadcrumb-item :to="{ path: '/' }">Home</el-breadcrumb-item>
      <template v-for="(item, index) in pathList">
        <el-breadcrumb-item
          class="text-first-uppercase"
          v-if="(index+1) !== pathList.length"
          :key="`path-${index}`"
          :to="`/${item}`">{{ item }}</el-breadcrumb-item>
        <el-breadcrumb-item
          class="text-first-uppercase"
          v-else
          :key="`path-${index}`">{{ item }}</el-breadcrumb-item>
      </template>
    </el-breadcrumb>
    <!-- Avatar -->
    <el-dropdown>
      <div class="el-dropdown-link d-flex">
        <el-avatar> user </el-avatar>
      </div>
      <el-dropdown-menu slot="dropdown">
        <el-dropdown-item @click.native="btnLogout">Logout</el-dropdown-item>
      </el-dropdown-menu>
    </el-dropdown>
  </el-header>
</template>

<script>
import User from '@api/User'

export default {
  data () {
    return {
      pathList: []
    }
  },
  created () {
    this.getPath(this.$route.path)
  },
  watch: {
    $route (to, from) {
      this.getPath(to.path)
    }
  },
  methods: {
    getPath (path) {
      this.pathList = path.substr(1) ? path.substr(1).split('/') : []
    },
    async btnLogout () {
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
