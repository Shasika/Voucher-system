<template>
    <div class="app">
        <center>
            <h2 class="border mt-5 mb-5">
                GIFT VOUCHERS
            </h2>
        </center>
        <div class="container mt-5">
            <center>
                <h4 class="border mt-5 mb-5">
                    Cash Vouchers - Purchased List
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
                    <th scope="col">Gift To Other</th>

                </tr>
                </thead>
                <tbody v-if="allCashVouchers.length">
                <tr v-for="(cashVouchers) in allCashVouchers" :key="cashVouchers.id">
                    <th scope="row">{{cashVouchers.id}}</th>
                    <td>{{cashVouchers.price}}</td>
                    <td>{{cashVouchers.validity_period}}</td>
                    <td>{{cashVouchers.valid_till}}</td>
                    <td>{{cashVouchers.created_at}}</td>
                    <td>
                            <span class="action-links">
                                <a class="btn btn-success btn-sm active" name="for_chat" type="submit" v-on:click.prevent="alertDisplayToSubject(cashVouchers.id,'cash','Proceed',cashVouchers)">Send a Gift</a>
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
                    Regular Vouchers - Purchased List
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
                    <th scope="col">Gift To Other</th>

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
                    <td>
                            <span class="action-links">
                                <a class="btn btn-success btn-sm active" name="for_chat" type="submit" v-on:click.prevent="alertDisplayToSubject(regularVouchers.id,'regular','Proceed',regularVouchers)">Send a Gift</a>
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
            user:'',
            allCashVouchers:'',
            allRegularVouchers:'',
            gift:{
                id:'',
                price:'',
                validityPeriod:'',
                validTill:'',
                email:'',
            }
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
        alertDisplayToSubject(id,type,buttonText,voucher) {
            this.gift.id = voucher.id;
            this.gift.price = voucher.price;
            this.gift.validityPeriod = voucher.validity_period;
            this.gift.validTill = voucher.valid_till;
            this.$swal({
                title: 'Are you sure?',
                text: 'You can\'t revert your action',
                type: 'warning',
                input:"text",
                showCancelButton: true,
                confirmButtonText: buttonText,
                cancelButtonText: 'No, Keep it!',
                showCloseButton: true,
                showLoaderOnConfirm: true
            }).then((result) => {
                console.log('*******',result.value);
                this.gift.email = result.value;
                if(type=='cash' && result.value){
                    console.log('Voucher:',voucher);
                    axios.post('/api/send-mail',this.gift
                    ).then(response => {

                    });
                    this.getPurchasedCashVouchers();
                    this.getPurchasedRegularVouchers();
                }
                else if(type=='regular' && result.value){
                    axios.post('/api/send-mail/',this.gift
                    ).then(response => {

                    });
                    this.getPurchasedCashVouchers();
                    this.getPurchasedRegularVouchers();
                }
            })

        },
    }
}
</script>

<style  scoped>

</style>
