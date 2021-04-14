<template>
  <el-container class="home-container">
    <el-aside width="200px" style="background-color: rgb(238, 241, 246)">
      <el-menu :router="true">
        <el-submenu index="1">
          <template slot="title"
            ><i class="el-icon-message"></i>文章管理</template
          >
          <el-menu-item index="articl">文章列表</el-menu-item>
        </el-submenu>
      </el-menu>
    </el-aside>

    <el-container>
      <el-header>
        <el-button type="primary" @click="logout">退出</el-button>
      </el-header>

      <el-main>
        <router-view></router-view>
      </el-main>
      <!-- <el-footer>footer</el-footer> -->
    </el-container>
  </el-container>
</template>
<script>
export default {
  name: "home",
  data() {
    const item = {
      date: "2016-05-02",
      name: "王小虎",
      address: "上海市普陀区金沙江路 1518 弄",
    };
    return {
      tableData: Array(20).fill(item),
    };
  },
  created() {

  },
  methods: {
    logout() {
      window.sessionStorage.clear()
      this.$router.push('/login')
    }
  }
};
</script>
<style scoped>
.home-container {
  height: 100%;
}
.el-header {
  background-color: #b3c0d1;
  color: #333;
  line-height: 60px;
}

.el-aside {
  color: #333;
}
</style>