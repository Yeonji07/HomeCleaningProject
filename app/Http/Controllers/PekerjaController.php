<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Pekerja;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PekerjaController extends Controller
{
    public function historyPage(Request $request){
        $datasession = Session::get("sessionlogin");
        $getpekerja = $datasession["data"];
        $idpekerja = $getpekerja["id_pekerja"];
        $history = DB::table('detail_transaksi')
        ->where("detail_transaksi.status", "=", 3)
        ->where("detail_transaksi.id_pekerja","=",$idpekerja)
        ->join("subscription", "detail_transaksi.id_subscription","=","subscription.id_subscription")
        ->join("users", "detail_transaksi.id_user","=","users.id_user")
        ->get();
        // dd($history);
        return view("Pekerja.historykerja",["history" => $history]);
    }

    public function daftarKerjaPage(Request $request){
        $datasession = Session::get("sessionlogin");
        $getpekerja = $datasession["data"];
        $idpekerja = $getpekerja["id_pekerja"];

        // d.id_dt_transaksi,s.nama_subscription,u.full_name,d.jam_mulai,d.jam_selesai,d.status
        $daftarkerja = DB::table('detail_transaksi')
        ->where("detail_transaksi.status","!=",3)
        ->where("detail_transaksi.id_pekerja","=",$idpekerja)
        ->join("subscription", "detail_transaksi.id_subscription","=","subscription.id_subscription")
        ->join("users", "detail_transaksi.id_user","=","users.id_user")
        ->select("detail_transaksi.id_dt_transaksi","subscription.nama_subscription","users.full_name","users.alamat","detail_transaksi.dipesan_untuk","detail_transaksi.jam_mulai","detail_transaksi.jam_selesai","detail_transaksi.status","detail_transaksi.bukti_foto")
        ->get();

        return view("Pekerja.daftarpekerjaan",["daftarkerja" => $daftarkerja]);
    }

    public function homePekerja(Request $request){
        return view("Pekerja.home");
    }

    public function editprofile(Request $request){
        $datasession = Session::get("sessionlogin");
        // dd($datasession);
        $getpekerja = $datasession["data"];

        return response(view('Pekerja.editprofile',["datapekerja" => $getpekerja]));
    }

    public function updateprofile(Request $request){
        $request->validate([
            "name" => "required|regex:/^[\pL\s\-]+$/u",
            "username" => "required|alpha_num",
            "password" => "required|string|min:3",
            "confirm_password" => "required|string|same:password",
            "email" => "required|email",
            "address" => "required|string",
            "telephone_number" => "required|numeric",
        ]);

        $name = $request->input("name");
        $username = $request->input("username");
        $password = $request->input("password");
        $email = $request->input("email");
        $address = $request->input("address");
        $telp = $request->input("telephone_number");

        $passhash = password_hash($password,PASSWORD_DEFAULT);

        $pekerja = Pekerja::where("username_pekerja",$username)->first();
        // dd($pekerja);
        if ($pekerja != null) {
            $pekerja->nama_pekerja = $name;
            $pekerja->password_pekerja = $passhash;
            $pekerja->alamat_pekerja = $address;
            $pekerja->telepon_pekerja = $telp;
            $pekerja->save();

            // Update session
            $getsession = Session::get("sessionlogin");
            $getrole = $getsession["role"];
            $getusername = $getsession["data"]->username_pekerja;

            // dd($getrole);
            // dd($getusername);
            $querypekerja = Pekerja::where("username_pekerja",$getusername)->first();
            $datasess = [
                "role" => $getrole,
                "data" => $querypekerja
            ];

            // dd($datasess);

            Session::put("sessionlogin",$datasess);

            return redirect("/pekerja/editprofile")->with("success","yes");
        }
        else{
            return redirect("/pekerja/editprofile")->with("alert","no");
        }

    }
    //upload bukti foto
    public function ubahstatus(Request $request){
        $idtrans = $request->input('iddetail');
        DB::update('update detail_transaksi set status = 2 where id_dt_transaksi = ?', [$idtrans]);

        return redirect('/pekerja/daftarPekerjaan')->with("success","yes");
    }

    public function logout(Request $request){
        session()->forget('sessionlogin');
        return redirect("/");
    }


    public function uploadbukti(Request $request){
        if ($_FILES['bukti_pekerja']['size'] == 0) {
            return redirect()->back()->with("failed","yes");
        }
        else{
            $request->validate([
                'bukti_pekerja' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);


            // Get file bukti payment
            $extension = $request->file('bukti_pekerja')->extension();
            // $temp = transaksi::count();

            $detail = Detail::where("id_dt_transaksi",$request->input("iddetail"))->first();
            // Renaming bukti payment file with latest transaction id + 1
            $latestidtrans = $detail->id_dt_transaksi;
            $imageName = $latestidtrans.".".$extension;
            $request->file('bukti_pekerja')->storeAs('/public/buktipekerja', $imageName);
            $detail->bukti_foto = $imageName;
            $detail->save();

            return redirect()->back();
            // ->with("failed","yes");
        }
    }

    public function getSurat(Request $request){
        // Get id detail transaksi from input
        $id = $request->input("iddetail1");
        // dd($id);

        //Get detail data transaksi
        $datadetailtrans = Detail::where("id_dt_transaksi","=",$id)->get();

        foreach ($datadetailtrans as $datatransaksi) {
            $getidpekerja = $datatransaksi->id_pekerja;
            $getidsubscription = $datatransaksi->id_subscription;
            $getidcustomer = $datatransaksi->id_user;
            $jampesan = $datatransaksi->dipesan_untuk;
        }

        // Get customer detail
        $datacustomer = User::where("id_user","=",$getidcustomer)->first();
        // dd($datacustomer);

        //Input customer name, address into variables (that's what needed for now)
        $customername = $datacustomer->full_name;
        $customeraddress = $datacustomer->alamat;

        // Get Subscription detail
        $datasubscription = Subscription::where("id_subscription","=",$getidsubscription)->get();
        foreach ($datasubscription as $getsubs) {
            $namasubs = $getsubs->nama_subscription;
        }

        // Get pekerja detail
        $querypekerja = Pekerja::where("id_pekerja","=",$getidpekerja)->get();

        foreach ($querypekerja as $datapekerja) {
            $namapekerja = $datapekerja->nama_pekerja;
        }

        $datasurat = [
            "namapekerja" => $namapekerja,
            "namasubscription" => $namasubs,
            "id_pekerja" => $getidpekerja,
            "tanggalpesan" => $jampesan,
            "namacustomer" => $customername,
            "alamatcustomer" => $customeraddress
        ];

        // dd($datasurat);

        return response(view('Pekerja.suratlaporan',["datasurat" => $datasurat]));
    }

    // public function suratkerjaPage(Request $request){
    //     return redirec
    // }
}

