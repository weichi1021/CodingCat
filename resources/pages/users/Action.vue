<template>
  <section name="users-action">
    <el-form ref="form" :model="form" label-width="80px">
      <el-form-item label="Avatar" class="mb-1">
        <el-upload
          action=""
          class="avatar-uploader">
          <img v-if="form.avatar" :src="form.avatar" />
          <font-awesome-icon v-else icon="plus" class="text-secondary" />
        </el-upload>
      </el-form-item>
      <el-form-item label="Account" class="w-75">
        <el-input v-model="form.account"></el-input>
      </el-form-item>
      <el-form-item label="Password" class="w-75">
        <el-input type="password" :show-message="true" v-model="form.password"></el-input>
      </el-form-item>
      <el-form-item label="Name" class="w-75">
        <el-input v-model="form.name"></el-input>
      </el-form-item>
      <el-form-item label="Description">
        <el-input type="textarea" v-model="form.desc" :rows="5"></el-input>
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
        <el-button type="primary" @click="onSubmit">Save</el-button>
        <el-button @click="$router.push('/users')">Cancel</el-button>
      </el-form-item>
    </el-form>
  </section>
</template>

<script>
export default {
  data () {
    return {
      form: {
        avatar: '',
        account: '',
        password: '',
        name: '',
        desc: '',
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
  methods: {
    onSubmit () {
      console.log('submit!')
    }
  }
}
</script>
