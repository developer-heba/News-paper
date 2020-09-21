<?php

namespace App\Http\Controllers\dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Journalist;
use App\Models\Magazine;
use App\Models\Adds;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
class SettingController extends Controller
{
   
   
   
   
    public function edit()
    {
          $journalists=Journalist::all();
         $magazines=Magazine::all();
           $Adds=Adds::all();
        
        $count = Setting::get()->count();
        if( $count > 0 ) {

            $sc = Setting::get()->first();
            return view('Admin.settings.edit', compact('sc','journalists','magazines','Adds'));
        
        }else {
            return view('Admin.settings.show',compact('journalists','magazines','Adds'));
        }
        
    }
      public function store(Request $request)
    {
        $name_errors = [
            'name.required' => 'من فضلك أدخل إسم الموقع',
            'name.max' => 'يجب أن لا يزيد إســم الموقع عن 100 حرف',
            'desc.required' => 'من فضلك أدخل وصف الموقع لمحرك البحث',
            'desc.max' => 'يجب أن لا يزيد وصف الموقع لمحرك البحث عن 255 حرف',
            'desc.min' => 'يجب أن لا يقل وصف الموقع لمحرك البحث عن 50 حرف',
            'email.required' => 'من فضلك أدخل البريد الالكترونى للموقع',
            'email.email' => 'من فضلك أدخل بريد الكترونى صالح',
            'phone.required' => 'من فضلك أدخل رقم هاتف الموقع',
            'site_logo.required' => 'من فضلك اختار لوجو الموقع',
            'site_logo.max' => 'يجب أن لا يزيد حجم صورة اللوجو عن 512 كيلوبايت',
            'site_icon.required' => 'من فضلك اختار ايكون الموقع',
            'site_icon.max' => 'يجب أن لا يزيد حجم صورة الايكون عن 200 كيلوبايت',
            'site_name_or_img.required' => 'من فضلك قوم باختيار عرض اسم الموقع او اللوجو',
            'facebook.url' => 'رابط الفيسبوك غير صالح',
            'twitter.url' => 'رابط تويتر غير صالح',
            'instagram.url' => 'رابط انستجرام غير صالح',
            'google.url' => 'رابط جوجل بلس غير صالح',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'desc' => 'required|string|min:50|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'site_logo' => 'required|image|max:1000|mimes:jpg,jpeg,png',
            'site_icon' => 'required|image|max:1000|mimes:jpg,jpeg,png',
            'site_name_or_img' => 'required|in:name,img',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'google' => 'nullable|url',
        ], $name_errors);


        if( $request->head_code === null ) {
            $request->head_code = '';
        }
        if( $request->footer_code === null ) {
            $request->footer_code = '';
        }

        if( $request->facebook === null ) {
            $request->facebook = '';
        }
        if( $request->twitter === null ) {
            $request->twitter = '';
        }
        if( $request->instagram === null ) {
            $request->instagram = '';
        }
        if( $request->google === null ) {
            $request->google = '';
        }

        $site_logo = 'logo.'.$request->site_logo->getClientOriginalExtension();
        $site_icon = 'icon.'.$request->site_icon->getClientOriginalExtension();

        $imgPath = public_path('images/site/');
        $request->site_logo->move($imgPath, $site_logo);
        $request->site_icon->move($imgPath, $site_icon);


        $se = new Setting();
        $se->site_name          = $request->name;
        $se->meta_desc          = $request->desc;
        $se->phone              = $request->phone;
        $se->email              = $request->email;
        $se->head_code          = $request->head_code;
        $se->footer_code        = $request->footer_code;
        $se->site_logo          = $site_logo;
        $se->site_icon          = $site_icon;
        $se->site_name_or_img   = $request->site_name_or_img;
        $se->facebook           = $request->facebook;
        $se->twitter            = $request->twitter;
        $se->instagram          = $request->instagram;
        $se->google_plus        = $request->google;

