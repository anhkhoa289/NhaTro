<?php
namespace App\Repository;

class RemoveToken{
    public static function remove($obj, $class){
        $a = new $class;
        foreach($obj as $k=>$v){
            if($k == '_token') continue;
            $a->$k = $v;
        }
        return $a;
    }
}