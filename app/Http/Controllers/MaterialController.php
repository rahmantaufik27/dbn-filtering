<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Material;
use Yajra\Datatables\Datatables;

class MaterialController extends Controller
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
    // public function index()
    // {   
    //     $data = array(
    //         "data" => DB::table('materials')
    //         ->select('materials.*','topics.name as topic_name')
    //         ->leftJoin('topics','topics.id','materials.id_topic')
    //         ->where('materials.deleted_at', NULL)
    //         ->get()
    //     );
    //     return view('material.material')->with($data);
    // }

    public function getIndex()
    {
        return view('material.material');
    }

    public function anyData() {
        return Datatables::of( DB::table('materials')
                ->select('materials.*','topics.name as topic_name')
                ->leftJoin('topics','topics.id','materials.id_topic')
                ->where('materials.deleted_at', NULL)
                ->get())
                ->make(true);
    }

    public function addMaterial()
    {
        $data = array(
            'data' => DB::table('topics')->get()
        );
        return view('material.material-add')->with($data);
    }

    public function editMaterial($id)
    {
        $data = array(
            'data' => DB::table('topics')->get(),
            'topic' => DB::table('materials')
            ->select('*','materials.id as id_material')
            ->leftJoin('topics','topics.id','materials.id_topic')
            ->where('materials.id', $id )
            ->first()
        );
        // dd($data);
        return view('material.material-edit')->with($data);
    }

    public function updateMaterial (Request $request, $id) {
        $input = $request->all();
        $data = Material::find($id);
        if ($data) {
            $data->id_topic = $input['topic'];
            $data->source = $input['source'];
            $data->name = $input['name'];
            $data->description = $input['description'];
            $data->save();
            return redirect('/material');

        }
        // dd($data);

    }

    public function createMaterial(Request $request)
    {
        $input = $request->all();
        $material = Material::create([
            'id_topic' => $input['topic'],
            'source' => $input['source'],
            'name' => $input['name'],
            'description' => $input['description']
        ]);
        return redirect('/material');

    }

    public function delete (Request $request, $id) {
        // try {
            $data = Material::find($id);
            $data->delete();
            // dd($data);
            return redirect('/material');
        // } catch {

        // }
    }
}
