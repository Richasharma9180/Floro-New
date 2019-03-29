<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Excel;
use Carbon\Carbon;

class ExportController extends Controller
{
    
    function index()
    {
     $user_data = DB::table('users')->get();
     return view('export_excel')->with('user_data', $user_data);
    }

    function excel()
    {
        $user_data = DB::table('users')->get()->toArray();
        $user_array[] = array('first_name', 'last_name', 'email', 'phone_number', 'address','created_at');
        foreach($user_data as $user)
        {
            $user_array[] = array(
            'first_name'  => $user->first_name,
            'last_name'   => $user->last_name,
            'email'    => $user->email,
            'phone_number'  => $user->phone_number,
            'address'   => $user->address,
            'created_at' => Carbon::parse($user->created_at)->format('d/m/Y H:i:s')
       
            );
        }
        
        Excel::create('User Data', function($excel) use ($user_array){
        $excel->setTitle('User Data');
        $excel->sheet('User Data', function($sheet) use ($user_array){
        $sheet->fromArray($user_array, null, 'A1', false, false);
        });
    })->download('xlsx');
    }
}








