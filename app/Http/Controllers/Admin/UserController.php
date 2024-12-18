<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index( Request $request)
    {
            if ($request->ajax()) {
            $data = User::all();  
                  
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<div class="d-flex">';                        
                        $btn .= '<a href="'.route("admin.user.edit",$row['id']).'" class="btn btn-primary btn-sm mr-2"><i class="bi bi-pencil-square"></i> Edit</a>';  
                        $btn .= '<form action="'.route("admin.user.destroy",$row['id']).'" method="POST">
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm mr-2"><i class="bi bi-trash"></i> Delete</button>
                        </form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->addColumn('images', function($data) {
                        return '<img src="'.asset($data->images).'" width="70px"/>';
                     })      
                           
                    ->rawColumns(['action','images'])
                    ->make(true);
        }
      
        return view('admin.user.index');
    }

    public function create()
    {
        $role = Role::all();      
        return view('admin.user.create',compact('role'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required',

        ]);
        $user=new User();
        $user->username=$request->username;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->assignRole($request->get('role'));
        $user->save();
        return redirect()->route('admin.user.index')->with('success','User Created Successfully');
    }

    public function edit($id)
    {
        $user=User::find($id);
        $userRole=$user->roles->pluck('name')->toArray();
        $roles = Role::latest()->get();
        return view('admin.user.edit',compact('user','roles','userRole'));
    }

    public function update($id,Request $request)
    {   
        $user=User::find($id);        
        $user->name=$request->name;      
          if($request->password!=NULL){
             $user->password=Hash::make($request->password);
         }       
       
        $user->syncRoles($request->get('role'));
        $user->save();
        return redirect()->route('admin.user.index')->with('success','User Updated Successfully');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success','User Deleted Successfully');
    }
}
