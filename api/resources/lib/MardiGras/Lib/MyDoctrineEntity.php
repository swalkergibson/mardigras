<?php
namespace MardiGras\lib;

use Doctrine\ORM\PersistentCollection;

class MyDoctrineEntity
{
    public function arrayFy($level=1 ,array $ignore=array()){
        $maxLevel=3;
        $dateFormat='Y-m-d H:i:s';
        if(is_array($level)){
            $ignore=$level;
            $level=1;
        }
        $level=$level>$maxLevel?$maxLevel:$level;
        $arr=array();
        foreach($this as $key=>$val){
            if(in_array($key ,$ignore))
                continue;
            elseif(is_bool($val)|| is_int($val)||is_string($val)||is_null($val)|| is_float($val) )
                $arr[$key]=$val;
            elseif( $val instanceof  \DateTime)
                $arr[$key]=$val->format($dateFormat);

            elseif($val instanceof PersistentCollection && $level>0 )
            {   
                $childArr=array();
                if( count($val))
                    foreach($val as $x)
                        $childArr[]=$x->arrayFy($level-1,$ignore);

                $arr[$key]=$childArr;
            }elseif($key!='_entityPersister'&&$key!='_identifier'&&$key!='__isInitialized__' && !($val instanceof PersistentCollection))

                $arr[$key]=$val->arrayFy($level-1,$ignore);
        }
        return $arr;
    }
}