        $se->save();
          $notification = array(
        'MESSAGE'=>'تم تحديث البيانات بنجاح ',
        'alert-type'=>'success'
        );
         return redirect()->back()->with($notification);
    }
     public function update(Request $request)
    {
        $name_errors = [
            'name.required' => 'من فضلك أدخل إسم الموقع',
            'name.max' => 'يجب أن لا يزيد إســم الموقع عن 100 حرف',
            'desc.required' => 'من فضلك أدخل وصف الموقع لمحرك البحث',
            'desc.max' => 'يجب أن لا يزيد وصف الموقع لمحرك البحث عن 255 حرف',
            'desc.min' => 'يجب أن لا يقل وصف الموقع لمحرك البحث عن 50 حرف',
            'email.required' => 'من فضلك أدخل البريد الالكترونى للموقع',
            'email.email' => 'من فضلك أدخل بريد الكترونى صالح',
            'phone.required' => 'من فضلك أدخل رقم هاتف الموقع',
            'site_logo.required' => 'من فضلك اختار لوجو الموقع',
            'site_logo.max' => 'يجب أن لا يزيد حجم صورة اللوجو عن 512 كيلوبايت',
            'site_icon.required' => 'من فضلك اختار ايكون الموقع',
            'site_icon.max' => 'يجب أن لا يزيد حجم صورة الايكون عن 200 كيلوبايت',
            'site_name_or_img.required' => 'من فضلك قوم باختيار عرض اسم الموقع او اللوجو',
            'facebook.url' => 'رابط الفيسبوك غير صالح',
            'twitter.url' => 'رابط تويتر غير صالح',
            'instagram.url' => 'رابط انستجرام غير صالح',
            'google.url' => 'رابط جوجل بلس غير صالح',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'desc' => 'required|string|min:50|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'site_logo' => 'image|max:1000|mimes:jpg,jpeg,png',
            'site_icon' => 'image|max:1000|mimes:jpg,jpeg,png',
            'site_name_or_img' => 'required|in:name,img',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'google' => 'nullable|url',
        ], $name_errors);


        if( $request->head_code === null ) {
            $request->head_code = '';
        }
        if( $request->footer_code === null ) {
            $request->footer_code = '';
        }

        if( $request->facebook === null ) {
            $request->facebook = '';
        }
        if( $request->twitter === null ) {
            $request->twitter = '';
        }
        if( $request->instagram === null ) {
            $request->instagram = '';
        }
        if( $request->google === null ) {
            $request->google = '';
        }

        if( $request->site_logo === null ) {
            $site_logo = $request->old_logo;
        }else{

            $imgPath = public_path('images/site/');
            unlink($imgPath.$request->old_logo);

            $site_logo = 'logo.'.$request->site_logo->getClientOriginalExtension();
            $request->site_logo->move($imgPath, $site_logo);
        }

        if( $request->site_icon === null ) {
            $site_icon = $request->old_icon;
        }else {
            $imgPath = public_path('images/site/');
            unlink($imgPath.$request->old_icon);

            $site_icon = 'icon.'.$request->site_icon->getClientOriginalExtension();
            $request->site_icon->move($imgPath, $site_icon);
        }


        Setting::where('id', $request->id)
        ->update([
            'site_name'         => $request->name,
            'meta_desc'          => $request->desc,
            'phone'              => $request->phone,
            'email'              => $request->email,
            'head_code'          => $request->head_code,
            'footer_code'        => $request->footer_code,
            'site_logo'          => $site_logo,
            'site_icon'          => $site_icon,
            'site_name_or_img'   => $request->site_name_or_img,
            'facebook'           => $request->facebook,
            'twitter'            => $request->twitter,
            'instagram'          => $request->instagram,
            'google_plus'        => $request->google,
        ]);
    $notification = array(
        'MESSAGE'=>'تم تحديث البيانات بنجاح ',
        'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
}
