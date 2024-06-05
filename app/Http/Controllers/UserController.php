<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    //For displaying the userlist in admin dashboard
    public function user()
    {
        $data['getRecord'] = User::getRecordUser();
        return view('backend.user.list',$data);

    }

    //For adding the user form in admin dashboard
    public function add_user(Request $request)
    {
        return view('backend.user.add');

    }

    //For saving the user form in admin dashboard
    public function insert_user(Request $request)
    {
       //dd($request->all());
      
        $save = new User();
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->status = trim($request->status);

        $save->save();

        return redirect('panel\user\list')->with('success','User has inserted successfully');

    }

     //For editing the user form in admin dashboard
     public function edit_user($id)
     {
        $data['getRecord'] = User::getSingle($id);

         return view('backend.user.edit',$data);
 
     }

        //For updating the user form in admin dashboard
        public function update_user($id,Request $request)
        {
          
            $save = User::getSingle($id);
            $save->name = trim($request->name);
            $save->email = trim($request->email);
            // $save->password = Hash::make($request->password);
            $save->status = trim($request->status);

            $save->save();

            return redirect('panel\user\list')->with('success','User has updated successfully');
        
        }

        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete(); // This will perform a soft delete
    
            return redirect()->back()->with('message', 'User deleted successfully.');
        }
    
        public function restore($id)
        {
            $user = User::withTrashed()->findOrFail($id);
            $user->restore(); // This will restore the soft-deleted user
    
            return redirect()->back()->with('message', 'User restored successfully.');
        }
}
