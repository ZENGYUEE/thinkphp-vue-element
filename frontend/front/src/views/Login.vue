<template>
  <el-form ref="form" :model="loginform" label-width="80px">
    <el-form-item label="账号">
      <el-input v-model="loginform.username"></el-input>
    </el-form-item>
    <el-form-item label="密码">
      <el-input type="password" v-model="loginform.password"></el-input>
    </el-form-item>
    <el-form-item>
      <el-button type="primary" @click="login">登录</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
export default {
  name: "login",
  data() {
    return {
      loginform: {
        username: 'admin',
        password: '123456'
      }
    };
  },
  created() {
    // this.login();
  },
  methods: {
    login() {
      // console.log('login')
      // console.log(this.$axios)
      // this.$axios.get("http://www.thinkphp.io/index.php/api/login", {params: this.loginform});
      this.$axios.post("http://www.thinkphp.io/index.php/api/login/login", this.loginform).then(res => {
        const {data} = res
        // console.log(data)
        // 登录成功以后  -- message 组件
        if(data.code === 1) {
          this.$message({
            type: 'success',
            message: data.msg
          });

          window.sessionStorage.setItem('token', data.token)

          this.$router.push('/')
        }else{
          this.$message({
            type: 'error',
            message: data.msg
          });
        }
      });
    },
  },
};
</script>
<style scoped>
</style>