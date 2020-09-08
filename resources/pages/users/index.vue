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
    <el-table :data="tableData">
      <el-table-column prop="id" label="ID" fixed width="50" />
      <el-table-column label="Avatar" width="100">
        <el-avatar v-if="prop.row.avatar" slot-scope="prop" :src="prop.row.avatar" />
        <el-avatar v-else slot-scope="prop"> {{prop.row.name}} </el-avatar>
      </el-table-column>
      <el-table-column prop="name" label="Name" width="100" />
      <el-table-column prop="account" label="Account" width="100" />
      <el-table-column prop="description" label="Description" />
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
      <el-table-column prop="created_datetime" label="Created Datetime" width="180" />
      <el-table-column prop="last_modified_datetime" label="Last Modified Datetime" width="180" />
      <el-table-column fixed="right" width="150">
        <template slot="header">
          <el-button type="primary" size="small" @click="$router.push('/users/add')">Add User</el-button>
        </template>
        <div class="d-flex">
          <el-button size="small" @click="$router.push('/users/edit')">Edit</el-button>
          <el-button type="danger" size="small">Delete</el-button>
        </div>
      </el-table-column>
    </el-table>
  </section>
</template>

<script>
import User from '@api/User'

export default {
  data () {
    return {
      keyword: '',
      tableData: []
    }
  },
  created () {
    this.queryData()
  },
  methods: {
    async queryData () {
      try {
        const resp = await User.getList()
        this.tableData = resp
        console.log(resp)
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>

<style lang="scss" src="./style.scss"></style>
