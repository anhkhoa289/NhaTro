<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;
use MongoDB\Client as MongoDBClient;

class DiaPhuongRepository
{
    public $m;
    public $db;
    public $DiaPhuong;

    public function __construct(){
        $this->m = new MongoDBClient("mongodb://localhost:27017");
        $this->db = $this->m->NhaTro;
        $this->DiaPhuong = $this->db->DiaPhuong;
    }

    public function all() {
        return $this->DiaPhuong->find([null],['maTinh' => 1, 'tenTinh' => 1, '_id' => 1])->toArray();
    }

    public function getTinh($tenTinh){
        $rs = $this->DiaPhuong->find(['tenTinh' => $tenTinh],['quan' => 1])->toArray();
        return $rs[0]->quan;
    }
}