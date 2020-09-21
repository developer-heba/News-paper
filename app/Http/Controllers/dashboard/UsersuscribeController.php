<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\JournalistRequest;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserSubscribe;
use App\Models\Journalist;
use App\Models\Magazine;
use App\Models\Adds;

class UsersuscribeController extends Controller
{
      public function index(){
         $user_subscribe=UserSubscribe::All();
         $journalists=Journalist::All();
         $magazines=Magazine::All();
         $adds=Adds::All();
         return view('Admin.usersubscribes.All',compact('user_subscribe','journalists','magazines','adds'));
         
     }
      public function update(Request $request, $id)
    {
            
            
               $user_subscribe= UserSubscribe::find($id);
            
                      $rules=[
                           'amount'=>'required'
                          ];
                          
                     $messages=[
                           'amount.riquired'=>'amount is required'
                         
                          ];
                          
                 $this->validate($request,$rules,$messages);
                $user_subscribe::where('id', $id)
              ->update([
                'amount' => $request->amount,
                'validuntil' =>$request->vaild_until,
                'user_id'=>$request->user_id
              
              ]);
              $notification = array(
                'MESSAGE'=>'  the user is successfully updated',
                'alert-type'=>'success'
                );
                
             return redirect()->route('users.subscribe');
          
                
                   $notification = array(
                    'alert-type' => 'error'
                   );
        return redirect()->route('users.subscribe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $user_subscribe = UserSubscribe::findOrFail($request->id);
        
                $user_subscribe->delete();
                $notification = array(
                    'MESSAGE'=>'  the user subscribe is successfully deleted',
                    'alert-type'=>'success'
                    );
                return redirect()->route('users.subscribe')->with($notification);
    }
      public function edit($id)
    {
          $user_subscribe=UserSubscribe::find($id);
           $magazines=Magazine::All();
          $journalists=Journalist::All();
              
        return view("Admin.usersubscribes.edit",compact('user_subscribe','journalists','magazines'));
        
    
        
    }
    
    
    
}
