<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\Setting\StoreRequest;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = Setting::find(1);

        if (!$setting) {

            Artisan::call('db:seed --class=SettingSeeder');

            return redirect()->route('settings.edit', 1); 
        }

        return view('pages/admin/settings/update', compact('setting'));
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
        return view('pages/admin/settings/update', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Setting $setting)
    {

        if ($request->validated()) {

            $setting->is_site_open = $request->is_site_open == 1 ? 1 : 0;
            $setting->admin_items_per_page = $request->admin_items_per_page;
            $setting->site_items_per_page = $request->site_items_per_page;

            $setting->update();

            return redirect()->route('settings.edit', compact('setting'))->with('info', 'Success!'); 
        }
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
