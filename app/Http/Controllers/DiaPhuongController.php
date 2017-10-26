<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as MongoDBClient;

class DiaPhuongController extends Controller
{
    
    public function DiaPhuong(Request $req){
        $DiaPhuong = app('DiaPhuongRepository')->all();
        return $DiaPhuong;
    }
    public function getQuan(Request $req){
        $result = app('DiaPhuongRepository')->getTinh($req->tenTinh);
        return response()->json($result);
    }
}
