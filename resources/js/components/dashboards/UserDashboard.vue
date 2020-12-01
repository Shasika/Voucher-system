<template>
    <div>
        <center>
            <h2 class="border mt-5">
                USER DASHBOARD
            </h2>
        </center>

        <div class="d-flex justify-content-center">
            <div v-if="user[0].role_id==1">
                <router-link to="/admin-register" class="nav-link">
                    <button type="button" class="btn btn-light">
                        <div class="tile wide job">
                            <div class="header">
                                <div class="count"></div>
                                <div class="title"></div>
                            </div>
                            <div class="body">
                                <div class="title">Admin</div>
                            </div>
                        </div>
                    </button>
                </router-link>
            </div>

            <div v-if="user[0].role_id==1 || user[0].role_id==2">
                <router-link to="/inventory" class="nav-link">
                    <button type="button" class="btn btn-light">
                        <div class="tile wide resource">
                            <div class="header">
                                <div class="count"></div>
                                <div class="title"></div>
                            </div>
                            <div class="body">
                                <div class="title">Inventory</div>
                            </div>
                        </div>
                    </button>
                </router-link>
            </div>

            <div v-if="user[0].role_id==3">
                <router-link to="/buy-voucher" class="nav-link">
                    <button type="button" class="btn btn-light">
                        <div class="tile wide resource">
                            <div class="header">
                                <div class="count"></div>
                                <div class="title"></div>
                            </div>
                            <div class="body">
                                <div class="title">Buy Vouchers</div>
                            </div>
                        </div>
                    </button>
                </router-link>
            </div>

            <div v-if="user[0].role_id == 3">
                <router-link to="/gift-vouchers" class="nav-link">
                    <button type="button" class="btn btn-light">
                        <div class="tile wide invoice">
                            <div class="header">
                                <div class="count"><i class="fa fa-group" style="font-size:336px"></i></div>
                                <div class="title"></div>
                            </div>
                            <div class="body">
                                <div class="title">Gift Vouchers</div>
                            </div>
                        </div>
                    </button>
                </router-link>
            </div>

            <div>
                <router-link to="/create-cash-voucher" class="nav-link">
                    <button type="button" class="btn btn-light">
                        <div class="tile wide quote">
                            <div class="header">
                                <div class="count"></div>
                                <div class="title"></div>
                            </div>
                            <div class="body">
                                <div class="title">Create Cash Vouchers</div>
                            </div>
                        </div>
                    </button>
                </router-link>
            </div>

            <div v-if="user[0].role_id != 3">
                <router-link to="/create-voucher" class="nav-link">
                    <button type="button" class="btn btn-light">
                        <div class="tile wide quote">
                            <div class="header">
                                <div class="count"></div>
                                <div class="title"></div>
                            </div>
                            <div class="body">
                                <div class="title">Create Vouchers</div>
                            </div>
                        </div>
                    </button>
                </router-link>
            </div>

            <div v-if="user[0].role_id==3">
                <router-link to="/my-profile" class="nav-link">
                    <button type="button" class="btn btn-light">
                        <div class="tile wide job">
                            <div class="header">
                                <div class="count"></div>
                                <div class="title"></div>
                            </div>
                            <div class="body">
                                <div class="title">My Profile</div>
                            </div>
                        </div>
                    </button>
                </router-link>
            </div>

        </div>

<!--        <div v-if="user[0].role_id==1" class="container">-->
<!--            <label>admin Register</label>-->
<!--            <form class="form" role="form">-->
<!--                <div class="form-group">-->
<!--                    <input v-model="registration.name" id="RegiNameInput" placeholder="Name" class="form-control form-control-sm" type="text" required="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input v-model="registration.email" id="RegiEmailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input v-model="registration.password" id="RegiPassowrdInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input v-model="registration.password_confirmation" id="RegiConfirmPasswordInput" placeholder="Confirm Password" class="form-control form-control-sm" type="text" required="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <button type="button" class="btn btn-primary btn-block" @click="register()">Register</button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
    </div>
</template>

<script>


export default {
    data(){
        return{
            user:'',
            // registration:{
            //     name:'',
            //     email:'',
            //     password:'',
            //     password_confirmation:'',
            //     role_id:2,
            // },
        }
    },
    created() {
        this.user = JSON.parse(localStorage.getItem("user"));
        console.log('user = ',this.user);
    },
    methods:{
        // register(){
        //     axios.post('/api/register',
        //         this.registration
        //     ).then(response => {
        //     });
        // }
    }
}
</script>

<style  scoped>
* {
    font-family: 'Open Sans', sans-serif;
    /*font-size:12px;*/
}

body {
    background-color:#ececec;
}

.container {
    margin: 50px 0 0 100px;
}

.tile {
    width:160px;
    height:180px;
    border-radius:4px;
    box-shadow: 2px 2px 4px 0 rgba(0,0,0,0.15);
    margin-top:20px;
    margin-left:20px;
    float:left;
}

.tile.wide {
    width: 340px;
}

.tile .header {
    height:120px;
    background-color:#f4f4f4;
    border-radius: 4px 4px 0 0;
    color:white;
    font-weight:300;
}

.tile.wide .header .left, .tile.wide .header .right {
    width:160px;
    float:left;
}

.tile .header .count {
    font-size: 48px;
    text-align:center;
    padding:10px 0 0;
}

.tile .header .title {
    font-size: 20px;
    text-align:center;
}

.tile .body {
    height:60px;
    border-radius: 0 0 4px 4px;
    color:#333333;
    background-color:white;
}

.tile .body .title {
    text-align:center;
    font-size:20px;
    padding-top:2%;
}

.tile.wide .body .title {
    padding:4%;
}

.tile.job .header {
    background: linear-gradient(to bottom right, #609931, #87bc27);
}

.tile.job  .body {
    color: #609931;
}

.tile.resource .header {
    background: linear-gradient(to bottom right, #ef7f00, #f7b200);
}

.tile.resource  .body {
    color: #ef7f00;
}

.tile.quote .header {
    background: linear-gradient(to bottom right, #1f6abb, #4f9cf2);
}

.tile.quote  .body {
    color: #1f6abb;
}

.tile.invoice .header {
    background: linear-gradient(to bottom right, #0aa361, #1adc88);
}

.tile.invoice  .body {
    color: #0aa361;
}
</style>
