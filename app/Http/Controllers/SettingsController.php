<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.settings.index');
    }

    public function password(Request $request)
    {
        $input = $request->all();
        if ($input['new_password'] = $input['confirm_password']) {
            $current_pass = User::where('id', auth()->user()->id)
                ->pluck('password');
            if (password_verify($input['new_password'], $current_pass)) {
                User::where('id', auth()->user()->id)->update(['password' => bcrypt($input['new_password'])]);

                return redirect()->route('settings.index');
            } else {
                return redirect()->route('settings.index');
            }
        } else {
            return redirect()->route('settings.index');
        }
    }

    public function store(Request $request)
    {
        $requestData = $request->except('_token');
        $config = new Config();
        foreach ($requestData as $data => $value){
            $config->where('title',$data)->update(['value'=>$value]);
        }
        return redirect()->route('settings.index')
            ->with('success','Seetings updated');
    }
}
