<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueTest extends Controller
{
    public function index(){
        return view('vue.vue');
    }
}
