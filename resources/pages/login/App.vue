<template>
  <div class="login d-flex align-items-center justify-content-center position-relative">
    <div class="login__form position-relative m-3">
      <div class="text-center">
        <img class="d-inline-block" alt="icon" width="70px"
          :src="require('../../images/icon.svg')" />
      </div>
      <div class="h1 text-secondary text-center mb-4">SIGN IN</div>
      <el-form :model="loginForm" ref="loginForm" :rules="rules">
        <el-form-item prop="account">
          <el-input
            placeholder="Account"
            autoFocus
            v-model="loginForm.account"></el-input>
        </el-form-item>
        <el-form-item prop="password">
          <el-input
            type="password"
            placeholder="Password"
            :show-message="true"
            v-model="loginForm.password"></el-input>
        </el-form-item>
        <el-form-item>
          <el-checkbox class="text-secondary mb-4">Remember me</el-checkbox>
          <el-button type="primary" class="mb-5 d-block w-100"
            :disabled="apiSending"
            @click="submitForm('loginForm')">SIGN IN</el-button>
        </el-form-item>
      </el-form>
      <div class="h6 text-placeholder text-center">© {{ thisYear }} CodingCat</div>
    </div>
  </div>
</template>

<script>
import User from '../../js/api/User'

export default {
  data () {
    return {
      thisYear: null,
      apiSending: false,
      errorList: [],
      loginForm: {
        account: null,
        password: null
      },
      rules: {
        account: [
          { required: true }
        ],
        password: [
          { required: true }
        ]
      }
    }
  },
  created () {
    this.thisYear = new Date().getFullYear()
  },
  methods: {
    async submitForm (formName) {
      if (this.apiSending) return
      this.apiSending = true
      try {
        const valid = await this.$refs[formName].validate()
        const resp = await User.login(this.loginForm)
        console.log(valid, resp)
      } catch (error) {
        this.$message.error('Failed to login.')
        console.log(error)
      }
      this.apiSending = false
    }
  }
}
</script>

<style lang="scss" src="./style.scss"></style>
