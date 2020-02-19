<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SalaryResource;
use App\Salary;
use App\User;
use DateTime;
use DB;
Use \Carbon\Carbon;
use PDF;
use Mail;

class SalaryController extends Controller
{
    public function show($id)
    {        
        $salaries = Salary::get()->where('user_id', $id);
        
        return response()->json([
            'errcode' => '0000',
            'data' => SalaryResource::collection($salaries)
        ]);
    }

    public function sendmail(Request $request){

        $data['salary'] = DB::table('salaries')->get()->where('user_id', $request->user_id);
        // dd($data['salary']);
        $data['user'] = DB::table('users')->get()->where('id', $request->user_id);


        // dd($data['user'][2]->email);
        $data["email"]=$request->user_id;
        $data["client_name"]= $data['user'][2]->email;
        $data["subject"]='Salary Invoice';

        $pdf = PDF::loadView('SalaryRecord', $data);

        // return $pdf->stream('invoice.pdf');
        // die();

        try{
            Mail::send('SalaryRecord', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "SalaryInvoice.pdf");
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            return response()->json([
                'errcode' => '0500',
                'message' => 'Email Failure'
            ]);
        }else{
            return response()->json([
                'errcode' => '0000',
                'message' => 'Message sent Succesfully'
            ]);
        }
        // return response()->json(compact('this'));
 }
}
