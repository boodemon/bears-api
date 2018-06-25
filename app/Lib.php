<?php

namespace App;
class Lib 
{
    public static function ext($file = ''){
        $ex = explode('.', $file);
        $ls = count($ex) -1;
        return '.' . $ex[$ls];
    }

    public static function printR($request=[]){
        echo '<pre>', print_r( $request ) ,'</pre>';
    }
}
