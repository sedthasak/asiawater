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

class UsersController extends Controller
{

    public function BN_user(Request $request)
    {
        // $User = User::query()
        // // ->where('phone',$request->s)
        // ->orderBy('id', 'desc')
        // ->paginate(16);

        $query = User::query()
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
            'query' => $query,
        ]);
    }


    public function BN_user_add()
    {
        return view('backend/users-add', [ 
            'default_pagename' => 'เพิ่มยูสเซอร์',
        ]);
    }
    public function BN_user_edit(Request $request, $id)
    {
        $user = User::find($id);
        return view('backend/users-edit', [ 
            'default_pagename' => 'แก้ไขยูสเซอร์',
            'user' => $user,
        ]);
    }

    

    public function BN_usersFetch()
    {
        $queryy = User::all()->sortDesc();
        $output = '';
        if($queryy->count() > 0){
            ?>
                <div class="grid gap-6 mt-5 p-5 box">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="">
                                <tr class="">
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">#</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">ชื่อ</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">อีเมล</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">**</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach($queryy as $key => $res){
                                $count++;
                                ?>
                                <tr class="">
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $count ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->name ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->email ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><a href="#">แก้ไข</a></td>
                                </tr>
                                <?php
                                }
                                ?>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
        }else{
            echo "Not Found!!!";
        }
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function BN_user_add_action(Request $request)
    {

        // dd($request);
        
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $User = new User;

        if($request->hasFile('photo')){


            if(isset($User->photo)){
                $oldPath = public_path($User->photo);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
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

        return redirect(route('BN_user'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }
    public function BN_user_edit_action(Request $request)
    {
        // dd($request);

        $request->validate([
            
        ]);

        $User = User::find($request->user);

        if($request->hasFile('photo')){

            if(isset($User->photo)){
                $oldPath = public_path($User->photo);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
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
        $myuser = User::find($userloginid);
        return view('backend/profile-edit', [ 
            'default_pagename' => 'แก้ไขโปรไฟล์',
            'myuser' => $myuser,
        ]);
    }
    public function BN_profile_edit_action(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id;
        $userupdate = User::find($userloginid);
        if($request->hasFile('photo')){


            if(isset($userupdate->photo)){
                $oldPath = public_path($userupdate->photo);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
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
