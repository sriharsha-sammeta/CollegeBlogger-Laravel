<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        $first = 'sriharsha';
        $last = 'sammeta';
        $people = ['ajay', 'chitti', 'rahul', 'vinod', 'avinash'];
        return view('pages.about', compact('first', 'last', 'people'));
    }

    public function contact()
    {
        return view('pages.contact')->with('phone', '1234567890');
    }
}
