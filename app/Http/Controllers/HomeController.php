<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);  
        if ($request->has('sort')) {

            $users=User::orderBy($request->get('sort'), $request->get('direction'))->paginate(10);
            
            
            }
        return view('home',compact('users'));
    }
}
