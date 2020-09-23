<template>
  <el-container>
    <cc-menu />
    <el-container direction="vertical">
      <cc-header />
      <el-main class="cc-main">
        <router-view></router-view>
      </el-main>
    </el-container>
  </el-container>
</template>

<script>
import CcHeader from './Header'
import CcMenu from './Menu'

export default {
  components: {
    CcHeader,
    CcMenu
  }
}
</script>
