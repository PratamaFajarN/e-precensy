<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;


class CompanyController extends Controller
{
         public function index(){
            $getMap = 'http://localhost:8000/getMap';


        return view("dashboard.company.index",[ 'getMap' =>$getMap]);
    }
    public function updatecompany(Request $request){
              $update = \DB::table('users') ->where('id_user', 1) ->limit(1)
        ->update( [
            'companyname' => $request['companys'],
            'location' => $request['local'],
            'long'    => $request['longtitude'],
             'lat'    => $request['lattitude'],
            'jamBuka' => $request['jmMasuk'],
            'jamTutup' => $request['jmKeluar'],
     ]);
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function getMap(){
         $datas = User::all();
         $dataArray = array();
            foreach ($datas as $a) {
            $temp_data =  array(
                "username" => $a->username,
                "email" => $a->email,
                "location"  => $a->location,
                "companyname" => $a->companyname,
                "long" => $a->long,
                "lat" => $a->lat,
                "jamBuka" => $a->jamBuka,
                "jamTutup" => $a->jamTutup,

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
}
