<?php

namespace Dsc\Http\Controllers\Web;

use Illuminate\Http\Request;
use Dsc\Http\Controllers\Controller;
use Dsc\Lead;
use Dsc\Lead_Status;
use Auth;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leads = Lead::all();
        $leads_new = Lead::where('status_id', 1)->count();
        $leads_Contacted = Lead::where('status_id', 2)->count();
        $leads_Qualified = Lead::where('status_id', 3)->count();
        $leads_working = Lead::where('status_id', 4)->count();
        $leads_customer = Lead::where('status_id', 5)->count();
        $leads_proposalsent = Lead::where('status_id', 6)->count();

        $lead_status = Lead_Status::all();
        return view('lead.list', compact('leads', 'lead_status', 'leads_new','leads_working', 'leads_Contacted', 'leads_Qualified', 'leads_customer', 'leads_proposalsent'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $lead = new Lead();
       
        $lead->contact_date = $request->get('contact_date');
        $lead->lead_name = $request->get('lead_name');
        $lead->description = $request->get('description');
        $lead->phone = $request->get('phone');
        $lead->email = $request->get('email');
        $lead->city = $request->get('city');
        $lead->industry = $request->get('industry');
        $lead->company = $request->get('company');
        $lead->status_id = $request->get('status_id');
        $lead->salutation = $request->get('salutation');
        $lead->source = $request->get('source');
        $lead->user_id = auth::id();
        $lead->save();
        return back()->withSuccess('Lead Created Successfully');
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
}
