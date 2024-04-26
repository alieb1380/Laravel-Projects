<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcome_Page_Test extends Controller
{
    public function welcome() {
        return view("welcome");
    }
}
