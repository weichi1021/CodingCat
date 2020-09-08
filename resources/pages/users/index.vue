<template>
  <section name="users">
    <el-input
      class="mb-3"
      placeholder="Search for ID or Name"
      v-model="keyword">
      <font-awesome-icon slot="prefix" icon="search" class="el-input__icon ml-1" />
    </el-input>
    <div class="h5 mb-3 text-secondary">
      Total: <b>2</b>
    </div>
    <el-table :data="tableData">
      <el-table-column prop="id" label="ID" fixed width="50" />
      <el-table-column label="Avatar" width="100">
        <el-avatar slot-scope="prop" :src="prop.row.avatar" />
      </el-table-column>
      <el-table-column prop="name" label="Name" width="100" />
      <el-table-column prop="desc" label="Description" width="200" />
      <el-table-column prop="article_count" label="Articles Total" width="115"  />
      <el-table-column label="Link">
        <div class="d-flex">
          <el-link href="https://element.eleme.io" target="_blank" class="h4 mr-3">
            <font-awesome-icon :icon="['far', 'envelope']" />
          </el-link>
          <el-link href="https://element.eleme.io" target="_blank" class="h4 mr-3">
            <font-awesome-icon :icon="['fab', 'github']" />
          </el-link>
          <el-link href="https://element.eleme.io" target="_blank" class="h4 mr-3">
            <font-awesome-icon :icon="['fab', 'facebook']" />
          </el-link>
        </div>
      </el-table-column>
      <el-table-column prop="role_name" label="Role" />
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
// import User from '@api/user'

export default {
  data () {
    const item = {
      id: '1',
      avatar: 'https://avatars2.githubusercontent.com/u/23696292?s=88&u=1222f0b983f314c5f5e35e98c6179c80cc08aea9&v=4',
      name: 'Vicky Wen',
      desc: '這是自我介紹.....',
      role_name: 'Admin',
      article_count: 2,
      created_datetime: '2020-01-07 09:15:43',
      last_modified_datetime: '2020-01-07 09:15:43'
    }
    return {
      keyword: '',
      tableData: Array(2).fill(item)
    }
  }
  // async created () {
  //   const resp = await User.getList()
  //   console.log(resp)
  // }
}
</script>

<style lang="scss" src="./style.scss"></style>
