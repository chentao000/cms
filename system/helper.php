<?php
/** .-------------------------------------------------------------------
 * | 函数库
 * '-------------------------------------------------------------------*/

if (!function_exists('url')){
    function url($url,$arg=[]){
        $info = explode('.',$url);
        return __ROOT__."?action={$info[0]}/{$info[1]}/{$info[2]}/"."&".http_build_query($arg);
    }
}