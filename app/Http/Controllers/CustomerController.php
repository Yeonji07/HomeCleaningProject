<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Metode_Pembayaran;
use App\Models\Pekerja;
use App\Models\Rating;
use App\Models\Subscription;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CustomerController extends Controller
{
    public function homepage(Request $request){
        return view('Customer.home');
    }

    public function loadOrder(Request $r){
        $u = Session::get("sessionlogin");
        $nama = $u["data"]->full_name;
        $alamat = $u["data"]->alamat;
        $nomor_telepon = $u["data"]->nomor_telepon;

        $subscription = Subscription::All()->where("id_subscription","<=",4);

        $metode_pemabayaran = Metode_Pembayaran::All();

        return view("Customer.order",["nama"=>$nama,"alamat"=>$alamat,"nomor_telepon"=>$nomor_telepon,"subscription"=>$subscription,"metode_pembayaran"=>$metode_pemabayaran]);
    }

    public function ajaxDetailPaket(int $id,Request $r){
        $idPkt = (int)$id;

        $subscription = Subscription::where("id_subscription",$idPkt)->first();
        if($idPkt<=3){
            return response()
            ->json(["pembersihan" => $subscription->total_pembersihan,
            "masa_berlaku"=>$subscription->masa_berlaku." Bulan",
            "harga"=>number_format($subscription->harga_subscription,0,",",".")]);
        }
        else if($idPkt==4){
            return response()
            ->json(["pembersihan" => $subscription->total_pembersihan,
            "masa_berlaku"=>"1 Minggu",
            "harga"=>number_format($subscription->harga_subscription,0,",",".")]);
        }
        else{
            return response()
            ->json(["pembersihan" => $subscription->total_pembersihan,
            "masa_berlaku"=>$subscription->masa_berlaku,
            "harga"=>number_format($subscription->harga_subscription,0,",",".")]);
        }

    }

    public function checkoutPage(int $id, Request $request){
        $getid = $id;
        // dd($getid);
        $paket = Subscription::where("id_subscription", $getid)->first();
        $getsession = Session::get("sessionlogin");
        $datauser = $getsession["data"];
        $metodepembayaran = Metode_Pembayaran::where("id_metode_pembayaran",4)->first();
        return response(view("Customer.checkout",["paket" => $paket,"datauser" => $datauser,"metodepayment" => $metodepembayaran]));
    }

    public function redirectorder(){
        return response(view("Home.redirectorder"));
    }

    public function checkout(Request $request){
        if ($_FILES['bukti_pembayaran']['size'] == 0) {
            return redirect()->back()->with("failed","yes");
        }
        else{
            $request->validate([
                'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                'subscription'=>'required',
                'payment'=>'required',
            ]);

            $u = Session::get("sessionlogin");

            // Get file bukti payment
            $extension = $request->file('bukti_pembayaran')->extension();
            // $temp = transaksi::count();

            // Renaming bukti payment file with latest transaction id + 1
            $temp1 = DB::table("transaksi")->latest("id_transaksi")->first();
            $latestidtrans = ($temp1->id_transaksi) + 1;
            $imageName = $latestidtrans.".".$extension;
            $request->file('bukti_pembayaran')->storeAs('/public/assetGambar/buktipayment', $imageName);

            // Create new transaction for voucher
            $transaksi = new transaksi();
            $transaksi->id_user = $u["data"]->id_user;
            $transaksi->id_subscription = $request->input("subscription");
            $transaksi->id_metode_pembayaran = $request->input("payment");

            $mytime = Carbon::now();
            $transaksi->tanggal_order = $mytime->toDateTimeString();
            $expired = "";

            if($request->input("subscription") == 1){
                $expired = Carbon::today()->addDays(30);
            }
            else if($request->input("subscription") == 2){
                $expired = Carbon::today()->addDays(90);
            }
            else if($request->input("subscription") == 3){
                $expired = Carbon::today()->addDays(180);
            }
            else if($request->input("subscription") == 4){
                $expired = Carbon::today()->addDays(7);
            }

            $transaksi->tanggal_expired = $expired->toDateTimeString();
            if($request->input("txtKeterangan") == ""){
                $transaksi->keterangan_transaksi = "Tidak ada keterangan";
            }
            else{
                $transaksi->keterangan_transaksi = $request->input("txtKeterangan");
            }

            $transaksi->bukti_payment = $imageName;
            $transaksi->statusconfirm = 0;
            $transaksi->save();
            return redirect("/user/redirect")->with("success","yes");
        }

    }

    public function order(Request $r){
        $r->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'subscription'=>'required',
            'payment'=>'required',
        ]);
        $u = Session::get("sessionlogin");

            $extension = $r->file('image')->extension();
            $temp =transaksi::count();
            $imageName = $temp.".".$extension;
            $r->file('image')->storeAs('/public/assetGambar/buktipayment', $imageName);

        $transaksi = new transaksi();
        $transaksi->id_user = $u["data"]->id_user;
        $transaksi->id_subscription = $r->input("subscription");
        $transaksi->id_metode_pembayaran = $r->input("payment");

        $mytime = Carbon::now();
        $transaksi->tanggal_order = $mytime->toDateTimeString();
        $expired = "";

        if($r->input("subscription") == 1){
            $expired = Carbon::today()->addDays(30);
        }
        else if($r->input("subscription") == 2){
            $expired = Carbon::today()->addDays(90);
        }
        else if($r->input("subscription") == 3){
            $expired = Carbon::today()->addDays(180);
        }
        else if($r->input("subscription") == 4){
            $expired = Carbon::today()->addDays(7);
        }

        $transaksi->tanggal_expired = $expired->toDateTimeString();
        if($r->input("txtKeterangan")==""){
            $transaksi->keterangan_transaksi = "Tidak ada keterangan";
        }
        else{
            $transaksi->keterangan_transaksi = $r->input("txtKeterangan");
        }

        $transaksi->bukti_payment = $imageName;
        $transaksi->statusconfirm = 0;
        $transaksi->save();
        return redirect("/user/order");

    }
    //loadpekerja
    public function loadAppointment(Request $r){
        $subscription = Subscription::All()->where("id_subscription",">",4);

        // $pekerja = Pekerja::where("status","=",0)->get();

        // Random pekerja
        $pekerja = Pekerja::where("status","=",0)->inRandomOrder()->first();

        $u = Session::get("sessionlogin");
        // dd($u);

        $jumlahVoucher = $u["data"]->jumlah_voucher;
        $nominalVoucher = number_format($jumlahVoucher*50000,0,",",".");

        return view("Customer.Appointment",["subscription"=>$subscription,"pekerja"=>$pekerja,"user"=>$u["data"],"jumlahVoucher"=>$jumlahVoucher,"nominalVoucher"=>$nominalVoucher]);
    }



    public function appointment(Request $r){
        if ($r->input("tglAppointment") != null) {
            date_default_timezone_set("Asia/Jakarta");
            // $r->validate([
            //     'voucherterpakai' => 'min:1',
            //     'tglAppointment'=>'required'
            // ]);

            $datetime = $r->input("tglAppointment");
            $temp = date('H:i', strtotime($datetime));

            // Datenow
            $datenow = Carbon::now();
            $formatdatenow = date('Y-m-d H:i:s', strtotime($datenow));

            //Date input
            $dateinput = $datetime;
            $formatdateinput = date('Y-m-d H:i:s', strtotime($dateinput));
            $checkdate = false;
            // dd($formatdateinput . " - " . $formatdatenow);

            if ($formatdateinput < $formatdatenow) {
                $checkdate = true;
            }

            $jam1 = "09:00";
            $tempjam1 = date('H:i', strtotime($jam1));
            $jam2 = "17:00";
            $tempjam2 = date('H:i', strtotime($jam2));
            $cekTime = true;
            if($temp<$jam1){
                $cekTime = false;
            }
            else if($temp>$jam2){
                $cekTime = false;
            }

            //Tanggal input > tanggal skrg
            if ($checkdate == true) {
                return redirect("/user/appointment")->with("dateerror","yes");
            }
            //Tanggal input < tanggal skrg
            else{
                if($cekTime==false){
                    //lewat jam operasional
                    return redirect("/user/appointment")->with("timeoff","yes");
                }
                else{
                    $hargaYangDibayar = $r->input("voucherterpakai")*50000;
                    $hargaPaket = Subscription::where("id_subscription","=",$r->input("subscription"))->first();
                    $tempp = $hargaPaket->harga_subscription;

                    // Check tanggal pesan = inputan appointment customer lain
                    $dateinput = $r->input("tglAppointment");
                    $dateformat = date('Y-m-d', strtotime($dateinput));
                    // dd($dateformat);

                    // Check kalau pekerja lagi ada kerjaan dan tanggal yang dipesen customer lain sama kaya jam kerjanya
                    $checkdate = Detail::whereDate("dipesan_untuk","=",$dateformat)->where("id_pekerja","=",$r->input("pekerja"))->first();
                    // dd($checkdate);

                    // Check kalau tidak ada tanggal di hari itu yang dipesan
                    // dd($checkdate);
                    // Check status pekerja
                    // dd($statuswork);
                    // dd($statuswork1);

                    // dd($r->has("agreepayment"));

                    if ($checkdate == null) {
                        // Kalau statuswork pekerja -1 maka bisa jalankan pekerjaan ini
                        if($hargaYangDibayar>=$tempp){
                            // dd($r->has("agreepayment"));
                            if ($r->has("agreepayment")) {
                                $u = Session::get("sessionlogin");
                                $detail = new Detail();
                                $detail->id_pekerja = $r->input("pekerja");
                                $detail->id_user = $u["data"]->id_user;
                                $detail->id_subscription = $r->input("subscription");
                                $detail->jumlah_voucher = $r->input("voucherterpakai");
                                $detail->dipesan_untuk = $r->input("tglAppointment");

                                $detail->status = 0;
                                $detail->save();
                                $tempUser = User::where("id_user","=",$u["data"]->id_user)->first();
                                $temper1 =($tempUser->jumlah_voucher);
                                $temper2 = (int) ($r->input("voucherterpakai"));
                                $tempUser->jumlah_voucher = $temper1 - $temper2;
                                $tempUser->save();

                                $getrole = $u["role"];
                                $getdatauser = $u["data"]->id_user;

                                $datauser = User::where("id_user",$getdatauser)->first();

                                $data = [
                                    "role" => $getrole,
                                    "data" => $datauser
                                ];

                                Session::put("sessionlogin",$data);

                                return redirect("/user/appointment")->with("success","yes");
                            }
                            else{
                                //Belum agree dengan terms di transaksi appointment
                                return redirect("/user/appointment")->with("notagree","yes");
                            }

                        }
                        else{
                            //Voucher tidak cukup
                            return redirect("/user/appointment")->with("novoucher","yes");
                        }
                    }
                    else{
                        return redirect("/user/appointment")->with("nodate","yes");
                    }
                }
            }
            return redirect("/user/appointment");
        }
        else{
            return redirect()->back()->with("inputerror","yes");
        }
    }

    public function loadHistoryPemesanan(Request $r){
        $u = Session::get("sessionlogin");
        $transaksi = transaksi::where("id_user",$u["data"]->id_user)->get();
        $detail = Detail::where("id_user",$u["data"]->id_user)->where("status",3)->get();
        $metode = Metode_Pembayaran::all();
        $subscription = Subscription::all();
        $idsubs = "";

        $merge = [];

        foreach ($transaksi as $t) {
            $namaTrans="";
            $voucher = "";
            $jenisTrans = "";
            $metode_pemabayaran = "";
            $tanggalTrans = "";

            foreach ($subscription as $s) {
                if($s->id_subscription == $t->id_subscription){
                    $namaTrans = $s->nama_subscription;
                    $voucher = $s->total_pembersihan;
                    $idsubs = $s->id_subscription;
                }
            }
            if($t->statusconfirm==0){
                $namaTrans = $namaTrans." (Belum dikonfirmasi)";
            }
            $jenisTrans = "Pemasukan";

            foreach ($metode as $m) {
                if($m->id_metode_pembayaran == $t->id_metode_pembayaran){
                    $metode_pemabayaran = $m->nama_metode_pembayaran;
                }
            }
            $tanggalTrans = $t->tanggal_order;

            if ($idsubs != null) {
                $merge[] = ["idsubs" => $idsubs,
                    "idDetail"=>$t->id_transaksi,
                    "namaTrans"=>$namaTrans,
                    "voucher"=>$voucher,
                    "jenisTrans"=>$jenisTrans,
                    "metode_pembayaran"=>$metode_pemabayaran,
                    "tanggalTrans" =>$tanggalTrans,
                    "statusRating"=>0
                ];
            }
            else{
                $merge[] = ["idsubs" => -1,
                    "idDetail"=>$t->id_transaksi,
                    "namaTrans"=>$namaTrans,
                    "voucher"=>$voucher,
                    "jenisTrans"=>$jenisTrans,
                    "metode_pembayaran"=>$metode_pemabayaran,
                    "tanggalTrans" =>$tanggalTrans,
                    "statusRating"=>0
                ];
            }


        }

        foreach ($detail as $d) {
            $namaTrans="";
            $voucher = "";
            $jenisTrans = "";
            $metode_pemabayaran = "";
            $tanggalTrans = "";
            $statusRating = "";
            $idDetail = "";
            $idsubs = "";
            foreach ($subscription as $s) {
                if($s->id_subscription == $d->id_subscription){
                    $namaTrans = $s->nama_subscription;
                    $idsubs = $s->id_subscription;
                }
            }
            $voucher = "- ".$d->jumlah_voucher;
            $jenisTrans = "Pengeluaran";
            $metode_pemabayaran = "Voucher";
            $tanggalTrans = $d->jam_mulai;
            $statusRating = $d->status_rating;
            $idDetail = $d->id_dt_transaksi;
            if ($idsubs != null) {
                $merge[] = ["idsubs" => $idsubs,
                "idDetail" => $idDetail,
                "namaTrans"=>$namaTrans,
                "voucher"=>$voucher,
                "jenisTrans"=>$jenisTrans,
                "metode_pembayaran"=>$metode_pemabayaran,
                "tanggalTrans" =>$tanggalTrans,
                "statusRating" =>$statusRating
                ];
            }
            else{
                $merge[] = ["idsubs" => -1,
                "idDetail" => $idDetail,
                "namaTrans"=>$namaTrans,
                "voucher"=>$voucher,
                "jenisTrans"=>$jenisTrans,
                "metode_pembayaran"=>$metode_pemabayaran,
                "tanggalTrans" =>$tanggalTrans,
                "statusRating" =>$statusRating
                ];
            }

            // dd($merge);
        }

        // dd($idsubs);
        // dd($merge);

        return view("Customer.history",["merge"=>$merge]);
    }

    public function logout(Request $request){
        $u = Session::get("sessionlogin");
        // dd($u);
        $request->session()->forget('sessionlogin');
        return redirect('/');
    }

    public function loadHistoryAppointment(Request $request){
        $u = Session::get("sessionlogin");

        $getuser = $u["data"]->id_user;

        // $query = "select d.id_dt_transaksi,s.nama_subscription,p.nama_pekerja,d.jam_mulai,d.jam_selesai,d.status
        // from detail_transaksi d,subscription s,users u,pekerja p
        // where s.id_subscription = d.id_subscription and u.id_user = $iduser and d.id_pekerja = p.id_pekerja";

        $getlistappointment = DB::table('detail_transaksi')
        ->join("subscription","detail_transaksi.id_subscription","=","subscription.id_subscription")
        ->join("users","detail_transaksi.id_user","=","users.id_user")
        ->join("pekerja","detail_transaksi.id_pekerja","=","pekerja.id_pekerja")
        ->where("users.id_user","=",$getuser)->where("detail_transaksi.status","!=",3)
        ->select("detail_transaksi.id_dt_transaksi","subscription.nama_subscription","pekerja.nama_pekerja","pekerja.id_pekerja","detail_transaksi.dipesan_untuk","detail_transaksi.jam_mulai","detail_transaksi.jam_selesai","detail_transaksi.jam_selesai","detail_transaksi.status","detail_transaksi.bukti_foto")
        ->get();

        // dd($getlistappointment);

        // $subscription = Subscription::all();

        // $pekerja = Pekerja::where("status","=",1)->get();

        // $detail = Detail::where("id_user",$u["data"]->id_user)->get();

        // return view("Customer.listappointment",["subscription"=>$subscription,"detail"=>$detail,"user"=>$u,"pekerja"=>$pekerja]);
        return view("Customer.listappointment",["listappointment" => $getlistappointment]);
    }

    public function getHistoryByDate(Request $r){
        $r->validate([
            'dateStart' => 'required',
            'dateend'=>'required',
        ]);

        $timeStart = strtotime($r->input("dateStart"));
        $newformatStart = date('Y-m-d',$timeStart);

        $timeEnd = strtotime($r->input("dateend"));
        $newformatend = date('Y-m-d',$timeEnd);

        $u = Session::get("sessionlogin");
        $transaksi = transaksi::where("id_user",$u["data"]->id_user)->where("tanggal_order",">=",$newformatStart)->where("tanggal_order","<=",$newformatend)->get();
        $detail = Detail::where("id_user",$u["data"]->id_user)->where("jam_mulai",">=",$newformatStart)->where("jam_selesai","<=",$newformatend)->get();
        $metode = Metode_Pembayaran::all();
        $subscription = Subscription::all();

        $merge = [];

        foreach ($transaksi as $t) {
            $namaTrans="";
            $voucher = "";
            $jenisTrans = "";
            $metode_pemabayaran = "";
            $tanggalTrans = "";

            foreach ($subscription as $s) {
                if($s->id_subscription == $t->id_subscription){
                    $namaTrans = $s->nama_subscription;
                    $voucher = $s->total_pembersihan;
                }
            }
            if($t->statusconfirm==0){
                $namaTrans = $namaTrans." (Belum dikonfirmasi)";
            }
            $jenisTrans = "Pemasukan";

            foreach ($metode as $m) {
                if($m->id_metode_pembayaran == $t->id_metode_pembayaran){
                    $metode_pemabayaran = $m->nama_metode_pembayaran;
                }
            }
            $tanggalTrans = $t->tanggal_order;

            $merge[] = ["namaTrans"=>$namaTrans,
                        "voucher"=>$voucher,
                        "jenisTrans"=>$jenisTrans,
                        "metode_pembayaran"=>$metode_pemabayaran,
                        "tanggalTrans" =>$tanggalTrans
                        ];
        }

        foreach ($detail as $d) {
            $namaTrans="";
            $voucher = "";
            $jenisTrans = "";
            $metode_pemabayaran = "";
            $tanggalTrans = "";
            $statusRating = "";
            $idDetail = "";
            foreach ($subscription as $s) {
                if($s->id_subscription = $d->id_subscription){
                    $namaTrans = $s->nama_subscription;
                }
            }
            $voucher = "- ".$d->jumlah_voucher;
            $jenisTrans = "Pengeluaran";
            $metode_pemabayaran = "Voucher";
            $tanggalTrans = $d->jam_mulai;
            $statusRating = $d->status_rating;
            $idDetail = $d->id_dt_transaksi;
            $merge[] = ["idDetail" => $idDetail,
                        "namaTrans"=>$namaTrans,
                        "voucher"=>$voucher,
                        "jenisTrans"=>$jenisTrans,
                        "metode_pembayaran"=>$metode_pemabayaran,
                        "tanggalTrans" =>$tanggalTrans,
                        "statusRating" => $statusRating
                        ];
        }


        return view("Customer.history",["merge"=>$merge]);
    }

    public function updateAppointmentUser(Request $request){
        $id = $request->input("btnSelesai");
        $date = Carbon::now();
        // $date = date_format($date,"Y-m-d H:i:s");

        $detailtrans = Detail::where("id_dt_transaksi",$id)->first();
        $detailtrans->status = 3;
        $detailtrans->jam_selesai = $date->toDateTimeString();
        $detailtrans->save();

        $getidpekerja = $detailtrans->id_pekerja;
        $pekerja = Pekerja::where("id_pekerja",$getidpekerja)->first();
        $pekerja->status = 0;
        $pekerja->save();


        return redirect("/user/listpemesanan-user")->with("selesai","yes");
    }

    public function detailPekerja(Request $r){
        $idUser = $r->input("idPekerjaa");
        $pekerja = Pekerja::where("id_pekerja",$idUser)->first();
        $nama = $pekerja->nama_pekerja;
        $nomor = $pekerja->telepon_pekerja;
        $email = $pekerja->email_pekerja;
        $totalPekerjaan = Detail::where("id_pekerja","=",$idUser)->count();
        $idpekerja = $pekerja->id_pekerja;
        $ratingpekerja = Rating::where("id_pekerja","=",$idpekerja)->first();
        if ($ratingpekerja != null) {
            $rating = $ratingpekerja->nilai_pekerja;
        }
        else{
            $rating = "Belum memiliki nilai rating";
        }

        return view("Customer.detailPekerja",["nama"=>$nama,"nomor"=>$nomor,"email"=>$email,"totalPekerjaan"=>$totalPekerjaan,"nilaipekerja" => $rating]);
    }

    public function rating1(Request $request){
        $idDetail = $request->input("idDetail");
        $data = Detail::where("id_dt_transaksi",$idDetail)->first();

        $idPekerja = $data->id_pekerja;
        $idUser = $data->id_user;
        $rating = new Rating();
        $rating->id_pekerja = $idPekerja;
        $rating->id_user = $idUser;
        $rating->nilai_pekerja = '1';
        $rating->save();

        Detail::where('id_dt_transaksi',$idDetail)->update(['status_rating' => 1]);

        return redirect("/user/history")->with("selesai","yes");
    }

    public function rating2(Request $request){
        $idDetail = $request->input("idDetail");
        $data = Detail::where("id_dt_transaksi",$idDetail)->first();

        $idPekerja = $data->id_pekerja;
        $idUser = $data->id_user;
        $rating = new Rating();
        $rating->id_pekerja = $idPekerja;
        $rating->id_user = $idUser;
        $rating->nilai_pekerja = '2';
        $rating->save();

        Detail::where('id_dt_transaksi',$idDetail)->update(['status_rating' => 1]);

        return redirect("/user/history")->with("selesai","yes");
    }

    public function rating3(Request $request){
        $idDetail = $request->input("idDetail");
        $data = Detail::where("id_dt_transaksi",$idDetail)->first();

        $idPekerja = $data->id_pekerja;
        $idUser = $data->id_user;
        $rating = new Rating();
        $rating->id_pekerja = $idPekerja;
        $rating->id_user = $idUser;
        $rating->nilai_pekerja = '3';
        $rating->save();

        Detail::where('id_dt_transaksi',$idDetail)->update(['status_rating' => 1]);

        return redirect("/user/history")->with("selesai","yes");
    }

    public function rating4(Request $request){
        $idDetail = $request->input("idDetail");
        $data = Detail::where("id_dt_transaksi",$idDetail)->first();

        $idPekerja = $data->id_pekerja;
        $idUser = $data->id_user;
        $rating = new Rating();
        $rating->id_pekerja = $idPekerja;
        $rating->id_user = $idUser;
        $rating->nilai_pekerja = '4';
        $rating->save();

        Detail::where('id_dt_transaksi',$idDetail)->update(['status_rating' => 1]);

        return redirect("/user/history")->with("selesai","yes");
    }

    public function rating5(Request $request){
        $idDetail = $request->input("idDetail");
        $data = Detail::where("id_dt_transaksi",$idDetail)->first();

        $idPekerja = $data->id_pekerja;
        $idUser = $data->id_user;
        $rating = new Rating();
        $rating->id_pekerja = $idPekerja;
        $rating->id_user = $idUser;
        $rating->nilai_pekerja = '5';
        $rating->save();

        Detail::where('id_dt_transaksi',$idDetail)->update(['status_rating' => 1]);

        return redirect("/user/history")->with("selesai","yes");
    }

    public function mulaipekerjaan(Request $request){
        $idDetail = $request->input("idDetail");
        $data = Detail::where("id_dt_transaksi",$idDetail)->first();

        $date = Carbon::now();
        $data->jam_mulai = $date->toDateTimeString();
        $data->status = 1;
        $data->save();

        return redirect("/user/listpemesanan-user")->with("selesai","yes");
    }
}
