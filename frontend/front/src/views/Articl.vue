<template>
  <div class="">
    <el-breadcrumb separator="/" style="margin-bottom: 20px">
      <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
      <el-breadcrumb-item><a href="/">文章管理</a></el-breadcrumb-item>
      <el-breadcrumb-item>文章列表</el-breadcrumb-item>
    </el-breadcrumb>

    <!-- 表格内容 -->
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-button type="primary" size="small" @click="add">添加</el-button>
        <el-input
          placeholder="请输入内容"
          clearable
          v-model="page.keyword"
          style="width: 200px; margin-left: 20px"
        ></el-input>
        <el-button
          type="primary"
          size="small"
          @click="search"
          icon="el-icon-search"
          >查询</el-button
        >
      </div>

      <el-table :data="tableData" border style="width: 100%">
        <el-table-column type="index" label="序号" width="180">
        </el-table-column>
        <el-table-column prop="title" label="标题" width="180">
        </el-table-column>
        <el-table-column prop="content" label="内容"> </el-table-column>
        <el-table-column prop="create_time" label="创建时间"> </el-table-column>
        <el-table-column label="操作">
          <template slot-scope="scope">
            <!-- {{scope.row}} -->
            <el-button type="primary" size="mini" @click="edit(scope.row)"
              >编辑</el-button
            >
            <el-button type="danger" size="mini" @click="del(scope.row.id)"
              >删除</el-button
            >
          </template>
        </el-table-column>
      </el-table>

      <el-pagination
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
        :current-page="page.currentPage"
        :page-sizes="[1, 5, 10, 20]"
        :page-size="page.pageSize"
        layout="total, sizes, prev, pager, next, jumper"
        :total="page.total"
        style="margin-top: 20px"
      >
      </el-pagination>
    </el-card>

    <addArt
      :dialogVisible="dialogVisible"
      @cancelFun="dialogVisible = false"
      @successFun="getList"
    />
    <editArt
      :editVisible="editVisible"
      :data="editData"
      @cancelFun="editVisible = false"
      @successFun="getList"
    />
  </div>
</template>

<script>
import addArt from "@/components/Articl/add";
import editArt from "@/components/Articl/edit";
export default {
  name: "articl",
  components: {
    addArt,
    editArt,
  },
  data() {
    return {
      tableData: [],
      page: {
        page: 1,
        pageSize: 5,
        currentPage: 1,
        total: 1,
        keyword: "",
      },
      dialogVisible: false,
      editVisible: false,
      editData: {},
    };
  },
  created() {
    this.getList();
  },
  methods: {
    getList() {
      this.$axios
        .get("http://www.thinkphp.io/index.php/api/articl", {
          params: this.page,
        })
        .then((res) => {
          let { data } = res;
          // console.log(data);
          this.page.total = data.total;
          this.tableData = data.data;
        });
    },
    add() {
      // console.log("add");
      this.dialogVisible = true;
    },
    edit(info) {
      this.editVisible = true;
      this.editData = info;
    },
    del(id) {
      this.$confirm("此操作将永久删除该文件, 是否继续?", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(() => {
          this.$axios
            .post("http://www.thinkphp.io/index.php/api/articl/delete", {
              id: id,
            })
            .then((res) => {
              let { data } = res;
              if (data.code === 1) {
                this.$message({
                  type: "success",
                  message: data.msg,
                });
                this.getList();
              } else {
                this.$message({
                  type: "error",
                  message: data.msg,
                });
              }
            });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "已取消删除",
          });
        });
    },
    handleSizeChange(val) {
      // console.log(val);
      this.page.pageSize = val;
      this.getList();
    },
    handleCurrentChange(val) {
      // console.log(val);
      this.page.page = val;
      this.getList();
    },
    search() {
      this.getList();
    },
  },
};
</script>
<style scoped></style>
