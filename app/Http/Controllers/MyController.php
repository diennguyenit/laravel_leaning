<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyController extends Controller
{
    public function helloWorld()
    {
        echo "MyController says hello world!";
    }

    public function getParam($id)
    {
        echo "the parameter: {$id}";
        return redirect()->route('myRoute');

    }

    public function getRequest(Request $myRequest)
    {
        echo $myRequest->url();
    }

    public function postForm(Request $myRequest)
    {
        $dataString = '';
        // var_dump($myRequest);
        $dataArray = $myRequest->all();
        if (isset($dataArray['_token']))
            unset($dataArray['_token']);

        foreach ($dataArray as $key => $value) 
        {
            if (!empty($dataArray[$key]))
            {
                $dataString .= ", {$key}: {$value}";
            }
        }

        echo $dataString;
    }

    public function setCookie($param)
    {
        $myResponse = new Response;
        if (!empty($param)) {
            $myResponse->withCookie('param', $param, 5);
        }
        return $myResponse;
    }

    public function getCookie(Request $myRequest) 
    {
        return $myRequest->cookie('param');
    }

    public function getView(){
        return view('postForm');
    }

    public function uploadFile(Request $myRequest) 
    {
        $myFile = $myRequest->file('myFile');
        // var_dump($dataArray);
        // dd();
        if (strtoupper($myFile->getClientOriginalExtension('myFile')) == 'JPG') {
            $myFile->move('img', $myFile->getClientOriginalName('myFile'));
        }
        else {
            echo 'chua chon file';
        }
    }

    public function getJson(){
        $myArray = array('a'=>4, 'b'=>5, 'c'=>7, ['f'=>5, 'g'=>9]);
        return response()->json($myArray);
    }

    public function PushDataToView($time){
        return view('view-test-2',['param'=>$time]);
    }

    //ptb2
    public function CaculusPtb2(Request $request) 
    {
        $a = $request->input('a');
        $b = $request->input('b');
        $c = $request->input('c');
        $result = '';
        

        if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
            
        } else {
            $delta = $b*$b - 4*$a*$c;

            if ($delta < 0) {
                $result = 'vo nghiem';
            } else {
                $x1 = (-$b + sqrt($delta))/(2*$a);
                $x2 = (-$b - sqrt($delta))/(2*$a);
                $result = "x1: {$x1}, x2: {$x2}";
            }
        }

        return view('caculus-form',['result'=>$result]);
    }

}
