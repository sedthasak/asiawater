<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;

use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;


use App\Models\User;
use App\Models\usersModel;
use App\Models\Store;
use DB;

class UsersController extends Controller
{

    public function BN_users_add()
    {
        return view('backend/users-add', [ 
            'default_pagename' => 'เพิ่มยูสเซอร์',
        ]);
    }
    public function BN_users_edit(Request $request, $id)
    {
        $user = usersModel::find($id);
        return view('backend/users-edit', [ 
            'default_pagename' => 'แก้ไขยูสเซอร์',
            'user' => $user,
        ]);
    }

    public function BN_users(Request $request)
    {
        $User = usersModel::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = usersModel::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/users', [ 
            'default_pagename' => 'ยูสเซอร์',
            'User' => $User,
            'query' => $query,
        ]);
    }

    public function BN_stores_add()
    {
        return view('backend/stores-add', [ 
            'default_pagename' => 'เพิ่มร้าน',
        ]);
    }
    public function BN_stores_edit(Request $request, $id)
    {
        $stores = Store::find($id);
        return view('backend/stores-edit', [ 
            'default_pagename' => 'แก้ไขร้าน',
            'stores' => $stores,
        ]);
    }
    // public function BN_stores_edit_action(Request $request, $id)
    // {
        
    //     Store::where('id', $id)->update(['name'=>$request->name, 'email'=>$request->email, 'password'=>$request->password, 'ro'=>$request->ro, 'alkaline'=>request->alkaline, 'oxygen'=>$request->oxygen]);
    //     return redirect($this->BN_stores());
    // }

    public function BN_stores_edit_action(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'ro' => 'nullable|string',
            'alkaline' => 'nullable|string',
            'oxygen' => 'nullable|string',
            'password' => 'nullable|string|min:6', // Add password validation rules if needed
        ]);

        // Prepare the data to update
        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'ro' => $request->ro,
            'alkaline' => $request->alkaline,
            'oxygen' => $request->oxygen,
        ];

        // Check if password is provided
        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }

        // Update the store data
        Store::where('id', $id)->update($dataToUpdate);

        return redirect()->route('BN_stores')->with('success', 'Store updated successfully');
    }
    
    public function BN_stores_delete(Request $request, $id)
    {
        // Find the store by id
        $store = Store::find($id);

        // Check if store exists
        if (!$store) {
            return redirect()->route('BN_stores')->with('error', 'Store not found');
        }

        // Delete the store
        $store->delete();

        // Redirect back with a success message
        return redirect()->route('BN_stores')->with('success', 'Store deleted successfully');
    }

    public function BN_stores(Request $request)
    {
        $stores = DB::table('stores')
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = DB::table('stores')
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/stores', [ 
            'default_pagename' => 'ร้าน',
            'stores' => $stores,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function BN_users_add_action(Request $request)
    {

        // dd($request);
        
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.usersModel::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // $user = usersModel::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $User = new User;

        if($request->hasFile('photo')){

            $oldPath = public_path($User->photo);
            if(File::exists($oldPath)){
                File::delete($oldPath);
            }

            $file = $request->file('photo');
            $destinationPath = public_path('/uploads/photo');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/photo/'.$newfilenam;

            $User->photo = $filepath;
        }

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->role = $request->role;;
        $User->active = $request->active;

        $User->save();
        
        event(new Registered($User));

        if(1==1){
            $usersavelog = auth()->user();
            $idsavelog = auth()->user()->id; 
            $emailsavelog = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $idsavelog,
                'ref' => $User->id,
                'remark' => 'User '.$idsavelog.' Create new User!',
                'event' => 'create user',
            );
            $result = (new LogsSaveController)->create_log($para);
        }   

        return redirect(route('BN_users'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }
    public function BN_stores_add_action(Request $request)
    {

        // return dd($request);
        
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.usersModel::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // $user = usersModel::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $Stores = new Store;
        $Stores->name = $request->name;
        $Stores->email = $request->email;
        $Stores->password = Hash::make($request->password);
        $Stores->ro = $request->ro;
        $Stores->alkaline = $request->alkaline;
        $Stores->oxygen = $request->oxygen;
        // $Stores->role = $request->role;
        // $Stores->active = $request->active;

        $Stores->save();

        return redirect(route('BN_stores'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }
    public function BN_users_edit_action(Request $request)
    {
        // dd($request);

        $request->validate([
            
        ]);

        $User = usersModel::find($request->user);

        if($request->hasFile('photo')){

            $oldPath = public_path($User->photo);
            if(File::exists($oldPath)){
                File::delete($oldPath);
            }

            $file = $request->file('photo');
            $destinationPath = public_path('/uploads/photo');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time().'-'.uniqid().'.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/photo/'.$newfilenam;

            $User->photo = $filepath;
        }

        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;;
        $User->active = $request->active;

        $User->update();
        
        // event(new Registered($User));

        if(1==1){
            $usersavelog = auth()->user();
            $idsavelog = auth()->user()->id; 
            $emailsavelog = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $idsavelog,
                'ref' => $User->id,
                'remark' => 'User '.$idsavelog.' Update User!',
                'event' => 'update user',
            );
            $result = (new LogsSaveController)->create_log($para);
        }   

        return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    

    public function BN_profile()
    {
        return view('backend/profile', [ 
            'default_pagename' => 'โปรไฟล์',
        ]);
    }
    public function BN_profile_edit(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id; 
        $myuser = usersModel::find($userloginid);
        return view('backend/profile-edit', [ 
            'default_pagename' => 'แก้ไขโปรไฟล์',
            'myuser' => $myuser,
        ]);
    }
    public function BN_profile_edit_action(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id;
        $userupdate = usersModel::find($userloginid);
        if($request->hasFile('photo')){

            $oldPath = public_path($userupdate->photo);
            if(File::exists($oldPath)){
                File::delete($oldPath);
            }

            $file = $request->file('photo');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $userupdate->photo = $filepath;

            
        }
        
        $userupdate->name = $request->name;
        $userupdate->update();

        if(isset($userupdate)){
            $usersavelog = auth()->user();
            $idsavelog = auth()->user()->id; 
            $emailsavelog = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $idsavelog,
                'ref' => $idsavelog,
                'remark' => 'User '.$idsavelog.' Update Profile!',
                'event' => 'update profile',
            );
            $result = (new LogsSaveController)->create_log($para);
        }

        // return redirect(route('BN_profile')->with('success', 'บันทึกข้อมูลสำเร็จ !!!'));
        return redirect(route('BN_profile'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');

    }
}
