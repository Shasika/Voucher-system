<?php

namespace App\Http\Controllers;

use App\BuyVoucher;
use App\Voucher;
use Illuminate\Http\Request;

class BuyVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }

    public function buyVoucher(Request $request, $id)
    {
        $voucher = BuyVoucher::create([
            'price' => $request->get('price'),
            'terms_conditions' => $request->get('terms_conditions'),
            'validity_period' => $request->get('validity_period'),
            'valid_till' => $request->get('valid_till'),
            'buyer_id' => $id
        ]);
        $purchased = Voucher::where('id', '=', $request->get('id'))->update(array('is_purchased' => 1));
        return response()->json(array($voucher, $purchased), 200);
    }

    public function getRegularVouchersById($id)
    {
        $vouchers = BuyVoucher::where(array('buyer_id' => $id))->get();
        return response()->json($vouchers, 200);
    }


}
