<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect('login');
        }

        return view("list");
    }

    public function ajaxList(Request $request)
    {
        // Checking if we use this function via ajax request or not
        if(!$request->ajax()){
            return "For AJAX call only";
        }

        // Getting the list
        $ch = curl_init("https://www.imintheright.com.au/get-vehicle-make-list.php");

        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        );

        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);

        // Rearrange the list to our prefer format
        $sortedList = [];
        foreach(json_decode($content, true) as $key => $value) {
            $listIndex = substr($value, 0, 1);
            $sortedList[$listIndex][] = $value . '{' . $key . '}';
        }
        ksort($sortedList);
        // TODO sorting the car list inside. sort() not working for now
        foreach($sortedList as $name => $list) {
            sort($list);
        }

        return $sortedList;

    }
}
