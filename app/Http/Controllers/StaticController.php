<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index() {
        return view('home');
    }
    public function selling() {
        return view('selling');
    }
    public function buying() {
        return view('buying');
    }
    function item($id) {
        return ($id);
    }
}
