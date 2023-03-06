<?php

namespace App\Services;

use App\Repositories\SettingRepository;
use App;

class SettingService
{
    protected $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getById()
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

        return $this->repository->getById($id);
    }
 
    public function update($request, $id)
    {
        $data = $request->all();

        if($request->hasFile('logo')){
            $imageName ='logo.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('/'),$imageName);
            $data['logo'] = '/'.$imageName;
        }

        if($request->hasFile('favicon')){
            $imageName ='favicon.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('/'),$imageName);
            $data['favicon'] = '/'.$imageName;
        }

        if($request->hasFile('robot_txt')){
            $txtName = 'robots.txt';
            $request->robot_txt->move(public_path('/'),$txtName);
            $data['robots_txt'] = '/'.$txtName;
        }

        if($request->hasFile('about_img')) {
            $imageName = 'about.'.$request->about_img->getClientOriginalExtension();
            $request->about_img->move(public_path('images/about'),$imageName);
            $data['about_img'] = 'images/about/'.$imageName;
        } 
        
        if($request->hasFile('about_img1')) {
            $imageName1 = 'about-1'.$request->about_img1->getClientOriginalExtension();
            $request->about_img1->move(public_path('images/about'),$imageName1);
            $data['about_img1'] = 'images/about/'.$imageName1;
        } 
        
        if(App::isLocale('en')){
            $data['lang'] = 1;
        }
        elseif(App::isLocale('ru'))
        {
            $data['lang'] = 2;
        }
        else{
            $data['lang'] = 0;
        }

        return $this->repository->update($data, $id);
    }

}