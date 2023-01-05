<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Detail;
use App\Models\Pekerja;
use App\Models\Subscription;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function adminPage(Request $request){
        $pekerja = Pekerja::all();
        return view('Admin.home');
    }

    public function tambahPekerja(Request $request){
        $request->validate([
            "txtNamapekerja" => "required|string",
            "txtUsernamepekerja" => "required|alpha",
            "txtPasswordpekerja" => "required|alpha_num",
            "txtEmailpekerja" => "required|email|",
            "txtAlamatpekerja" => "required|string",
            "txtTeleponpekerja" => "required|numeric",
        ]);

        $txtNamapekerja = $request->input("txtNamapekerja");
        $txtUsernamepekerja = $request->input("txtUsernamepekerja");
        $txtPasswordpekerja = $request->input("txtPasswordpekerja");
        $txtEmailpekerja = $request->input("txtEmailpekerja");
        $txtAlamatpekerja = $request->input("txtAlamatpekerja");
        $txtTeleponpekerja = $request->input("txtTeleponpekerja");

        $resultEloquent = Pekerja::where('username_pekerja',$txtUsernamepekerja)->first();
        $resultEloquent2 = Pekerja::where('email_pekerja',$txtEmailpekerja)->first();

        $check = false;
        $checkemail = false;

        if ($resultEloquent != null) {
            $check = true;
        }
        else{
            if ($resultEloquent2 != null) {
                $checkemail = true;
            }
        }

        if ($check == true) {
            // $msg = "Register failed! Username sudah terdaftar!";
            // return redirect("/admin")->withErrors(['msg' => $msg]);
            return redirect()->back()->with("alert","registered");
        }
        else{
            if ($checkemail == true) {
                return redirect()->back()->with("alert","registered");
            }
            else{
                $passhash = password_hash($txtPasswordpekerja,PASSWORD_DEFAULT);

                // Eloquent
                $pekerja = new Pekerja;
                $pekerja->username_pekerja = $txtUsernamepekerja;
                $pekerja->password_pekerja = $passhash;
                $pekerja->nama_pekerja = $txtNamapekerja;
                $pekerja->alamat_pekerja = $txtAlamatpekerja;
                $pekerja->email_pekerja = $txtEmailpekerja;
                $pekerja->telepon_pekerja = $txtTeleponpekerja;
                $pekerja->status = 1;
                $pekerja->save();
                return redirect()->back()->with("success","done");
            }

        }

    }

    // Function delete sekaligus activate pekerja (soft delete jangan langsung di delete)
    public function deletePekerja(Request $request){
        $usernamepekerja = $request->input('btnDelete');
        $status = "";
        // DB::delete('delete from pekerja where username_pekerja = ?', [$username]);
        $pekerja = Pekerja::where("username_pekerja",$usernamepekerja)->first();
        // dd($pekerja);
        if ($pekerja != null) {
            // dd($pekerja->status);
            if ($pekerja->status == 0) {
                $pekerja->status = 1;
                $pekerja->save();
                return redirect()->back()->with('activated','pekerja');
            }
            else{
                $pekerja->status = 0;
                $pekerja->save();
                return redirect()->back()->with('deleted','pekerja');
            }

        }

    }

    public function sendEmail(Request $request){
        $pengirim = $request->input('txtContactName');
        $details = [
            'title' => "Email dari " . $pengirim,
            'body' => "TEST BODY",
        ];

        Mail::to("homecleaningfai@gmail.com")->send(new ContactMail($details));

        return ("Email telah terkirim");
    }

    public function showTransaksi(Request $request){
        //$query = "select t.id_transaksi as 'id transaksi', u.full_name as 'nama user', s.nama_subscription as 'nama subscription', m.nama_metode_pembayaran as 'nama metode pembayaran',t.tanggal_order as 'tanggal order',t.tanggal_expired as 'tanggal expired', t.bukti_payment as 'bukti payment' , t.statusconfirm
        //from subscription s,users u,metode_pembayaran m, transaksi t
        //where t.id_user = u.id_user and t.id_subscription = s.id_subscription and t.id_metode_pembayaran = m.id_metode_pembayaran order by t.id_transaksi ASC";

        // subscription s,users u,metode_pembayaran m, transaksi t
        $transaksi = DB::table('transaksi')
        ->join("subscription", "transaksi.id_subscription", "=", "subscription.id_subscription")
        ->join("users", "transaksi.id_user", "=", "users.id_user")
        ->join("metode_pembayaran", "transaksi.id_metode_pembayaran", "=", "metode_pembayaran.id_metode_pembayaran")->get();
        // dd($transaksi);

        return view('Admin.daftartransaksi',["transaksi" => $transaksi]);
    }

    public function showAppointment(Request $request){
        $temp =
        "select p.nama_pekerja,s.nama_subscription,u.full_name,d.jam_mulai,d.jam_selesai,d.status
        from pekerja p,detail_transaksi d,subscription s,users u
        where d.id_pekerja = p.id_pekerja and s.id_subscription = d.id_subscription and u.id_user = d.id_user";

        $appointment = DB::table('detail_transaksi')
        ->join("pekerja","detail_transaksi.id_pekerja","=","pekerja.id_pekerja")
        ->join("subscription","detail_transaksi.id_subscription","=","subscription.id_subscription")
        ->join("users","detail_transaksi.id_user","=","users.id_user")
        ->select("pekerja.nama_pekerja", "subscription.nama_subscription", "users.full_name", "detail_transaksi.dipesan_untuk","detail_transaksi.jam_mulai", "detail_transaksi.jam_selesai", "detail_transaksi.status","detail_transaksi.id_dt_transaksi")
        ->get();

        // dd($appointment);
        return view("Admin.daftarappointment",["appointment" => $appointment]);
    }


    public function showConfirmation(Request $request){
        $query =
        "select u.id_user, t.id_transaksi as 'id transaksi', u.full_name as 'nama user', s.nama_subscription as 'nama subscription', m.nama_metode_pembayaran as 'nama metode pembayaran',t.tanggal_order as 'tanggal order',t.tanggal_expired as 'tanggal expired', t.bukti_payment as 'bukti payment'
        from subscription s,users u,metode_pembayaran m, transaksi t
        where t.statusconfirm=0 and t.id_user = u.id_user and t.id_subscription = s.id_subscription and t.id_metode_pembayaran = m.id_metode_pembayaran order by t.id_transaksi ASC";

        $confirm = DB::table('transaksi')
        ->where("statusconfirm", 0)
        ->join("subscription", "transaksi.id_subscription","=","subscription.id_subscription")
        ->join("users", "transaksi.id_user","=","users.id_user")
        ->join("metode_pembayaran", "transaksi.id_metode_pembayaran","=","metode_pembayaran.id_metode_pembayaran")
        ->get();
        // dd($confirm);
        return view("Admin.konfirmasitransaksi",["confirmation" => $confirm]);
    }

    public function confirmPayment(Request $request){
        $getIdtrans = $request->input("btnConfirm");

        $gettrans = Transaksi::where("id_transaksi",$getIdtrans)->first();

        if ($gettrans != null) {
            $gettrans->statusconfirm = 1;
            $gettrans->save();

            $iduser = $gettrans->id_user;
            $idsubs = $gettrans->id_subscription;

            $getsubs = Subscription::where("id_subscription",$idsubs)->first();
            if ($getsubs != null) {
                $voucher = $getsubs->total_pembersihan;

                $getuser = User::where("id_user",$iduser)->first();
                if ($getuser != null) {
                    $totalvoucheruser = $getuser->jumlah_voucher;
                    $getuser->jumlah_voucher = $totalvoucheruser + $voucher;
                    $getuser->save();

                    return redirect()->back()->with("success","yes");
                }
                else{
                    return redirect()->back()->with("nouser","no");
                }
            }
            else{
                return redirect()->back()->with("nosubs","no");
            }

        }
        else{
            return redirect()->back()->with("notrans","no");
        }

    }

    public function rejectPayment(Request $request){
        $getidtrans = $request->input("btnReject");

        $gettrans = transaksi::where("id_transaksi",$getidtrans)->first();
        if ($gettrans != null) {
            $gettrans->statusconfirm = 2;
            $gettrans->save();

            return redirect()->back()->with("successreject","yes");
        }
        else{
            return redirect()->back()->with("notrans","no");
        }

    }

    public function pageTambahPekerja(){
        return view("Admin.tambahpekerja");
    }

    public function showUser(){
        $users = User::all();
        return view('Admin.daftaruser',["users"=>$users]);
    }

    public function showStatistik(){
        date_default_timezone_set("Asia/Jakarta");
        $arrayOfMonth = [];$arrayOfMonths = [];
        $totalUser=[];
        for ($i=11; $i > 0; $i--) {
            $arrayOfMonth[] = Carbon::now()->subMonths($i)->format("m");
            $arrayOfMonths[] = Carbon::now()->subMonths($i)->format("M");
            $totalUser[] = User::whereMonth("created_at",Carbon::now()->subMonths($i)->format("m"))->count();

        }


        $arrayOfMonth[] = Carbon::now()->format("m");
        $arrayOfMonths[] = Carbon::now()->format("M");

        $totalUser[] =  User::whereMonth("created_at",Carbon::now()->format("m"))->count();
        return view('Admin.statistik',['daynow'=>$totalUser]);
    }

    public function showPekerja(){
        $pekerja = Pekerja::all();
        return view('Admin.daftarpekerja',["pekerja"=>$pekerja]);
    }

    public function logout(Request $request){
        $request->session()->forget('sessionlogin');
        return redirect('/');
    }

    public function detailuserpage(Request $request){
        $getiduser = $request->input("detailUser");
        // dd($getiduser);

        $getuser = User::where("id_user", $getiduser)->first();

        $transaksi = DB::table('transaksi')
        ->join("subscription", "transaksi.id_subscription", "=", "subscription.id_subscription")
        ->join("users", "transaksi.id_user", "=", "users.id_user")
        ->join("metode_pembayaran", "transaksi.id_metode_pembayaran", "=", "metode_pembayaran.id_metode_pembayaran")
        ->where("users.id_user", "=", $getiduser)
        ->get();
        // dd($transaksi);

        return response(view("Admin.detailuser",["datatransaksi" => $transaksi, "user" => $getuser]));
    }

}
