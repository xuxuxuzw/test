<?php
/**
 * Created by PhpStorm.
 * User: 3N
 * Date: 2018/9/9
 * Time: 21:32
 */
namespace App\Common\Services;

use App\Common\ErrorCode;

class BaseService
{
    /**
     * 抛出异常
     * @param $error_code
     * @param string $error_msg
     * @throws \Exception
     */
    public function throwException($error_code, $error_msg = '')
    {
        if (is_array($error_msg)) {
            $msg_arr = $error_msg;
            $error_msg = $msg_arr[0] . ErrorCode::getMessage($error_code) . $msg_arr[1];
        } else {
            empty($error_msg) && $error_msg = ErrorCode::getMessage($error_code);
        }

        throw new \Exception($error_msg, $error_code);
    }
}