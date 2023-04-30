<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getemploye = 'http://localhost:8000/getemploye';

    return view("dashboard.karyawan.index",[ 'getemploye' =>$getemploye]);
    }
    public function getemploye(){


             $datas = Employee::all();
             $dataArray = array();

            foreach ($datas as $a) {
                $gender = $a->gender;
                $jeskel = "";
                if ($gender == '1') {
                    $jeskel ="Male";
                }else {
                     $jeskel ="Female";
                }
            $temp_data =  array(
                "name" => $a->name,
                "gender" => $jeskel,
                "email" => $a->email,
                "company" => $a->company,
                "jabatan" => $a->jabatan,
                "alamat" => $a->alamat,


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
