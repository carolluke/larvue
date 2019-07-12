<template>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Add Company</div>

                        <div class="card-body">
     <form @submit.prevent="addCompany" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" v-model="name"/>
            <div v-if = "errors && errors.name" class="text-danger">{{erors.name[0]}} </div>
            
        </div>
        
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" class="form-control" v-model="email" />
            <div v-if = "errors && errors.email" class="text-danger">{{erors.email[0]}} </div>
            
        </div>
        
        <div class="form-group">
            <label for="website">website</label>
           <input type="website" class="form-control" v-model="website" />
            <div v-if = "errors && errors.website" class="text-danger">{{errors.website[0]}} </div>
        </div>

        <div class="form-group">
            <label for="image">Logo</label>
           <input type="file" @change="onFileChange">
            <div v-if = "errors && errors.logo" class="text-danger">{{errors.image[0]}} </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Add Company</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
</template>
<script>
export default{
    data()     {
    return      {
                
                name:'',
                email:'',
                website:'',
                file:'',

                
                errors:{},
        
    }
 },
 methods:{
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

    addCompany() {
    
      this.errors = {};
      let uri='http://localhost:8000/api/company';
      axios.post(uri, {
      name: this.name,
      email:this.email,
      website: this.website,
      logo:this.image                                                        }).then(response => {
        this.$router.push({name: 'companies'});
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
  },
}
</script>