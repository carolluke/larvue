<template>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Edit Company</div>

                        <div class="card-body">
    <form @submit.prevent="updateCompany" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" v-model="company.name">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" v-model="company.email">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Website:</label>
            <input type="text" class="form-control" v-model="company.website">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Logo:</label>
            <input type="file" @change="onFileChange">
          </div>
        </div>
        </div>
        <br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          company: {}
        }
      },
      created() {
        let uri = `http://localhost:8000/api/companies/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.company = response.data;
        });
      },
      methods: {
      onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
        updateCompany() {
          let uri = `http://localhose:8000/api/companies/update/${this.$route.params.id}`;
          this.axios.post(uri, this.post).then((response) => {
            this.$router.push({name: 'companies'});
          });
        }
      }
    }
</script>