<?php

namespace App\Http\Controllers;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
/*$data = array();
$data['username'] = $request->username;
$data['email'] = $request->email;
$data['phone'] = $request->phone;
$data['gender'] = $request->gender;
DB::table('employee')->insert($data); */
class EmployeeController extends Controller
{
    //
    public function create(){
        return view('welcome');
    }

    public function employeeAdd(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:posts|max:255',
            'email' => 'required|unique:posts|max:255',
            'phone' => 'required|unique:posts|max:255',
            'gender' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
                                                    employee::insert([
                                        'username' => $request->username,
                                        'email' => $request->email,
                                        'phone' => $request->phone,
                                        'gender' => $request->gender,
                                        'create_at' => Carbon::now(),
                                    ]);

 return Redirect()->back()->with('success','employee data inserted succesfully');

    }

    

    public function Edit($id){
        $editing = employee::find($id);
        return view('edit',compact('editing'));
    }

    public function update(Request $request, $id){
        $update = employee::find($id)->update([
            'usename' => $request->username,
            'email'   => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender
        ]);
        return Redirect()->back()->with('sucess','updated succefully');
    }
    
public function delete($id){
    $delete = employee::find($id)->forceDelete();
    return Redirect()->back()->with('success','deleted successfully');
}
}
