<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $data = array(
            'data' => DB::table('teachers')
                ->select(
                    'teachers.*',
                    'users.id as id_user',
                    'roles.name as type'
                )
                ->leftJoin('users', 'users.id', 'teachers.id_user')
                ->leftJoin('roles', 'roles.id', 'users.id_role')
                ->where('users.deleted_at', null)
                ->where('users.id', $id)
                ->first()
        );
        // dd($data);
        return view('profile.profile')->with($data);
    }
}
