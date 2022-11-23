<?php

namespace App\Http\Controllers;

use App\Mail\BirthDayWish;
use Illuminate\Http\Request;
use App\Models\Staff;

use DB;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index(Request $request)
    // {
    //     if($request->ajax() || 'NULL'){
    //     $staffs = DB::table('staffs')->paginate(4);
    //     return view('staff.index', compact('staffs'));
    //     }

    // }
    public function index()
    {
        $staffs = DB::table('staffs')->paginate(3);
        return view('staff.index', compact('staffs'));
    }

    function fetch_staff(Request $request)
    {
        if($request->ajax())
        {
        $staffs = DB::table('staffs')->paginate(3);
        return view('staff.index_table', compact('staffs'))->render();
        }
    }

    public function create() {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'ten' => 'required',
            'avatar' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required',
        ]);

        $staff = new Staff();

        $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
        $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extension = $request->file('avatar')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $filePath = $request->file('avatar')->move('upload', $fileNameToStore);


        $staff->ten = $request->input('ten');
        $staff->avatar = $fileNameToStore;
        $staff->ngaysinh = $request->input('ngaysinh');
        $staff->diachi = $request->input('diachi');

        $staff->songaynghi = 0;

        $staff->save();

        return redirect('staffs');

    }

    public function edit($id) {
        $staff = Staff::find($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            'ten' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required',
            'songaynghi' => 'required'
        ]);
        $staff = Staff::find($request->id);

        if ($request->avatar) {
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $filePath = $request->file('avatar')->move('upload', $fileNameToStore);

            $staff->avatar = $fileNameToStore;
        }


        $staff->ten = $request->input('ten');
        // $staff->avatar = $fileNameToStore;
        $staff->ngaysinh = $request->input('ngaysinh');
        $staff->diachi = $request->input('diachi');
        $staff->songaynghi = $request->input('songaynghi');

        $staff->update();

        return redirect('staffs');

    }

    public function destroy($id)
    {
        Staff::where('id',$id)->delete();
        return redirect('staffs');

    }

    public function sendMail(Request $request)
    {
        $staff = Staff::findOrFail($request->id);
        Mail::to('susitari1920@gmail.com')->send(new BirthDayWish($staff));
        return redirect('staffs');
    }
}
