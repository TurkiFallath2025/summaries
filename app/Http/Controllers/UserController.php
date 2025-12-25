<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request){
        $index = new User;
        $index->name = $request->name;
        $index->email = $request->email;
        $index->password = bcrypt($request->password);
        $index->save();
        return response()->json( $index);
    }
}
