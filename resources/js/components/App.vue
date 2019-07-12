  <template>
        <div>
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <router-link :to="{name: 'home'}" class="navbar-brand">Home</router-link>

                    <router-link :to="{ name: 'company' }" class="navbar-brand" v-if="isLoggedIn">Company </router-link>

                     <router-link :to="{ name: 'company' }" class="navbar-brand" v-if="isLoggedIn">Employee</router-link>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
        <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
        <router-link :to="{ name: 'signup' }" class="nav-link" v-if="!isLoggedIn">Signup</router-link>

        <li class="nav-link" v-if="isLoggedIn"> Hi, {{name}}</li>


        

        <a v-bind:href="logout" class="nav-link" v-if="isLoggedIn">Logout</a>
    
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <router-view></router-view>
            </main>
        </div>
    </template>
    
    <script>
   export default {
        data(){
            return {
                isLoggedIn : null,
                name : null,
                logout: "http://localhost:8000/api/logout",
            }
        },
        mounted(){
            this.isLoggedIn = localStorage.getItem('myToken')
            this.name = localStorage.getItem('user')
        }
    }
    </script>