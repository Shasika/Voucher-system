<template>
    <div class="app">
        <center>
            <h2 class="border mt-5 mb-5">
                CASH VOUCHER
            </h2>
        </center>
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="price">Price(Rs.)</label>
                    <input v-model="voucher.price" type="number" value="0" min="0" step="500" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="price" />
                    <p class="text-warning small">* Price which is a multiplication of 500</p>
                </div>
                <div class="form-group">
                    <label>Validity Period</label>
                    <select v-model="voucher.validityPeriod" class="form-control">
                        <option>6 months</option>
                        <option>1 year</option>
                        <option>2 years</option>
                    </select>
                </div>
                <button type="button" id="dropdownMenu" class="btn btn-outline-secondary" @click="createVouchersById()">Create</button>
            </form>
        </div>

        <div class="container mt-5">
            <center>
                <h4 class="border mt-5 mb-5">
                    CREATED CASH VOUCHERS
                </h4>
            </center>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Price</th>
                    <th scope="col">Validity Period</th>
                    <th scope="col">Validity Till</th>

                </tr>
                </thead>
                <tbody v-if="allVouchers.length">
                <tr v-for="(voucher) in allVouchers" :key="voucher.id">
                    <th scope="row">{{voucher.id}}</th>
                    <td>{{voucher.price}}</td>
                    <td>{{voucher.validity_period}}</td>
                    <td>{{voucher.valid_till}}</td>
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
            voucher:{
                price:'',
                validityPeriod:'',
                createdRole:'',
                createdBy:'',
            },
            user:'',
            allVouchers:[],
        }
    },
    created() {
        this.user = JSON.parse(localStorage.getItem("user"));
        console.log('user = ',this.user);
        this.getAllVouchers();
    },
    methods:{
        createVouchersById(){
            this.voucher.createdRole = this.user[0].role_id;
            this.voucher.createdBy = this.user[0].id;

            axios.post('/api/create-cash-voucher', this.voucher
            ).then(response => {

            });
            this.getAllVouchers();
        },
        getAllVouchers(){
            axios.get('/api/get-vouchers-by-id/' +this.user[0].id).then(response => {
                console.log("All Vouchers",response.data)
                this.allVouchers = response.data;
            });
        }
    }
}
</script>

<style  scoped>

</style>
