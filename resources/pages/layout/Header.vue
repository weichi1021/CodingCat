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
    <el-dropdown v-if="userInfo" @command="(command) => {$router.push(command)}">
      <div class="el-dropdown-link d-flex">
        <el-avatar>{{ userInfo.name || 'User' }}</el-avatar>
      </div>
      <el-dropdown-menu slot="dropdown" :click="true">
        <el-dropdown-item :command="`/users/${userInfo.id}`">
          My Profile
        </el-dropdown-item>
        <el-dropdown-item :command="`/logout`" divided>Logout</el-dropdown-item>
      </el-dropdown-menu>
    </el-dropdown>
  </el-header>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  data () {
    return {
      pathList: []
    }
  },
  created () {
    this.getPath(this.$route.path)
    this.getUserInfo()
  },
  watch: {
    $route (to, from) {
      this.getPath(to.path)
    }
  },
  computed: {
    ...mapState(['userInfo'])
  },
  methods: {
    ...mapActions(['getUserInfo']),
    getPath (path) {
      this.pathList = path.substr(1) ? path.substr(1).split('/') : []
    }
  }
}
</script>
