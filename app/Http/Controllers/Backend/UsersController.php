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
