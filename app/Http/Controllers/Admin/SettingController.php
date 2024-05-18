<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('area', 'asc')->get();
        return view('pages/admin/settings/manage', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $notUsed)
    {
        if (!Auth::user()->is_root) {
            return redirect()->back()->with('status', 'access denied!');              
        }

        $settings = Setting::all();
        $requestSettings = $request->settings;

        $updatedSettings = [];
        foreach ($settings as $item) {

            if (!isset($requestSettings[$item->code])) {
                $item->value = "N";
            } elseif (isset($requestSettings[$item->code]) && $item->type == 'C') {
                $item->value = "Y";
            } else {
                $item->value = $requestSettings[$item->code];
            }

            $updatedSettings[$item->code] = $item;
            $item->update();
        }

        session(["settings" => $updatedSettings]);

        return redirect()->route('settings.index')->with('info', 'Success!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
