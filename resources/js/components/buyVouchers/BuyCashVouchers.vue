<template>
    <div class="app">
        <center>
            <h2 class="border mt-5 mb-5">
                BUY VOUCHER
            </h2>
        </center>

        <div class="container mt-5">
            <center>
                <h4 class="border mt-5 mb-5">
                    MY CASH VOUCHERS
                </h4>
            </center>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Price</th>
                    <th scope="col">Validity Period</th>
                    <th scope="col">Validity Till</th>
                    <th scope="col">Purchase</th>

                </tr>
                </thead>
                <tbody v-if="allVouchers.length">
                <tr v-for="(voucher) in allVouchers" :key="voucher.id">
                    <th scope="row">{{voucher.id}}</th>
                    <td>{{voucher.price}}</td>
                    <td>{{voucher.validity_period}}</td>
                    <td>{{voucher.valid_till}}</td>
                    <td v-if="voucher.is_purchased === 0">
                            <span class="action-links">
                                <a class="btn btn-success btn-sm active" name="for_chat" type="submit" v-on:click.prevent="alertDisplayToSubject(voucher.id,'cash','Payment Proceed',voucher)">Buy</a>
                            </span>
                    </td>
                    <td v-else>
                            <span class="action-links">
                                Bought
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
                    <th scope="col">Purchase</th>

                </tr>
                </thead>
                <tbody v-if="allRegularVouchers.length">
                <tr v-for="(regularVouchers) in allRegularVouchers" :key="regularVouchers.id">
                    <th scope="row">{{regularVouchers.id}}</th>
                    <td>{{regularVouchers.price}}</td>
                    <td>{{regularVouchers.terms_conditions}}</td>
                    <td>{{regularVouchers.validity_period}}</td>
                    <td>{{regularVouchers.valid_till}}</td>
                    <td v-if="regularVouchers.is_purchased === 0">
                            <span class="action-links">
                                <a class="btn btn-success btn-sm active" name="for_chat" type="submit" v-on:click.prevent="alertDisplayToSubject(regularVouchers.id,'regular','Payment Proceed',regularVouchers)">Buy</a>
                            </span>
                    </td>
                    <td v-else>
                            <span class="action-links">
                                Bought
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

    </div>
</template>

<script>
export default {
    data(){
        return{
            allVouchers:[],
            allRegularVouchers:[],
            user:'',
        }
    },
    created() {
        this.user = JSON.parse(localStorage.getItem("user"));
        console.log('user = ',this.user);
        this.getAllVouchers();
        this.getAllRegularVouchers();
    },
    methods:{
        getAllVouchers(){
            axios.get('/api/get-vouchers-by-id/' +this.user[0].id).then(response => {
                console.log("All Vouchers",response.data)
                this.allVouchers = response.data;
            });
        },
        getAllRegularVouchers(){
            axios.get('/api/get-all-vouchers').then(response => {
                console.log("All Vouchers",response.data)
                this.allRegularVouchers = response.data;
            });
        },
        alertDisplayToSubject(id,type,buttonText,voucher) {
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
                if(type=='cash' && result.value){
                    axios.post('/api/buy-cash-voucher/'+this.user[0].id,voucher
                    ).then(response => {

                    });
                    this.getAllVouchers();
                    this.getAllRegularVouchers();
                }
                else if(type=='regular' && result.value){
                    axios.post('/api/buy-regular-voucher/'+this.user[0].id,voucher
                    ).then(response => {

                    });
                    this.getAllVouchers();
                    this.getAllRegularVouchers();
                }
            })

        },
    }
}
</script>

<style  scoped>

</style>
