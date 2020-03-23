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
        $data['nav'] = '';

        
        return view('front.dashboard', $data);
    }

    public function user(){
        $data['title'] = 'Employee Self Service Data Dashboard';
        $data['nav'] = 'User';

        $data['user_data'] = User::get();

        return view('front.user', $data);
    }

    public function cuti(){
        $data['title'] = 'Employee Self Service Data Dashboard';
        $data['nav'] = 'Cuti';

        $data['cuti_data'] = Cuti::get();
        
        return view('front.cuti', $data);
    }

    public function asset(){
        $data['title'] = 'Employee Self Service Data Dashboard';
        $data['nav'] = 'Asset';

        $data['asset_data'] = Asset::get();
        
        return view('front.asset', $data);
    }

    public function reimburse(){
        $data['title'] = 'Employee Self Service Data Dashboard';
        $data['nav'] = 'Reimburse';

        $data['reimburse_data'] = Reimburse::get();
        
        return view('front.reimburse', $data);
    }

    public function transport(){
        $data['title'] = 'Employee Self Service Data Dashboard';
        $data['nav'] = 'Transport';

        $data['transport_data'] = Transport::get();
        
        return view('front.transport', $data);
    }

    public function absensi(){
        $data['title'] = 'Employee Self Service Data Dashboard';
        $data['nav'] = 'Absensi';

        $data['absensi_data'] = Absensi::get();
        
        return view('front.absensi', $data);
    }

    
}
