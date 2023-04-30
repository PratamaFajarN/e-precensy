<?php

namespace App\Http\Controllers\Admin\Jabatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Jabatan;
use DB;
class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {



        return view("dashboard.jabatan.index");
    }
     public function jabatanPost(Request $request){

        $input = $request->all();

        Jabatan::create($input);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function jabatanUpdate(Request $request){


        $update = \DB::table('jabatan') ->where('id_jabatan', $request->id_jabatan) ->limit(1)
        ->update( [
            'name_jabatan' => $request['name_jabatan'],
            'tunjangan' => $request['tunjangan'],
            'sallary' => $request['sallary'],

     ]);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function getJabatan (){
           $datas = Jabatan::all();
             $dataArray = array();

            foreach ($datas as $a) {


            $temp_data =  array(
                "jabatan" => $a->name_jabatan,
                "tunjangan" => $a->tunjangan,
                "sallary" => $a->sallary,
                 "id" => $a->id_jabatan,

                );
                 array_push($dataArray,$temp_data);

            }

        $draw_json = array(
            'data' => $dataArray,
            'recordsTotal' => count($dataArray),
            'recordsFiltered' => count($dataArray),
            'draw'=>'1'
        );

        return response()->json($draw_json);

    }
    public function jabatanDestroy(Request $request){
        DB::table('jabatan')->where('id_jabatan', $request->id_jabatan)->delete();

        return response()->json('succes delete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
