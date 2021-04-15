<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $parametres = Setting::first();

        return view('back/page/settings', ['parametres' => $parametres]);
    }


    public function update_banner_pages(Request $request){
        $request->validate(['banner_page' => 'required|image|max:5000']);
    }

    public function update_banner_home(Request $request)
    {

         $request->validate(['banner_home' => 'required|image|max:5000']);

        $setting = Setting::first();

        if ($setting != null) {

            if (File::exists(public_path('storage/' . $setting->banner_home))) {
                File::delete(public_path('storage/' . $setting->banner_home));

                $setting->update([
                    'banner_home' => request('banner_home')->store('parametres', 'public')
                ]);
            }

        } else {
            $setting = new Setting();
            $setting->banner_home = request('banner_home')->store('parametres', 'public');
            $setting->save();
        }

        return redirect()->back()->with("change_banner", "l'image a bien étée changée ");
    }
}
