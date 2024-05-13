<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\SiteHelper;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id) {

        $user = User::find($id);
        return view('pages/site/profile', compact('user'));
    }

}
