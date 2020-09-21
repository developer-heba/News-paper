<?php

namespace App\Http\Controllers\dashboard;
use  App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use DB;
use App\Http\Requests;
use App\Models\Journalist;
use App\Models\Adds;
use App\Models\Magazine;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

use RealRashid\SweetAlert\Facades\Alert;






class AdminController extends Controller
{

    ///dsfdfdffghtytyt
    public function dashboardpage(){
        $journalists=Journalist::All();
         $magazines=Magazine::All();
         
        
        return view ('Admin.Main',compact('journalists','magazines'));
    }

    // Save Admin Register
    public function adminregister()
    {
      return view ('Admin.Register');
    }

    // Save Admin Register
    public function saveadminregister(Request $request)
    {
       
       $name_errors = [
            'nname.required' =>'Enter the name',
            'nname.max' => 'must have  100  character maximum',      

            'nemail.required' =>'Enter The Email address',
            'nemail.max' => 'must have  255  character maximum',
            'nemail.email' => 'please Enter a valid Email Address',
            'nemail.unique' => '  '.$request->nemail.' This Email is Pre-existing ',


            'npassword.required' => 'Please Enter Password',
            'npassword.min' => 'Password must have min 8 charachters',
 
        ];

        $validatedData = $request->validate([
                'nname'=> 'required|string|max:100',
                'nemail' => 'required|string|email:rfc,dns|max:255|unique:admins,email',
                'npassword'=> 'required|string|min:8',
              

       ], $name_errors);

        $data = array();
        $data['name'] = $request->nname;
        $data['email'] = $request->nemail; 
        $data['password'] = bcrypt($request->npassword);
   

     $addadmin =  DB::table('admins')->insert($data);
         

     if($addadmin){
         
          //  session::put('Name',$addadmin->Name);
          //  session::put('id',$addadmin->id);

            $notification = array(
            'MESSAGE'=>' بيانات المشرف الجديد أدخلت بنجاح',
            'alert-type'=>'success'
            );
    
        return Redirect::to('dashboard/login')->with($notification);
    }  else
    {
        $notification = array(
         'alert-type' => 'error'
        );
        return Redirect::to('dashboard/AdminRegister')->with($notification);
    
    }    
    }
    
    public function adminlogin()
    {
        return view('Admin.Login');
    }


    public function saveadminlogin(Request $request)
    {
        $name_errors = [
            'nemail.required' =>'Please Enter an Email',
            'nemail.email' => 'Please, Enter a valid Email Address ',

            'nemail.max' => 'must have  255  character maximum',

            'npassword.required' => 'Please Enter Password',
            'npassword.min' => 'Password must have min 8 charachters'
        ];

        $validatedData = $request->validate([
            'nemail' => 'required|email:rfc,dns|string|max:255',
            'npassword'=> 'required|string|min:8',
   ], $name_errors);



      $admin_email = $request->nemail;
       $admin_password = $request->npassword;
 
 if(auth()->guard('admin')->attempt(['email'=> $admin_email,'password'=> $admin_password])){
   $id=auth()->guard('admin')->id();
    $result =DB::table('admins')
    ->where('id', $id)->first();
   
               session::put('Name',$result->name);
                session::put('id',$result->id);
              
                  $notification = array(
                    'MESSAGE'=>' أهلاً وسهلاً',
                    'alert-type'=>'success'
                    );
                   return Redirect::to('/dashboard')->with($notification);
       }else
       {
           $notification = array(
            'MESSAGE'=>' البريد الإلكتروني أو الرقم السِّري غير متطابقين',
            'alert-type' => 'error'
           );
           return Redirect::to('dashboard/login')->with($notification);
       
       }
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('dashboard/login');
    }

}
