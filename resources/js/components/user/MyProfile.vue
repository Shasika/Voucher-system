<template>
    <div class="app">
        <center>
            <h2 class="border mt-5 mb-5">
                MY PROFILE
            </h2>
        </center>
        <div class="container p-3 my-3 bg-dark text-white">
            <form>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name : </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext text-white border-light" id="name" :value="user[0].name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email : </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext text-white border-light" id="email" :value="user[0].email">
                    </div>
                </div>
            </form>
        </div>

        <div class="container mt-5">
            <center>
                <h4 class="border mt-5 mb-5">
                    Cash Vouchers - Purchase History
                </h4>
            </center>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Price</th>
                    <th scope="col">Validity Period</th>
                    <th scope="col">Validity Till</th>
                    <th scope="col">Purchased Date</th>

                </tr>
                </thead>
                <tbody v-if="allCashVouchers.length">
                <tr v-for="(cashVouchers) in allCashVouchers" :key="cashVouchers.id">
                    <th scope="row">{{cashVouchers.id}}</th>
                    <td>{{cashVouchers.price}}</td>
                    <td>{{cashVouchers.validity_period}}</td>
                    <td>{{cashVouchers.valid_till}}</td>
                    <td>{{cashVouchers.created_at}}</td>
                </tr>
                </tbody>
                <tbody v-else>
                <tr>
                    <td colspan="6">No data available in table</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="container mt-5">
            <center>
                <h4 class="border mt-5 mb-5">
                    Regular Vouchers - Purchase History
                </h4>
            </center>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Price</th>
                    <th scope="col">Terms & Conditions</th>
                    <th scope="col">Validity Period</th>
                    <th scope="col">Validity Till</th>
                    <th scope="col">Purchased Date</th>

                </tr>
                </thead>
                <tbody v-if="allRegularVouchers.length">
                <tr v-for="(regularVouchers) in allRegularVouchers" :key="regularVouchers.id">
                    <th scope="row">{{regularVouchers.id}}</th>
                    <td>{{regularVouchers.price}}</td>
                    <td>{{regularVouchers.terms_conditions}}</td>
                    <td>{{regularVouchers.validity_period}}</td>
                    <td>{{regularVouchers.valid_till}}</td>
                    <td>{{regularVouchers.created_at}}</td>
                </tr>
                </tbody>
                <tbody v-else>
                <tr>
                    <td colspan="6">No data available in table</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            user:'',
            allCashVouchers:'',
            allRegularVouchers:'',
        }
    },
    created() {
        this.user = JSON.parse(localStorage.getItem("user"));
        console.log('user = ',this.user);

        this.getPurchasedCashVouchers();
        this.getPurchasedRegularVouchers();
    },
    methods:{
        getPurchasedCashVouchers(){
            axios.get('/api/get-purchased-cash-vouchers/' +this.user[0].id).then(response => {
                console.log("All Cash Vouchers",response.data)
                this.allCashVouchers = response.data;
            });
        },
        getPurchasedRegularVouchers(){
            axios.get('/api/get-purchased-regular-vouchers/' +this.user[0].id).then(response => {
                console.log("All Regular Vouchers",response.data)
                this.allRegularVouchers = response.data;
            });
        },
    }
}
</script>

<style  scoped>

</style>
