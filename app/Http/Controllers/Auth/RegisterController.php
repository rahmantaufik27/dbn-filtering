<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard-v3';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $dataStudet = array (
        0 => 
        array (
          'id_role' => 4,
          'nis' => 192010001,
          'nama' => 'AQIL MUTTAQI YUSRIZAL',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        1 => 
        array (
          'id_role' => 3,
          'nis' => 192010002,
          'nama' => 'ABDUL MAJID',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        2 => 
        array (
          'id_role' => 4,
          'nis' => 192010003,
          'nama' => 'ADIQ MUHAMMAD RAIHAN',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        3 => 
        array (
          'id_role' => 3,
          'nis' => 192010004,
          'nama' => 'ADITYA RAMADHAN',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        4 => 
        array (
          'id_role' => 4,
          'nis' => 192010005,
          'nama' => 'APRILIA MAULANA',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        5 => 
        array (
          'id_role' => 4,
          'nis' => 192010006,
          'nama' => 'DIMAS BRATAKUSUMAH',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        6 => 
        array (
          'id_role' => 3,
          'nis' => 192010007,
          'nama' => 'ELWI JODAVLIANO',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        7 => 
        array (
          'id_role' => 4,
          'nis' => 192010008,
          'nama' => 'FAIZAL MUHAMMAD ARIEF',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        8 => 
        array (
          'id_role' => 3,
          'nis' => 192010009,
          'nama' => 'FELIX AUGRI RISSYANDA',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        9 => 
        array (
          'id_role' => 4,
          'nis' => 192010010,
          'nama' => 'HAFIZH KENJI KHAIRUDIN',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        10 => 
        array (
          'id_role' => 4,
          'nis' => 192010011,
          'nama' => 'HENDRI PURNOMO',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        11 => 
        array (
          'id_role' => 3,
          'nis' => 192010012,
          'nama' => 'MARVEL RAVINDRA DIOPUTRA',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        12 => 
        array (
          'id_role' => 3,
          'nis' => 192010013,
          'nama' => 'MUHAMMAD DODI AWALUDIN',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        13 => 
        array (
          'id_role' => 4,
          'nis' => 192010014,
          'nama' => 'REVANZA ERSANI PUTRA',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        14 => 
        array (
          'id_role' => 3,
          'nis' => 192010015,
          'nama' => 'RIDWAN',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        15 => 
        array (
          'id_role' => 3,
          'nis' => 192010016,
          'nama' => 'ROFI SANTOSA',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        16 => 
        array (
          'id_role' => 4,
          'nis' => 192010017,
          'nama' => 'ROOFI DWI RAHMAWATI',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        17 => 
        array (
          'id_role' => 3,
          'nis' => 192010018,
          'nama' => 'SALMAN AHMAD RIZIQ',
          'class' => 'X-TKJ',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        18 => 
        array (
          'id_role' => 4,
          'nis' => 192010019,
          'nama' => 'AKBAR RAMADHAN K',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        19 => 
        array (
          'id_role' => 3,
          'nis' => 192010020,
          'nama' => 'ANNISA ADE APRILLIA',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        20 => 
        array (
          'id_role' => 4,
          'nis' => 192010021,
          'nama' => 'ARROYO TIMUR RIO',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        21 => 
        array (
          'id_role' => 3,
          'nis' => 192010022,
          'nama' => 'BARLLY NATAWIJAYA',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        22 => 
        array (
          'id_role' => 4,
          'nis' => 192010023,
          'nama' => 'MUH. IQBAL SABARUDIN',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        23 => 
        array (
          'id_role' => 4,
          'nis' => 192010024,
          'nama' => 'MUHAMAD AZRIL',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        24 => 
        array (
          'id_role' => 3,
          'nis' => 192010025,
          'nama' => 'MUH. DAFFA FAIQ KURNIA',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        25 => 
        array (
          'id_role' => 4,
          'nis' => 192010026,
          'nama' => 'MUH. FADEL WIDJAYA BASLIN',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        26 => 
        array (
          'id_role' => 3,
          'nis' => 192010027,
          'nama' => 'MUH. IKBAL SAPTA WAHYUDI',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        27 => 
        array (
          'id_role' => 4,
          'nis' => 192010028,
          'nama' => 'MUH. RAFIQ RAFIUDDIN',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        28 => 
        array (
          'id_role' => 3,
          'nis' => 192010029,
          'nama' => 'MYLO ALEFFA RAHMAN',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        29 => 
        array (
          'id_role' => 4,
          'nis' => 192010030,
          'nama' => 'NANDA FARELL',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        30 => 
        array (
          'id_role' => 4,
          'nis' => 192010031,
          'nama' => 'NATHASYA AURELIA SOPIAN',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        31 => 
        array (
          'id_role' => 3,
          'nis' => 181910028,
          'nama' => 'RAZAQ HIMAWAN PRATAMA',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        32 => 
        array (
          'id_role' => 4,
          'nis' => 192010032,
          'nama' => 'REYHAN AKBAR FIKRI',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        33 => 
        array (
          'id_role' => 3,
          'nis' => 192010033,
          'nama' => 'RIDHO NUROHMAN',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        34 => 
        array (
          'id_role' => 4,
          'nis' => 192010034,
          'nama' => 'STIFAN HILFA',
          'class' => 'X-RPL',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        35 => 
        array (
          'id_role' => 4,
          'nis' => 192010035,
          'nama' => 'ADINDA ALSYA RIZKIANA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        36 => 
        array (
          'id_role' => 3,
          'nis' => 192010036,
          'nama' => 'AMELIA FRISCA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        37 => 
        array (
          'id_role' => 3,
          'nis' => 192010037,
          'nama' => 'DANIELA CHANCHETTA M',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        38 => 
        array (
          'id_role' => 4,
          'nis' => 192010038,
          'nama' => 'ELSA MELLYANA PUTRI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        39 => 
        array (
          'id_role' => 3,
          'nis' => 192010039,
          'nama' => 'KARINA NURHALIZA PUTRI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        40 => 
        array (
          'id_role' => 4,
          'nis' => 192010040,
          'nama' => 'KHARIN PUSPITA SARI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        41 => 
        array (
          'id_role' => 3,
          'nis' => 192010041,
          'nama' => 'LISA KAMILA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        42 => 
        array (
          'id_role' => 4,
          'nis' => 192010042,
          'nama' => 'LUSYANA RAYHAN VARESTI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        43 => 
        array (
          'id_role' => 3,
          'nis' => 192010043,
          'nama' => 'MARISA MARDIANI AGUSTIN',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        44 => 
        array (
          'id_role' => 3,
          'nis' => 192010044,
          'nama' => 'MUTIARA HELGA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        45 => 
        array (
          'id_role' => 3,
          'nis' => 192010045,
          'nama' => 'NAYLA SYALEZIA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        46 => 
        array (
          'id_role' => 4,
          'nis' => 192010046,
          'nama' => 'PUTRI RETA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        47 => 
        array (
          'id_role' => 4,
          'nis' => 192010047,
          'nama' => 'RIKA ARIYANI WIDYAWATI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        48 => 
        array (
          'id_role' => 3,
          'nis' => 192010048,
          'nama' => 'SHAFA NADEIRA NURALIFA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        49 => 
        array (
          'id_role' => 4,
          'nis' => 192010049,
          'nama' => 'SHEILLA WULANDARI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        50 => 
        array (
          'id_role' => 3,
          'nis' => 192010050,
          'nama' => 'SHEREN NAFELA HERDIANA',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        51 => 
        array (
          'id_role' => 4,
          'nis' => 192010051,
          'nama' => 'TARISSA BERLIANA PUTRY',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        52 => 
        array (
          'id_role' => 3,
          'nis' => 192010052,
          'nama' => 'TIARA DWI LESTARI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        53 => 
        array (
          'id_role' => 4,
          'nis' => 192010053,
          'nama' => 'TRESNAWATI MEGAPUTRI',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        54 => 
        array (
          'id_role' => 3,
          'nis' => 192010054,
          'nama' => 'VALLEN DEVRINSA EG',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
        55 => 
        array (
          'id_role' => 3,
          'nis' => 192010055,
          'nama' => 'YARIDZKA LIANY HAKIM',
          'class' => 'X-AP',
          'id_knowledge_level' => 1,
          'id_misconception' => 16,
          'id_question_package' => 4,
        ),
      );
    // dd($dataStudet);
        foreach ($dataStudet as $data) {
            // dd($data['nis']);
            $user = User::create([
                'username' => $data['nis'],
                // 'email' => $data['email'],
                'id_role' => $data['id_role'],
                'password' => Hash::make($data['nis']),
                
            ]);
            $student = Student::create([
                'id_user' => $user['id'],
                'nis' => $data['nis'],
                'name' => $data['nama'],
                'class' => $data['class'],
                'id_question_package' => $data['id_question_package'],
                'id_knowledge_level' => $data['id_knowledge_level'],
                'id_misconception' => 16,
            ]);
        }
        // $user = DB::table('users')->insertGetId([ 
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'role_id' => $data['role_id'],
        //     'password' => Hash::make($data['password']), 
            
        // ]);

        // if ($data['role_id'] == 2) {
        //     // $student = DB::table('students')->insert([
        //     //     'user_id' => $user,
        //     //     'name' => $data['name'],
        //     //     'nis' => $data['nis'],
        //     //     'class' => $data['class'],
        //     //     'role' => 'student'
        //     // ]);
        // } else {
        //    $student = DB::table('students')->insert([
        //         'user_id' => $user->id,
        //         'name' => $data['name'],
        //         'nis' => $data['nis'],
        //         'class' => $data['class'],
        //         'role' => 'student'
        //     ]);
        // }
        // $student = Student::create([
        //     'user_id' => $user
        // ])
        return $user;
    }
}
