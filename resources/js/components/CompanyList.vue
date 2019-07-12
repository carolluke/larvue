<template>
  <div>
      <h1>Companies</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class=" form-group col-md-2">
            <router-link :to="{ name: 'company' }" class="btn btn-primary">Add Company</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th> Name</th>
                <th> Email</th>
                <th>Website</th>
                <th> Logo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="company in companies">
                    <td>{{ company.id }}</td>
                    <td>{{ company.name }}</td>
                    <td>{{ company.email }}</td>
                    <td>{{ company.website }}</td>
                    <td>{{ company.logo }}</td>
                    <td><router-link :to="{name: 'EditCompany', params: { id: company.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deleteCompany(company.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          companies: []
        }
      },
      created() {
      let uri = 'http://localhost:8000/api/companies';
      this.axios.get(uri).then(response => {
        this.companies = response.data.data;
      }).
      catch(function(resp){ 
      console.log(resp);
      alert("Failed to load companies");
      });
    },
    methods: {
      deleteCompany(id)
      {
      if(confirm("Do you really want to delete it?"))
      {
      let uri = `http://localhost:8000/api/company/delete/${id}`;

        this.axios.delete(uri).then(response => {
          this.companies.splice(this.companies.indexOf(id), 1);
        }).
        catch(function(resp) { alert("Could not delete company");
         });

      }

        
      }
    }
  }
</script>