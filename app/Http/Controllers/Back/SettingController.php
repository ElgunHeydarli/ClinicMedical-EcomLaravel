<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Services\SettingService;
use App;

class SettingController extends Controller
{
    protected $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function indexGeneral()
    {
        $setting = $this->service->getById();
        return view('admin.settings.general')->with('setting', $setting);
    }

    public function indexContact()
    {
        $setting = $this->service->getById();
        return view('admin.settings.contact')->with('setting', $setting);
    }

    public function indexSocial()
    {
        $setting = $this->service->getById();
        return view('admin.settings.social')->with('setting', $setting);
    }

    public function indexAbout()
    {
        $setting = $this->service->getById();
        return view('admin.settings.about')->with('setting', $setting);
    }

    public function indexAbout_1()
    {
        $setting = $this->service->getById();
        return view('admin.settings.about-1')->with('setting', $setting);
    }

    public function homepageSeo()
    {
        $setting = $this->service->getById();
        return view('admin.seo.homepage_seo')->with('setting', $setting);
    }
    
    public function siteeSeo()
    {
        $setting = $this->service->getById();
        return view('admin.seo.sitepage_seo')->with('setting', $setting);
    }
    
    public function update(SettingRequest $request)
    {
        if(App::isLocale('en')){
            $id = 2;
        }
        elseif(App::isLocale('ru'))
        {
            $id = 3;
        }
        else{
            $id = 1;
        }
        $this->service->update($request, $id);
        toastr()->success('Əməliyyat Uğurla Yerinə Yetirildi', 'Redaktə Edildi');
        return redirect()->back();
    }
}
