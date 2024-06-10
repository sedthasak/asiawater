<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    
    public function backendLogin()
    {
        return view('backend.login.main', [
            'layout' => 'login'
        ]);
    }

    
    public function login(LoginRequest $request)
    {
        try {
            if (!\Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                throw new \Exception('Wrong email or password.');
            }
        }
        catch (\Exception $e) {
            return dd($e->getMessage());
        }


        $user = auth()->user();
        if($user){
            $id = auth()->user()->id; 
            $email = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $id,
                'ref' => $email,
                'remark' => 'User '.$id.' Login to Backend!',
                'event' => 'login',
            );
            $result = (new LogsSaveController)->create_log($para);
        }            
    }

    
    public function logout()
    {
        $user = auth()->user();
        if($user){
            $id = auth()->user()->id; 
            $email = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $id,
                'ref' => $email,
                'remark' => 'User '.$id.' Logout from Backend!',
                'event' => 'logout',
            );
            $result = (new LogsSaveController)->create_log($para);
        }

        \Auth::logout();
        return redirect(route('backendLogin'));
    }
}
