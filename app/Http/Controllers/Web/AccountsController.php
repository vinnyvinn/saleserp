<?php

namespace Dsc\Http\Controllers\Web;

use Illuminate\Http\Request;
use Dsc\Http\Controllers\Controller;
use Dsc\Account;
use Dsc\Contact;
use Dsc\Opportunity;
use Auth;
use Dsc\User;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounts = Account::all();
        return view('accounts.list', compact('accounts'));
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
        $acc = new Account();
        $acc->user_id = auth::id();
        $acc->account_name = $request->get('account_name');
        $acc->type = $request->get('type');
        $acc->phone = $request->get('phone');
        $acc->email = $request->get('email');
        $acc->website = $request->get('website');
        $acc->billingaddress = $request->get('billingaddress');
        $acc->county = $request->get('county');
        $acc->postalcode = $request->get('postalcode');
        $acc->currency = $request->get('currency');
        $acc->company_kra_pin = $request->get('company_kra_pin');
       $acc->save();
        return redirect()->back()->withSuccess('Account Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account )
    {
        $contact = Contact::where('account_id', $account->id)->get();
        $opportunity = Opportunity::where('account_id', $account->id)->get();
        return view('accounts.view', compact('account', 'contact', 'opportunity'));
    }

    //All Opportunities

    public function opportunity()
    {
        $opportunity = Opportunity::all();
        $accounts = Account::all();
        return view('opportunity.list', compact('opportunity','accounts'));
    }

    public function addcontacts(Request $request)
    {
        $newcontact = new Contact();
        $newcontact->salutation = $request->get('salutation');
        $newcontact->first_name = $request->get('first_name');
        $newcontact->last_name = $request->get('last_name');
        $newcontact->email = $request->get('email');
        $newcontact->phone = $request->get('phone');
        $newcontact->position = $request->get('position');
        $newcontact->buying_role = $request->get('buying_role');
        $newcontact->account_id =$request->get('account_id');
        $newcontact->save();
        return redirect()->back()->withSuccess('New Contact added to this Account Successfully');

    }

    public function addoppotunity(Request $request)
    {
        $newopportunity = new Opportunity();
        $newopportunity->closedate =$request->get('closedate');
        $newopportunity->opportunity_name =$request->get('opportunity_name');
        $newopportunity->probability=$request->get('probability');
        $newopportunity->next_step=$request->get('next_step');
        $newopportunity->amount=$request->get('amount');
        $newopportunity->user_id=auth::id();
        $newopportunity->account_id=$request->get('account_id');
        $newopportunity->stage=$request->get('stage');
        $newopportunity->type=$request->get('type');
        $newopportunity->source	=$request->get('source');
        $newopportunity->description =$request->get('description');
        $newopportunity->save();
        return redirect()->back()->withSuccess('New Opportunity added to this Account Successfully');
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
    public function update(Request $request,  $id)
    {
        //
      
        $acc = Account::findOrfail($id);
        $acc->user_id = auth::id();
        $acc->account_name = $request->get('account_name');
        $acc->type = $request->get('type');
        $acc->phone = $request->get('phone');
        $acc->email = $request->get('email');
        $acc->website = $request->get('website');
        $acc->billingaddress = $request->get('billingaddress');
        $acc->county = $request->get('county');
        $acc->postalcode = $request->get('postalcode');
        $acc->currency = $request->get('currency');
        $acc->company_kra_pin = $request->get('company_kra_pin');
       $acc->save();
        return redirect()->back()->withSuccess('Account Details Updated Successfully');

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
