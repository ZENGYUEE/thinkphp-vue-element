<template>
  <el-dialog
    title="提示"
    :visible.sync="editVisible"
    width="30%"
    :before-close="handleClose"
    @open="open"
  >
    <el-form ref="editForm" :model="editForm" label-width="80px">
      <el-form-item label="文章标题">
        <el-input v-model="editForm.title"></el-input>
      </el-form-item>
      <el-form-item label="排序">
        <el-input v-model="editForm.sort"></el-input>
      </el-form-item>
      <el-form-item label="排序">
        <el-radio v-model="editForm.status" :label="1">启用</el-radio>
        <el-radio v-model="editForm.status" :label="0">禁用</el-radio>
      </el-form-item>
      <el-form-item label="文章内容">
        <el-input type="textarea" v-model="editForm.content"></el-input>
      </el-form-item>
    </el-form>
    <span slot="footer" class="dialog-footer">
      <el-button @click="cancel">取 消</el-button>
      <el-button type="primary" @click="save">确 定</el-button>
    </span>
  </el-dialog>
</template>

<script>
export default {
  name: "add",
  props: {
    editVisible: false,
    data: {}
  },
  data() {
    return {
      editForm: {
        title: "",
        sort: null,
        status: 1,
        content: "",
      },
    };
  },
  mounted() {
    // this.initData()
  },
  methods: {
    open() {
      // this.$refs.editForm.resetFields();
      this.initData();
    },
    initData() {
      this.editForm = Object.assign(this.editForm, this.data)
      // this.editForm.id = this.data.id
      // this.editForm.title = this.data.title
      // this.editForm.content = this.data.content
      // this.editForm.sort = this.data.sort
      // this.editForm.status = this.data.status
    },
    handleClose() {
      this.$refs.editForm.resetFields();
    },
    save() {
      this.$axios
        .post("http://www.thinkphp.io/index.php/api/articl/save", this.editForm)
        .then((res) => {
          let { data } = res;
          if (data.code === 1) {
            this.$message({
              type: "success",
              message: data.msg,
            });
            this.$emit("cancelFun");
            this.$emit("successFun");
          } else {
            this.$message({
              type: "error",
              message: data.msg,
            });
          }
        });
    },
    cancel() {
      this.$emit("cancelFun");
    },
  },
};
</script>

<style scoped></style>
