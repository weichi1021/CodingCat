<template>
  <div class="login">
    <div class="login__form">
      <div class="login__title">SIGN IN</div>
      <el-input
        class="login__input"
        placeholder="Username"
        autofocus
        v-model="form.account"></el-input>
      <el-input
        type="password"
        class="login__input"
        placeholder="Password"
        v-model="form.password"></el-input>
      <el-checkbox class="login__chkbox">Remember me</el-checkbox>
      <el-button type="primary" class="login__btn">SIGN IN</el-button>
      <div class="login__copyright">© 2020 CodingCat</div>
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
      }
    }
  }
}
</script>

<style lang="scss" src="./style.scss"></style>
