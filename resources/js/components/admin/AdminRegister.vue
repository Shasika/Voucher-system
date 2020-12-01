<template>
    <div class="app">
        <center>
            <h2 class="border mt-5 mb-5">
                ADMIN REGISTER
            </h2>
        </center>
        <div class="container">
            <form class="form" role="form">
                <div class="form-group">
                    <input v-model="registration.name" id="regiNameInput" placeholder="Name" class="form-control form-control-sm" type="text" required="">
                </div>
                <div class="form-group">
                    <input v-model="registration.email" id="regiEmailInput" placeholder="Email" class="form-control form-control-sm" type="email" required="">
                </div>
                <div class="form-group">
                    <input v-model="registration.password" id="regiPassowrdInput" placeholder="Password" class="form-control form-control-sm" type="password" required="">
                </div>
                <div class="form-group">
                    <input v-model="registration.password_confirmation" id="regiConfirmPasswordInput" placeholder="Confirm Password" class="form-control form-control-sm" type="password" required="">
                    <p class="text-warning small">* Must similar with above password</p>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block" @click="register()">Register</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
        data(){
            return{
                registration:{
                    name:'',
                    email:'',
                    password:'',
                    password_confirmation:'',
                    role_id:2,
                },
            }
        },
        created() {

        },
        methods:{
            register(){
                axios.post('/api/register',
                    this.registration
                ).then(response => {
                });
                this.$router.push({path: "/user-dashboard"});
            }
        }

}
</script>

<style  scoped>

</style>
