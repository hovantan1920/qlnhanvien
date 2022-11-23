<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

use DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $staff = DB::table('staffs')->find($request->route('id'));
        $contracts = Contract::with('staff')->where('staff_id', $staff->id)->get();
        return view('contract.index', compact('contracts', 'staff'));
    }
    
    public function create(Request $request) {
        $staff = DB::table('staffs')->find($request->route('id'));
        return view('contract.create', compact('staff'));
    }

    public function store($idstaff, Request $request)
    {
        
        $this->validate($request,[
            'ngayky' => 'required',
            'ngayhethang' => 'required',
        ]);
        $contract = new contract();
        
        $contract->staff_id = $request->input('staff_id');
        $contract->ngayky = $request->input('ngayky');
        $contract->ngayhethang = $request->input('ngayhethang');

        $contract->save();
        // $staff = DB::table('staffs')->find($request->route('id'));
        // return view('contract.create', compact('staff'));

        
        return redirect("/staffs/$idstaff/contracts");

    }

    public function edit($id) {
        $contract = contract::find($id);
        return view('contract.edit', compact('contract'));
    }

    public function update($idstaff, Request $request, $id)
    {
        $validated = $this->validate($request, [
            'ngayky' => 'required',
            'ngayhethang' => 'required',
        ]);
        $contract = Contract::find($request->id);

        $contract->ngayky = $request->input('ngayky');
        $contract->ngayhethang = $request->input('ngayhethang');

        $contract->update();
        
        // return view('contract.edit', compact('contract'));
        return redirect("/staffs/$idstaff/contracts");
        //edit

    }

    public function destroy($idstaff, $id )
    {
        Contract::where('id',$id)->delete();
        return redirect("/staffs/$idstaff/contracts");
    }
}
