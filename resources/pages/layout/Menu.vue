<template>
  <el-aside width="220px">
    <el-menu
      class="cc-menu h-100"
      router>
        <el-menu-item :route="{ path: '/' }" index="1" :class="{'is-active': $route.path === '/'}">
          <font-awesome-icon icon="home" class="cc-menu__icon mr-1" />
          <span slot="title">Home</span>
        </el-menu-item>
        <el-menu-item :route="{ path: '' }" index="2">
          <font-awesome-icon icon="file-word" class="cc-menu__icon mr-1" />
          <span slot="title">Articles</span>
        </el-menu-item>
        <el-menu-item :route="{ path: '' }" index="3">
          <font-awesome-icon icon="tags" class="cc-menu__icon mr-1" />
          <span slot="title">Tags</span>
        </el-menu-item>
        <el-menu-item :route="{ path: '/users' }" index="users" :class="{'is-active': /^(?=\/users)/i.test($route.path)}">
          <font-awesome-icon icon="users" class="cc-menu__icon mr-1" />
          <span slot="title">Users</span>
        </el-menu-item>
    </el-menu>
  </el-aside>
</template>
