import Vue from 'vue';
import VueRouter from 'vue-router';
import CustomerList from "./components/CustomerList";
import UserDashboard from "./components/dashboards/UserDashboard";
import AdminDashboard from "./components/dashboards/AdminDashboard";
import AdminRegister from "./components/admin/AdminRegister";
import CreateVoucher from "./components/voucher/CreateVoucher";
import CreateCashVoucher from "./components/voucher/CreateCashVoucher";
import Inventory from "./components/inventory/Inventory";
import BuyVouchers from "./components/buyVouchers/BuyCashVouchers";
import MyProfile from "./components/user/MyProfile";
import GiftVouchers from "./components/gift/GiftVouchers";

Vue.use(VueRouter);

export default new VueRouter({
    routes :[
        {
            name: 'customer',
            path:'/customer' ,
            component : CustomerList
        },
        {
            name: 'UserDashboard',
            path:'/user-dashboard' ,
            component : UserDashboard
        },
        {
            name: 'AdminDashboard',
            path:'/admin-dashboard' ,
            component : AdminDashboard
        },
        {
            name: 'AdminRegister',
            path:'/admin-register' ,
            component : AdminRegister,
        },
        {
            name: 'CreateVoucher',
            path:'/create-voucher' ,
            component : CreateVoucher,
        },
        {
            name: 'CreateCashVoucher',
            path:'/create-cash-voucher' ,
            component : CreateCashVoucher,
        },
        {
            name: 'Inventory',
            path:'/inventory' ,
            component : Inventory,
        },
        {
            name: 'BuyVouchers',
            path:'/buy-voucher' ,
            component : BuyVouchers,
        },
        {
            name: 'MyProfile',
            path:'/my-profile' ,
            component : MyProfile,
        },
        {
            name: 'GiftVouchers',
            path:'/gift-vouchers' ,
            component : GiftVouchers,
        },
    ],

    mode:'history'
});
