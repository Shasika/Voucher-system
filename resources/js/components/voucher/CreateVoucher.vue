<template>
    <div class="app">
        <center>
            <h2 class="border mt-5 mb-5">
                REGULAR VOUCHER
            </h2>
        </center>
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="price">Price(Rs.)</label>
                    <input v-model="voucher.price" type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="price" />
                </div>
                <div class="form-group">
                    <label for="terms_conditions">Terms & Conditions</label>
                    <textarea v-model="voucher.termsConditions" class="form-control" id="terms_conditions" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Validity Period</label>
                    <select v-model="voucher.validityPeriod" class="form-control">
                        <option>6 months</option>
                        <option>1 year</option>
                        <option>2 years</option>
                    </select>
                </div>
                <button type="button" id="dropdownMenu" class="btn btn-outline-secondary" @click="createVoucher()">Create</button>
            </form>
        </div>

        <div class="container mt-5">
            <center>
                <h4 class="border mt-5 mb-5">
                    CREATED REGULAR VOUCHERS
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
                        <td>{{voucher.created_role}}</td>
                        <td v-if="voucher.is_approved === 1">Approved</td>
                        <td v-if="voucher.is_approved === 0">Pending</td>
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


    </div>
</template>

<script>
export default {
    data(){
        return{
            voucher:{
                price:'',
                termsConditions:'',
                validityPeriod:'',
                createdRole:''
            },
            allVouchers:[],
            user:''
        }
    },
    created() {
        this.user = JSON.parse(localStorage.getItem("user"));
        console.log('user = ',this.user);
        this.getAllVouchers();
    },
    methods:{
        createVoucher(){
            this.voucher.createdRole = this.user[0].role_id;

            axios.post('/api/create-voucher', this.voucher
            ).then(response => {

            });
            this.getAllVouchers();
        },
        getAllVouchers(){
            axios.get('/api/get-all-vouchers').then(response => {
                console.log("All Vouchers",response.data)
                this.allVouchers = response.data;
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

</style>
