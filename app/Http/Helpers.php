<?php


use App\Product;




//returns combinations of customer choice options array

if (! function_exists('combinations')) {
    function combinations($arrays) {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }
}

//print data with well formate
//function debug($data,$exit = null){
//
//    echo '<pre>';
//    print_r($data);
//    if($exit!=null){
//     exit;
//    }
//
//
//}


?>
