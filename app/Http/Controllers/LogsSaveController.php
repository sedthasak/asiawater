<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\logsModel;

class LogsSaveController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_log($para)
    {
        $return = 'false';
        if(isset($para['part']) && isset($para['user'])){
            if($para['part']=='frontend'||$para['part']=='backend'){
                $ar_part = array('frontend' => 'FRONTEND','backend' => 'BACKEND');
                $res_part = $ar_part[$para['part']];
                $default_user = '0';
                $default_user = $para['user'];

                $logsModel = new logsModel;

                $logsModel->part = $res_part;
                $logsModel->log_user = $default_user;
                $logsModel->event = $para['event']??'-';
                $logsModel->remark = $para['remark']??'-';
                $logsModel->ref = $para['ref']??'-';

                $logsModel->save();
                $return = $logsModel;
            }
        }
        return $return;
    }
}
