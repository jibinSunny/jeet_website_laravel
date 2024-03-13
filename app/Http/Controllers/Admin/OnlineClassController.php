<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnlineClassController extends Controller
{
    public function showOnlineClasses(Request $request){
        $url = 'http://jeetmeet.livebox.co.in/   livebox/appsservice/api/videoConfSettings';
        $ch = curl_init($url);

        $jsonData = array(
            'action' => 'Add',
            'username' => 'apiuser',
            'key' => '################',
            'name' => 'Conference-1',
            'selectPreset' => 'Preset-1',
            'Authentication' => 'false'
        );

        $jsonDataEncoded = json_encode($jsonData);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($ch);
        // return view('admin.online_class.showOnlineClasses');
    }
}
