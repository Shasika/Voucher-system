<?php

namespace App\Http\Controllers;

use App\Voucher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VoucherController extends Controller
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
        $validTill = Carbon::now();
        $isApproved = null;

        if ($request->validityPeriod === '6 months') {
            $validTill->addMonths(6);
        } elseif ($request->validityPeriod === '1 year') {
            $validTill->addYears(1);
        } elseif ($request->validityPeriod === '2 years') {
            $validTill->addYears(2);
        }

        if ($request->get('createdRole') === 2) {
            $isApproved = 0;

        } elseif ($request->get('createdRole') === 1) {

            $isApproved = 1;

        }
        $voucher = Voucher::create([
            'price' => $request->get('price'),
            'terms_conditions' => $request->get('termsConditions'),
            'validity_period' => $request->get('validityPeriod'),
            'valid_till' => $validTill,
            'created_role' => $request->get('createdRole'),
            'is_approved' => $isApproved,
        ]);

        return response()->json($voucher, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $vouchers = Voucher::all();
        return response()->json($vouchers,200);
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

    public function approve($id)
    {
        $voucher = Voucher::where('id', '=', $id)->update(array('is_approved' => 1));
        return response()->json($voucher, 200);
    }
}
