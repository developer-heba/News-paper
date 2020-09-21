<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Journalist;
use App\Models\Adds;
use App\Models\Magazine;

class UserController extends Controller
{
     public function index(){
         $users=User::All();
         $journalists=Journalist::All();
         $magazines=Magazine::All();
         $adds=Adds::All();
         return view('Admin.users.All',compact('users','journalists','magazines','adds'));
         
     }
      public function store(Request $request){
          
          
          
          $rules=[
               'name'=>'required|min:3|max:100',
              'email'=>'required|email|unique:users,email',
               'password' => 'required|min:8'
              ];
              
         $messages=[
               'name.riquired'=>'name is required',
               'name.min'=>'name must be greater than 3 letters',
               'name.max'=>'name must be less than 100 letters',
               'email.email'=>'enter avalid email',
               'email.unique'=>' this email is exist',
               'email.required'=>'email is required',
               'password.required' => 'password is required',
               'password.min' => 'password must be greater than 8 letters'
          
              ];
                 $this->validate($request, $rules,$messages);
                
                
                
                    $user = User::create([
                 'name' => $request->name,
                 'email' =>  $request->email,
                 'password'=> bcrypt($request->password)
                 
             ]);
        
               $user->save();
        
        
              if($user){
              $notification = array(
                'MESSAGE'=>'  the  user is successfully created',
                'alert-type'=>'success'
                );
           return redirect()->route('users.index')->with($notification);
            }else{
                $notification = array(
                    'alert-type' => 'error'
                   );
                   return redirect()->back()->with($notification);
            }
         
     }
      public function edit($id)
    {
          $user=User::find($id);
           $magazines=Magazine::All();
          $journalists=Journalist::All();
              
        return view("Admin.users.edit",compact('user','journalists','magazines'));
        
    
        
    }
    
    
    
    
    
    
    
        public function update(Request $request, $id)
    {
            
            
               $user= User::find($id);
            
          $rules=[
               'name'=>'required|min:3|max:100',
               'email'=>'required|email'
              ];
              
         $messages=[
               'name.riquired'=>'name is required',
               'name.min'=>'name must be greater than 3 letters',
               'name.max'=>'name must be less than 100 letters',
               'email.email'=>'enter avalid email',
               'email.required'=>'email is required',
               'password.min' => 'password must be greater than 8 letters'
          
              ];
                 $this->validate($request,$rules,$messages);
                
     
         
             if ($request->has('status')) {
                   $status= $request->status;
                 
                }else{
                    $status=$user->status;
                }
                  if ($request->has('password')&&!empty($request->password)) {
                      
                   $password=bcrypt($request->password);
                   
                 
                }else{
                    $password=$user->password;
                }
               
                
                $user::where('id', $id)
              ->update([
                'name' => $request->name,
                'email' =>  $request->email,
                'password'=>$password,
                'status'=>$status
              ]);
              $notification = array(
                'MESSAGE'=>'  the user is successfully updated',
                'alert-type'=>'success'
                );
                
             return redirect()->route('users.index');
          
                
                   $notification = array(
                    'alert-type' => 'error'
                   );
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $user = User::findOrFail($request->id);
        
                $user->delete();
                $notification = array(
                    'MESSAGE'=>'  the user is successfully deleted',
                    'alert-type'=>'success'
                    );
                return redirect()->route('users.index')->with($notification);
    }

}
