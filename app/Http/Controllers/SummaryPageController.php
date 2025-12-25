<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryPageController extends Controller
{
    public function create()
{
    return view('summaries.create');
}

}
