<?php

if(!file_exists('get_formated_date')){
    function get_formated_date($date,$format){
     $getFormated = date($format, strtotime($date));
     return $getFormated;
    }
}
