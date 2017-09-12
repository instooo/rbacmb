<?php

/**
 * 验证正小数后两位
 * @param $str
 * @return bool
 */
function isFloat($str, $bit = 2)
{
    if($str==0) return true;
    $exp = '/^[0-9]+(\.[0-9]{' . $bit . '})?$/';
    return preg_match($exp, $str) ? true : false;
}

function maxFloat($str,$bit=2){
    $exp = '/^\d+(\.\d{1,'.$bit.'})?$/';
    return preg_match($exp, $str) ? true : false;
}
