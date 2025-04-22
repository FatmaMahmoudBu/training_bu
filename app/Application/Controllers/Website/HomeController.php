<?php

namespace App\Application\Controllers\Website;
use App\Application\Controllers\AbstractController;
use App\Application\Controllers\Controller;
use App\Application\Model\Administration;
use App\Application\Model\Page;
use App\Application\Model\User;
use App\Application\Model\News;
use App\Application\Model\Setting;
use App\Application\Model\Gallery;
use App\Application\Model\Image;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(layoutHomePage('website'));
    }

    public function welcome(){
        $news = News::where('flag',1)->latest()->limit('3')->get();
        if(getDir() == 'rtl'){
            $home_about_settings = Setting::where('name', 'LIKE', "%About_ar%")->first();
        } else {
            $home_about_settings = Setting::where('name', 'LIKE', "%About_en%")->first();
        }
        
        $gallery = Gallery::find(1);
        $images = Image::orderBy('id', 'asc')->where('gallery_id', '1')->get();

        $administration= Administration::orderBy('name', 'desc')->get();
        
        return view(layoutHomePage('website'),compact('news', 'home_about_settings', 'gallery', 'images', 'administration'));
    }

    public function deleteImage($model, $id, Request $request)
    {
        if (auth()->check()) {
            if (file_exists(public_path(env('UPLOAD_PATH') . DS . $request->name))) {
                $model = 'App\\Application\\Model\\' . ucfirst($model);
                $filed = $request->has('filed_name') ? $request->get('filed_name') : 'image';
                if (class_exists($model)) {
                    $item = $model::findorFail($id);
                    if (json_decode($item->{$filed})) {
                        $array = [];
                        foreach (json_decode($item->{$filed}) as $file) {
                            if ($file != $request->name) {
                                $array[] = $file;
                            }
                        }
                        $item->{$filed} = json_encode($array);
                        $item->save();
                        alert()->success("Done Delete", "Done");
                        return redirect()->back();
                    }
                    alert()->error("Filed not found", "Error");
                    return redirect()->back();
                }
                alert()->error("Class not exists", "Error");
                return redirect()->back();
            }
            alert()->error("File not exists", "Error");
            return redirect()->back();
        }
        abort('404');
    }

}
