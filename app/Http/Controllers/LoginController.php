<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use \stdClass;
use Mail;

class LoginController extends Controller
{
    public function index()
    {
        return redirect('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function send_mail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $input = $request->all();
        $email = $input['email'];
        $code = base64_encode(time()."".rand(1000, 9999));
        $user_exist = User::select('*')
                            ->where('email', $email)
                            ->first();


        if($user_exist){
            $data = [
                'verification_code' => $code,
                'email' => $email
            ];

            $res = User::where('email', $email)->update($data);
        }else{
            $user = new User();
            $user->email = $email;
            $user->verification_code = $code;
            $user->save();
            // $res = User::create($data);
        }

        $subject = "Login to MyQR";

        $mail_data = ['code'=>$code];
        Mail::send('verify_mail', $mail_data,function($messages) use ($email, $subject){
            $messages->to($email);
            $messages->subject($subject);
        });
        return redirect()->back()->with("success","Mail sent successfully!");

    }

    public function authenticate($code)
    {
        if($code != "NULL"){
            $authenticated = User::where('verification_code', $code)
                            ->first();

            if($authenticated){
                $data = [
                    'verification_code' => "NULL",
                    'updated_at' => now()
                ];
                User::where('verification_code', $code)->update($data);

                // $request->sesion()->put('AuthUser', $authenticated);
                session(['AuthUser' => $authenticated]);
                return redirect('/dashboard');
            }else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
        
    }
    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
