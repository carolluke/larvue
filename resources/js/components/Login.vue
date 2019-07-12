<template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Login</div>

                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" v-model="email" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" v-model="password" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary" @click="login">
                                            Login
                                        </button>
                                    </div>
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
            data(){
                return {
                    email : "",
                    password : ""
                }
            },
            methods : {
                login(e){
                    e.preventDefault()

                    if (this.password.length > 0) {
                    let uri = 'http://localhost:8000/api/login';
                        axios.post(uri, {
                            email: this.email,
                            password: this.password
                          })
                          .then(response => {
                            localStorage.setItem('user',response.data.success.name)
                            localStorage.setItem('myToken',response.data.success.token)

                            if (localStorage.getItem('myToken') != null){
                                this.$router.go('/company')
                            }
                          })
                          .catch(function (error) {
                            console.log(error);
                          });
                    }
                }
            },
            beforeRouteEnter (to, from, next) { 
                if (localStorage.getItem('myToken')) {
                    return next('company');
                }

                next();
            }
        }
    </script>
