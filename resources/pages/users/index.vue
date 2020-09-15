<template>
  <section name="users">
    <el-input
      class="mb-3"
      placeholder="Search for ID or Name"
      v-model="keyword">
      <font-awesome-icon slot="prefix" icon="search" class="el-input__icon ml-1" />
    </el-input>
    <div class="h5 mb-3 text-secondary">
      Total: <b>{{ tableData.length }}</b>
    </div>
    <el-table :data="tableData"  v-loading="apiSending">
      <el-table-column prop="id" label="ID" fixed width="50" />
      <el-table-column label="Avatar" width="100">
        <el-avatar v-if="prop.row.avatar" slot-scope="prop" :src="prop.row.avatar" />
        <el-avatar v-else slot-scope="prop"> {{prop.row.name}} </el-avatar>
      </el-table-column>
      <el-table-column prop="name" label="Name" width="100" />
      <el-table-column prop="account" label="Account" width="100" />
      <el-table-column label="Description">
        <span slot-scope="prop">
          {{ prop.row.description || '--'}}
        </span>
      </el-table-column>
      <!-- TODO: article total -->
      <!-- <el-table-column prop="article_count" label="Articles Total" width="115" /> -->
      <el-table-column label="Link" width="120">
        <div class="d-flex" slot-scope="prop">
          <el-link :href="`mailto:${prop.row.email}`" :disabled="!prop.row.email" target="_blank" class="h4 mr-3">
            <font-awesome-icon :icon="['far', 'envelope']" />
          </el-link>
          <el-link :href="prop.row.github" :disabled="!prop.row.github" target="_blank" class="h4 mr-3">
            <font-awesome-icon :icon="['fab', 'github']" />
          </el-link>
          <el-link :href="prop.row.facebook" :disabled="!prop.row.facebook" target="_blank" class="h4 mr-3">
            <font-awesome-icon :icon="['fab', 'facebook']" />
          </el-link>
        </div>
      </el-table-column>
      <el-table-column label="Created Datetime" width="180" >
        <span slot-scope="prop">
          {{ formatDateTime(prop.row.created_datetime) || '--'}}
        </span>
      </el-table-column>
      <el-table-column label="Last Modified Datetime" width="180">
        <span slot-scope="prop">
          {{ formatDateTime(prop.row.last_modified_datetime) || '--' }}
        </span>
      </el-table-column>
      <el-table-column fixed="right" width="150">
        <template slot="header">
          <el-button type="primary" size="small" @click="$router.push('/users/add')">Add User</el-button>
        </template>
        <div class="d-flex" slot-scope="prop">
          <el-button size="small" @click="$router.push(`/users/${prop.row.id}`)">Edit</el-button>
          <el-button type="danger" size="small"
            v-if="userInfo && (userInfo.id !== prop.row.id)"
            @click="btnDeleteUser(prop.row)">Delete</el-button>
        </div>
      </el-table-column>
    </el-table>
  </section>
</template>

<script>
import { mapState } from 'vuex'
import User from '@api/User'

export default {
  data () {
    return {
      apiSending: true,
      keyword: '',
      tableData: []
    }
  },
  created () {
    this.queryData()
  },
  computed: {
    ...mapState(['userInfo'])
  },
  methods: {
    async queryData () {
      this.apiSending = true
      try {
        const resp = await User.getList()
        this.tableData = resp
        console.log(resp)
      } catch (error) {
        console.log(error)
      }
      this.apiSending = false
    },
    async btnDeleteUser (item) {
      console.log(item)
      const text = 'Are you sure you want to delete this account?<br/>Deleting this account is permanent and will remove all content.'
      try {
        await this.$confirm(text, `Delete User: ${item.name}`, {
          dangerouslyUseHTMLString: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel'
        })
        await User.userDelete({ uid: item.id })
        await this.queryData()
        this.$message({ type: 'success', message: 'Delete Success!' })
      } catch (error) {
        console.log('error')
      }
    },
    formatDateTime (datetime) {
      const date = new Date(datetime)
      const year = date.getFullYear()
      const month = date.getMonth() + 1
      const day = date.getDate()
      const hour = date.getHours()
      const minutes = date.getMinutes()
      const seconds = date.getSeconds()
      return datetime ? `${this.fillZero(month)}/${this.fillZero(day)}/${year} ${this.fillZero(hour)}:${this.fillZero(minutes)}:${this.fillZero(seconds)}` : null
    },
    fillZero (num) {
      return (+num < 10) ? '0' + num : num
    }
  }
}
</script>

<style lang="scss" src="./style.scss"></style>
