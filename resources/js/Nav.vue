<template>
    <div class="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">

                <a class="navbar-brand text-left" href="/user-dashboard">Dashboard</a>
<!--            <div class="container">-->
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                    &#9776;
                </button>
                <div class="collapse navbar-collapse" id="exCollapsingNavbar">
<!--                    <ul class="nav navbar-nav">-->
<!--                        <li class="nav-item"><a href="#" class="nav-link">About</a></li>-->
<!--                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>-->
<!--                        <li class="nav-item"><a href="#" class="nav-link">Service</a></li>-->
<!--                        <li class="nav-item"><a href="#" class="nav-link">More</a></li>-->
<!--                    </ul>-->
                    <ul class="nav navbar-nav flex-row text-right">
                        <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                        <li class="dropdown order-1">
                            <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right mt-2">
                                <li class="px-3 py-2">
                                    <form class="form" role="form">
                                        <div class="form-group">
                                            <input v-model="login.email" id="emailInput" placeholder="Email" class="form-control form-control-sm" type="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <input v-model="login.password" id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" required="">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-block" @click="log()">Login</button>
                                        </div>
                                        <div class="form-group text-center">
                                            <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
                                        </div>
                                    </form>
                                </li>
                            </ul>

                        </li>
                    </ul>

                    <ul class="nav navbar-nav flex-row text-right align-content-end">
                        <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                        <li class="dropdown order-1">
                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Register <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right mt-2">
                                <li class="px-3 py-2">
                                    <form class="form" role="form">
                                        <div class="form-group">
                                            <input v-model="registration.name" id="RegiNameInput" placeholder="Name" class="form-control form-control-sm" type="text" required="">
                                        </div>
                                        <div class="form-group">
                                            <input v-model="registration.email" id="RegiEmailInput" placeholder="Email" class="form-control form-control-sm" type="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <input v-model="registration.password" id="RegiPassowrdInput" placeholder="Password" class="form-control form-control-sm" type="password" required="">
                                        </div>
                                        <div class="form-group">
                                            <input v-model="registration.password_confirmation" id="RegiConfirmPasswordInput" placeholder="Confirm Password" class="form-control form-control-sm" type="password" required="">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-block" @click="register()">Register</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>

                        </li>
                    </ul>
                    <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                        <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                        <li class="dropdown order-1">
                            <button type="button" id="dropdownMenu" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle" @click="logout()">Logout <span class="caret"></span></button>

                        </li>
                    </ul>

                </div>
<!--            </div>-->
        </nav>

        <div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Forgot password</h3>
                        <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Reset your password..</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
export default {
    name:'Nav',
    data(){
        return{
            login:{
                email:'',
                password:'',
            },
            registration:{
                name:'',
                email:'',
                password:'',
                password_confirmation:''
            },
            currentRoute:'',


        }
    },
    mounted() {

    },
    methods:{
        log() {
            axios.post('/api/login', this.login
            ).then(response => {
                console.log("********", response.data[0].token);
                if (response.data.error) {
                    alert('Invalid Credentials');
                } else {
                    localStorage.setItem("user", JSON.stringify(response.data.user, response.data.token));
                    localStorage.setItem("token", JSON.stringify(response.data[0].token));
                    this.$router.push({path: "/user-dashboard"});
                    console.log('***++',this.$router.currentRoute.name)
                    this.currentRoute = this.$router.currentRoute.name;
                }

            });

        },
        register(){
            axios.post('/api/register',
                this.registration
            )
                .then(function (response) {

                    console.log(response.data);
                })
            this.$router.push({path: "/"});
        },
        logout(){
            localStorage.removeItem("user");
            localStorage.removeItem("token");
            this.$router.push({path: "/"});
            location.reload();
        }

    }

}
</script>

<style  scoped>

button:focus {
    outline: 0;
}

.navbar .dropdown-menu .form-control {
    width: 200px;
}

</style>
