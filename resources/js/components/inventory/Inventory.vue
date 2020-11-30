<template>
    <div class="app">
        <center>
            <h2 class="border mt-5 mb-5">
                INVENTORY
            </h2>
        </center>

        <div class="for-summery-selected mt-2">
            <div class="row">   <!--profit row starts -->
                <div class="col-md-3 mb-5 mt-3 placeholder card-group summery-cards">
                    <div class="card card-header text-center">
                        <div class="card-body sum-details">
                            <span class="text-center details-place">
                              <h1 id="remainingCashVouchers">{{allCount.remainingCashVouchers}}</h1>
                              <h6>Remaining # Cash Vouchers</h6>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 mt-3 placeholder card-group summery-cards">
                    <div class="card card-header text-center">
                        <div class="card-body sum-details">
                            <span class="text-center details-place">
                              <h1 id="remainingVouchers">{{allCount.remainingVouchers}}</h1>
                              <h6>Remaining # Vouchers</h6>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 mt-3 placeholder card-group summery-cards">
                    <div class="card card-header text-center">
                        <div class="card-body sum-details">
                            <span class="text-center details-place">
                              <h1 id="purchasedCashVouchers">{{allCount.purchasedCashVouchers}}</h1>
                              <h6># Cash Vouchers Purchased</h6>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 mt-3 placeholder card-group summery-cards">
                    <div class="card card-header text-center">
                        <div class="card-body sum-last-month">
                            <span class="text-center details-place">
                              <h1 id="purchasedVouchers">{{ allCount.purchasedVouchers }}</h1>
                              <h6># Vouchers Purchased</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div> <!-- Row for summery -->
        </div><!-- End summery selected-->


        <div class="container mt-5">
            <center>
                <h4 class="border mt-5 mb-5">
                    REGULAR VOUCHERS
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
                    <th scope="col">Created By</th>
                    <th scope="col">Status</th>
                    <th scope="col" >Is Purchased</th>
                    <th scope="col" v-if="user[0].role_id === 1">Action</th>

                </tr>
                </thead>
                <tbody v-if="allVouchers.length">
                <tr v-for="(voucher) in allVouchers" :key="voucher.id">
                    <th scope="row">{{voucher.id}}</th>
                    <td>{{voucher.price}}</td>
                    <td>{{voucher.terms_conditions}}</td>
                    <td>{{voucher.validity_period}}</td>
                    <td>{{voucher.valid_till}}</td>
                    <td v-if="voucher.created_role === 1">Super Admin</td>
                    <td v-else-if="voucher.created_role === 2">Admin</td>
                    <td v-else>User</td>
                    <td v-if="voucher.is_approved === 1">Approved</td>
                    <td v-else>Pending</td>
                    <td v-if="voucher.is_purchased === 0">No</td>
                    <td v-else>Yes</td>
                    <td v-if="user[0].role_id === 1 && voucher.is_approved === 0">
                            <span class="action-links">
                                <a class="btn btn-success btn-sm active" name="for_chat" type="submit" v-on:click.prevent="alertDisplayToSubject(voucher.id,'Yes Approve it!')">Approve</a>
                            </span>
                    </td>
                    <td v-if="user[0].role_id === 1 && voucher.is_approved === 1">
                            <span class="action-links">
                                Approved by Super Admin
                            </span>
                    </td>

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
                    CASH VOUCHERS
                </h4>
            </center>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Price</th>
                    <th scope="col">Validity Period</th>
                    <th scope="col">Validity Till</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Is Purchased</th>

                </tr>
                </thead>
                <tbody v-if="allCashVouchers.length">
                <tr v-for="(cashVoucher) in allCashVouchers" :key="cashVoucher.id">
                    <th scope="row">{{cashVoucher.id}}</th>
                    <td>{{cashVoucher.price}}</td>
                    <td>{{cashVoucher.validity_period}}</td>
                    <td>{{cashVoucher.valid_till}}</td>
                    <td v-if="cashVoucher.created_role === 1">Super Admin</td>
                    <td v-else-if="cashVoucher.created_role === 2">Admin</td>
                    <td v-else>User</td>
                    <td v-if="cashVoucher.is_purchased ===0 ">No</td>
                    <td v-else>Yes</td>
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
            count:{
                remainingVouchers:'',
                remainingCashVouchers:'',
                purchasedVouchers:'',
                purchasedCashVouchers:'',
            },
            allCount:[],
            allVouchers:[],
            allCashVouchers:[],
            user:'',
        }
    },
    created() {
        this.user = JSON.parse(localStorage.getItem("user"));
        console.log('user = ',this.user);

        this.getCount();
        this.getAllVouchers();
        this.getAllCashVouchers();
    },
    methods:{
        getCount(){
            axios.get('/api/get-count').then(response => {
                console.log("Count - ",response.data)
                this.allCount = response.data;
            });
        },
        getAllVouchers(){
            axios.get('/api/get-all-vouchers').then(response => {
                console.log("All Vouchers",response.data)
                this.allVouchers = response.data;
            });
        },
        getAllCashVouchers(){
            axios.get('/api/get-all-cash-vouchers').then(response => {
                console.log("All Cash    Vouchers",response.data)
                this.allCashVouchers = response.data;
            });
        },
        alertDisplayToSubject(id,buttonText) {
            this.$swal({
                title: 'Are you sure?',
                text: 'You can\'t revert your action',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: buttonText,
                cancelButtonText: 'No, Keep it!',
                showCloseButton: true,
                showLoaderOnConfirm: true
            }).then((result) => {
                if(buttonText=='Yes Approve it!' && result.value){
                    axios.post('/api/approve-voucher/'+ id
                    ).then(response => {

                    });
                    this.getAllVouchers();
                }
            })

        },
    }
}
</script>

<style  scoped>

.card{
    width: 180px;
    height: 180px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

</style>
