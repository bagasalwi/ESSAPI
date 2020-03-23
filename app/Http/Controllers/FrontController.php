<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Absensi;
use App\Cuti;
use App\Asset;
use App\Reimburse;
use App\Transport;
use DateTime;
use DB;
Use \Carbon\Carbon;

class FrontController extends Controller
{
    public function dashboard(){
        $data['title'] = 'Employee Self Service Data Dashboard';
        
        // Database from ...
        $data['user_data'] = User::get();
        $data['cuti_data'] = Cuti::get();
        $data['asset_data'] = Asset::get();
        $data['reimburse_data'] = Reimburse::get();
        $data['transport_data'] = Transport::get();
        $data['absensi_data'] = Absensi::get();
 
        return view('front.dashboard', $data);
    }
}
