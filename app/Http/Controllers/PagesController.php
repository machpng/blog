<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $list = Topic::orderBy('id', 'DESC')->paginate();
        return view('index', compact('list'));
    }
}
