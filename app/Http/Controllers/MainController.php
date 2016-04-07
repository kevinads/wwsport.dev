<?php

namespace App\Http\Controllers;

use App\Articles as Articles;
use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function index() {
        echo "Home Page";
        //return view('index', $data);
    }

    public function inner($dataid) {
        $data = array(
            "content" => Articles::where('data-id', '=', $dataid)->first()
        );
        return view('index', $data);
    }

    public function cat($cat) {
        $data = array(
            "content" => Articles::orderBy('data-id','desc')->where('category', $cat)->take(10)->get()
        );
        return view('list', $data);
    }
}
