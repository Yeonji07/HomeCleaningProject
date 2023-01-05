<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Mail\VerificationMail;
use App\Models\Pekerja;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class HomeCleaningController extends Controller
{


    public function kirimEmail(Request $request){
        $contactname = $request->input("txtContactName");
        $contactemail = $request->input("txtContactEmail");
        $contactsubject = $request->input("txtContactSubject");
        $contactbody = $request->input("txtContactBody");

        Mail::to('homecleaningfai@gmail.com')->send(new ContactUsMail($contactemail, $contactname, $contactsubject, $contactbody));
        return redirect('/');

    }

    public function verif(Request $request, $id){
        // return redirect()->back()->with("alert","registered");
        DB::update('update users set status_email = 1 where username = ?', [$id]);
        return redirect('/')->with("verified","yes");
        //return response(view("emails.verified"));
        //return response("test");
    }


    public function landingpage(){
        $sessionlogin = Session::get("sessionlogin");
        // dd($sessionlogin);
        // $sessionadminlogin = Session::get("sessionadminlogin");

        if ($sessionlogin != null) {
            return redirect("/login");
        }

        return response(view("Home.landingpage"));
    }

    public function signupPage(){
        return response(view("Home.signup"));
    }

    public function loginDirect(){
        return view("Home.redirectlogin");
    }

    public function login(Request $request){
        $sessionlogin = Session::get("sessionlogin");
        $user = $request->input("txtEmail");
        $pass = $request->input("txtPassword");

        if ($user == "admin" && $pass == "admin" || $user == "Admin" && $pass == "Admin" || $user == "ADMIN" && $pass == "ADMIN") {
            // Session::put("sessionadminlogin","admin");
            $datauser = [
                "role" => "admin",
                "data" => "admin"
            ];
            Session::put("sessionlogin", $datauser);
            // dd($sessionlogin);

            return redirect("/admin/home");
        }
        else{
            // Encrypt pass inputan ke hashing
            $u = User::where("username", $user)->first();
            if($u != null){
                $tempPassword = $u->password;
                if(Hash::check($pass, $tempPassword) && $u->status_email==1){
                    $datauser = [
                        "role" => "user",
                        "data" => $u
                    ];
                    Session::put("sessionlogin",$datauser);
                    return redirect("/user/home");
                }
                else{
                    return redirect("/")->with("alertlanding","no");
                }
            }
            else if ($u == null) {
                $checkemail = User::where("email", $user)->first();
                // dd($checkemail);
                if($checkemail != null){
                    $tempPassword1 = $checkemail->password;
                    if(Hash::check($pass, $tempPassword1) && $checkemail->status_email==1){
                        $datauser = [
                            "role" => "user",
                            "data" => $checkemail
                        ];
                        Session::put("sessionlogin",$datauser);
                        return redirect("/user/home");
                    }
                    else{
                        return redirect("/")->with("alertlanding","no");
                    }
                }

                else{
                    $p = Pekerja::where("username_pekerja", $user)->first();
                    // dd($p);
                    if($p != null){
                        $tempPassword = $p->password_pekerja;
                        if(Hash::check($pass, $tempPassword)){
                            $datauser = [
                                "role" => "pekerja",
                                "data" => $p
                            ];
                            Session::put("sessionlogin",$datauser);
                            // dd($sessionlogin);
                            return redirect("/pekerja/home");
                        }
                        else{
                            return redirect("/")->with("alertlanding","no");
                        }
                    }

                    else if($p == null){
                        $checkemail = Pekerja::where("email_pekerja", $user)->first();
                        $tempPassword1 = $checkemail->password_pekerja;
                        if(Hash::check($pass, $tempPassword1)){
                            $datauser = [
                                "role" => "pekerja",
                                "data" => $checkemail
                            ];
                            Session::put("sessionlogin",$datauser);
                            // dd($sessionlogin);
                            return redirect("/pekerja/home");
                        }
                        else{
                            return redirect("/")->with("alertlanding","no");
                        }
                    }
                }

            }
            else{
                return redirect("/")->with("alertlanding","no");
            }

        }
    }

    public function logout(Request $request){
        $request->session()->forget('sessionlogin');
        return redirect('/');
    }

    public function register(Request $request){
        $request->validate([
            "txtFirstname" => "required|alpha",
            "txtLastname" => "required|alpha",
            "txtUsername" => "required|alpha_num",
            "txtEmail" => "required|email|",
            "txtAlamat" => "required|string",
            "txtNotelp" => "required|numeric",
            "txtPassword" => "required",
            "txtConfirm" => "required|same:txtPassword",
            "termsandcondition" => "accepted"

        ]);

        $firstname = $request->input("txtFirstname");
        $lastname = $request->input("txtLastname");
        $username = $request->input("txtUsername");
        $email = $request->input("txtEmail");
        $alamat = $request->input("txtAlamat");
        $notelp = $request->input("txtNotelp");
        $password = $request->input("txtPassword");
        $created_at = Carbon::now()->toDateTimeString();

        $resultEloquent = User::where('username',$username)->where('email',$email)->first();

        $check = false;

        if ($resultEloquent != null) {
            $check = true;
        }

        if ($check == true) {
            // $msg = "Register failed! Username sudah terdaftar!";
            // return redirect("/signup")->withErrors(['msg' => $msg]);
            // return redirect("/signup")->with('alert');
            return redirect()->back()->with('alert', 'Updated!');
        }
        else{
            $passhash = password_hash($password,PASSWORD_DEFAULT);

            // Eloquent
            $user = new User;
            $user->username = $username;
            $user->password = $passhash;
            $user->full_name = $firstname . " " . $lastname;
            $user->alamat = $alamat;
            $user->email = $email;
            $user->nomor_telepon = $notelp;
            $user->status = 1;
            $user->status_email = 0;
            $user->jumlah_voucher = 0;
            $user->created_at = $created_at;
            $user->save();

            Mail::to($email)->send(new VerificationMail($user));
            return redirect("/");
        }

    }

    public function homePage(Request $request){
        return response(view("Home.home"));
    }

}
