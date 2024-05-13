<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\Message;
use App\Helpers\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // session(["settings" => Setting::orderBy('area', 'asc')->get()]);

        $messageCount = Message::count();
        $userCount = User::count();

        session([
            'messageCount' => $messageCount,
            'userCount'    => $userCount,
        ]);

        return view('dashboard');
    }
}