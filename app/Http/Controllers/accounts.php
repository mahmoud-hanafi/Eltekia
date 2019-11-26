<?php

namespace App\Http\Controllers;
use App\Account;
Use DB;
use Illuminate\Http\Request;

class accounts extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('auth' , ['only'=>['show']]);
        $this->middleware('auth' , ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts=DB::table('accounts')->paginate(2);
        return view('accounts.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['AccountName'=>'bail|required|min:10']);
        $account=new Account();
        $account->AccountName=$request->AccountName;
        $account->save();
        return redirect('/accounts')->with('success','Account Name Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account=Account::find($id);
        return view('/accounts/show',compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account=Account::find($id);
        return view('/accounts/edit',compact('account'));   
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
        $account=Account::find($id);
        $account->AccountName=$request->AccountName;
        $account->save();
        return redirect('accounts/'.$account->id)->with('success','Account Name Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account=Account::find($id);
        $account->delete();
        return redirect('accounts')->with('success','Account Name Deleted Successfully');
    }
}
