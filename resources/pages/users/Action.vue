<template>
  <section name="users-action">
    <el-form ref="userForm" :model="form" :rules="rules" label-width="80px">
      <el-form-item label="Avatar" class="mb-1">
        <el-upload
          action=""
          class="avatar-uploader">
          <img v-if="form.pic" :src="form.pic" />
          <font-awesome-icon v-else icon="plus" class="text-secondary" />
        </el-upload>
      </el-form-item>
      <el-form-item label="Name" prop="name" class="w-75">
        <el-input v-model="form.name"></el-input>
      </el-form-item>
      <el-form-item label="Account" prop="account" class="w-75">
        <el-input v-model="form.account"></el-input>
      </el-form-item>
      <el-form-item label="Password" prop="password" class="w-75">
        <el-input type="password" :show-message="true" v-model="form.password"></el-input>
      </el-form-item>
      <el-form-item label="Description">
        <el-input type="textarea" v-model="form.description" :rows="5"></el-input>
      </el-form-item>
      <el-form-item label="Email">
        <el-input v-model="form.email"></el-input>
      </el-form-item>
      <el-form-item label="Github">
        <el-input v-model="form.github"></el-input>
      </el-form-item>
      <el-form-item label="Facebook">
        <el-input v-model="form.facebook"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit('userForm')">Save</el-button>
        <el-button @click="$router.push('/users')">Cancel</el-button>
      </el-form-item>
    </el-form>
  </section>
</template>

<script>
import User from '@api/User'

export default {
  data () {
    return {
      form: {
        id: null,
        name: '',
        account: '',
        password: '',
        pic: '',
        description: '',
        email: '',
        github: '',
        facebook: ''
      },
      rules: {
        account: [
          { required: true }
        ],
        password: [
          { required: true }
        ],
        name: [
          { required: true }
        ]
      }
    }
  },
  created () {
    const uid = this.$route.params.uid
    if (!isNaN(uid)) {
      this.form.id = uid
      this.getUserInfoById(this.form.id)
    }
  },
  methods: {
    async getUserInfoById (uid) {
      try {
        const resp = await User.getUserInfoById({ uid })
        this.form = { ...this.form, ...resp }
      } catch (error) {
        console.log(error)
      }
    },
    async onSubmit (formName) {
      try {
        const valid = await this.$refs[formName].validate()
        if (this.form.id) {
          const resp = await User.userUpdate(this.form)
          console.log(valid, resp)
        } else {
          const resp = await User.userCreate(this.form)
          console.log(valid, resp)
        }
        this.$router.push('/users')
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>
