<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\LoaiTaiKhoan;
use App\Repository\LoaiTaiKhoanRepository;
use Illuminate\Support\Facades\Hash;
use MongoDB\Client as MongoDBClient;

class TestController extends Controller
{
    private $LoaiTaiKhoan;

    public function __construct(LoaiTaiKhoanRepository $LoaiTaiKhoan)
    {
        $this->LoaiTaiKhoan = $LoaiTaiKhoan;
    }

    public function getLoaiTaiKhoan()
    {

        // mấy cái này đều như nhau
        $loai1 = DB::select('select * from LoaiTaiKhoan');
        $loai2 = DB::table('Loaitaikhoan')->get();
        $loai3 = LoaiTaiKhoan::all();
        $loai4 = $this->LoaiTaiKhoan->getAll();
        $loai5 = resolve(LoaiTaiKhoanRepository::class)->getAll();
        $test = resolve('dienroi');

        $data = ['loai1' => $loai1, 'loai2' => $loai2, 'loai3' => $loai3, 'loai4' => $loai4, 'loai5' => $loai5];
        $data['test'] = $test;
        
        return view('testconect', $data);
    }
    public function getview(){
        //truyền dữ liệu ở dạng mảng
        $data['user'] = 'Vietpro';
        $data['arr'] =['khanh', 'khoa', 'thi'];
        $data['thu'] = array('cho','meo','chuot');
        $data['chim'] = ['a'=>'cho','meo','chuot'];
        //$data = array('user'=> 'Khoa', 'arr'=> ['khanh', 'khoa', 'thi']);
        $data['so'] = 5;
        return View('MyFirstView',$data);
    }

    public function testcode(){
        $str = resolve('codeCreate');//app('codeCreate');//
        return $str;
    }

    public function encrypt($str){

        //Hashing A Password Using Bcrypt
        $data['bcrypt'] = bcrypt($str);
        //or
        $data['bcrypt2'] = Hash::make($str);

        //Verifying A Password Against A Hash
        $data['kq'] = Hash::check($str, $data['bcrypt']);

        //Checking If A Password Needs To Be Rehashed
        $data['kq2'] = Hash::needsRehash($data['bcrypt2']);

        //Encryption
        $data['encrypt'] = encrypt($str);
        $data['decrypt'] = decrypt($data['encrypt']);

        return view('test3',$data);
    }

    public function mongo(Request $req){
        $data['DiaPhuong'] = app('DiaPhuongRepository')->all();
        return view('test4', $data);
    }
    public function getQuan(Request $req){
        $result = app('DiaPhuongRepository')->getTinh($req->tenTinh);
        return response()->json($result);
        return response()->json(["mai"=>"ngoc", "minh"=>["tuan", "khnah"]]);
    }
}
