<?php

namespace Dsc\Http\Controllers\Web;

use Illuminate\Http\Request;
use Dsc\Http\Controllers\Controller;
use Dsc\Account;
use Dsc\Service;
use Dsc\Quotation;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('quotation.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $accounts = Account::all();
        $numbering = Quotation::latest()->pluck('quotationno')->first();
        $expNum = $numbering;
        
        //check first day in a year
        if ( date('l',strtotime(date('Y-01-01'))) ){
            $nextquotationNumber = '000001/'.date('d-m-Y');
        } else {
            //increase 1 with last quotation number
            $nextquotationNumber = $expNum[0].'-'. $expNum[1]+1;
        }
        $service = Service::all();
        return view('quotation.create_quote', compact('accounts','nextquotationNumber','service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function services()
    {
        $service = Service::all();
        return view('settings.services', compact('service'));
    }

    public function addservices(Request $request)
    {
        $item = new Service();
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->vat = $request->get('vat');
        $item->save();

        return redirect()->route('service.items')->withSuccess('Service item saved successfully');
    }
}
