<template>
  <div class="login d-flex align-items-center justify-content-center position-relative">
    <div class="login__form position-relative m-3">
      <div class="text-center">
        <img class="d-inline-block" alt="icon" width="70px"
          :src="require('../../images/icon.svg')" />
      </div>
      <div class="h1 text-secondary text-center mb-4">SIGN IN</div>
      <el-input
        class="mb-3"
        placeholder="Username"
        autofocus
        v-model="form.account"></el-input>
      <el-input
        type="password"
        class="mb-3"
        placeholder="Password"
        v-model="form.password"></el-input>
      <el-checkbox class="text-secondary mb-4">Remember me</el-checkbox>
      <el-button type="primary" class="mb-5 d-block w-100">SIGN IN</el-button>
      <div class="h6 text-placeholder text-center">© {{ thisYear }} CodingCat</div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        account: null,
        password: null
      },
      thisYear: null
    }
  },
  created () {
    this.thisYear = new Date().getFullYear()
  }
}
</script>

<style lang="scss" src="./style.scss"></style>
