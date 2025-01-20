<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
     * @return \Illuminate\Http\Response
     */
    public function dashboardV1()
    {
        return view('templates.dashboard-v1');
    }

    public function dashboardV2()
    {
        return view('templates.dashboard-v2');
    }

    public function dashboardV3()
    {
        $data = array(
            'user' => DB::table('users')->where('deleted_at', NULL)->whereIn('id_role', [3,4])->count(),
            'teacher' => DB::table('users')->where('deleted_at', NULL)->whereIn('id_role', [2])->count(),
            'material' => DB::table('materials')->where('deleted_at', NULL)->count(),
        );
        return view('templates.dashboard-v3')->with($data);
    }
}
