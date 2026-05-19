<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function fpo()
    {
        return view('info.fpo');
    }

    public function shg()
    {
        return view('info.shg');
    }

    public function pacs()
    {
        return view('info.pacs');
    }

    public function cooperatives()
    {
        return view('info.cooperatives');
    }
}
