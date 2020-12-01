<?php

namespace App\Http\Controllers;

use App\CashVoucher;
use App\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class CashVoucherController extends Controller
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

        if($request->validityPeriod === '6 months'){
            $validTill->addMonths(6);
        }
        elseif ($request->validityPeriod === '1 year'){
            $validTill->addYears(1);
        }
        elseif ($request->validityPeriod === '2 years'){
            $validTill->addYears(2);
        }

        $voucher = CashVoucher::create([
            'price' => $request->get('price'),
            'validity_period' => $request->get('validityPeriod'),
            'valid_till' => $validTill,
            'created_role'=> $request->get('createdRole'),
            'created_by'=> $request->get('createdBy'),
        ]);

        return response()->json($voucher,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $vouchers = CashVoucher::all();
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

    public function getVouchersById($id)
    {
        $vouchers = CashVoucher::where(['created_by'=>$id])->get();
        return response()->json($vouchers,200);
    }

    public function getCount()
    {
        $counts = [
            'remainingVouchers' => [Voucher::where('is_purchased', '=', 0)->count()],
            'remainingCashVouchers' => [CashVoucher::where('is_purchased', '=', 0)->count()],
            'purchasedCashVouchers' => [CashVoucher::where('is_purchased', '=', 1)->count()],
            'purchasedVouchers' => [Voucher::where('is_purchased', '=', 1)->count()],

        ];
        return response()->json($counts, 200);
    }
}

