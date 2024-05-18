<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use App\Models\Vizit;
use ElFactory\IpApi\IpApi;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VizitController;
use App\Http\Requests\Message\StoreRequest;
use App\Helpers\Breadcrumbs;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('pages/admin/users/messages', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::find($id);
        return view('pages/admin/users/message', compact('message'));
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::buildBreadcrumbs('contact_us', 'Contact us');
        return view('pages/site/contact_us', compact('breadcrumbs'));
    }

    public function store(StoreRequest $request)
    {
        if ($request->validated()) {

            $message = $request->all();
            $message['user_id'] = Auth::user() ? Auth::user()->id : 0;
            
            if (!empty($server['REMOTE_ADDR'])) {
                $response = IpApi::default($_SERVER['REMOTE_ADDR'])->fields(['city', 'country'])->lang('ru')->lookup();
                $message['ip_address'] = $server['REMOTE_ADDR'];
                $message['city'] = !empty($response['city']) ? $response['city'] : "";
                $message['country'] = !empty($response['country']) ? $response['country'] : "";
            }

            Message::create($message);
            
            return redirect()->route('report')->with('info', 'Mesage has been sent!'); 
        }
    }

    public function clear()
    {
        if (!Auth::user()->is_root) {
            return redirect()->back()->with('status', 'access denied!');              
        }

        DB::table('messages')->truncate();
        session(['messageCount' => '']);
        return redirect()->route('messages')->with('info', 'table messages cleaned!'); 
    }

    public function report()
    {
        return view('pages.site.report');
    }
}
