<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Requests\JournalistRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\Journalist;
use App\Models\Magazine;
use App\Models\Adds;
use RealRashid\SweetAlert\Facades\Alert;
class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journalists=Journalist::all();
         $magazines=Magazine::all();
        return view('Admin.journalist.All',compact('journalists','magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.journalist.Add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JournalistRequest $request)

    {
       
      
        $path = $request->logo->store('journalist_logo');
        $imagename= $request->logo->getClientOriginalName();
       
         $image='/storage/app/'.$path ;
         $journalist = Journalist::create([
         'name' => $request->name,
         'logo' =>  $image
         
     ]);

      $journalist->save();
   
      if( $journalist){
      $notification = array(
        'MESSAGE'=>'  the journalist is successfully created',
        'alert-type'=>'success'
        );
   return redirect()->route('Journalist.index')->with($notification);
    }else{
        $notification = array(
            'alert-type' => 'error'
           );
           return redirect()->back()->with($notification);
    }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journalists=Journalist::all();
          $magazines=Magazine::all();
       $journalist=Journalist::find($id);

        return view("Admin.journalist.edit",compact('journalist','journalists','magazines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    

      $rules=  [
            'name'=>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ];
        $messages =[
            'name.required'=>'journalist name is required',
            'logo.image' => 'journalist logo must be image',
            'logo.mimes' => 'journalist logo extentions must be jpeg or png or jpg or gif or svg',
            'logo.max' => 'journalist logo size must be lessthan 2048',
           
        ];
        $validatedData = $request->validate(
            $rules, $messages);

            $journalist = Journalist::find($id);

             if (!$journalist){
             $notification = array(
                'alert-type' => 'error'
               );
              return redirect()->route('Journalist.index')->with($notification);
            }
        // update date
          
              
                if ($request->has('logo')) {
                    $path = $request->logo->store('journalist_logo');
                    $imagename= $request->logo->getClientOriginalName();
                   
                     $image='/storage/app/'.$path ;
                 
                }else{
                    $image=$journalist->logo;
                }
                  
              if ($request->has('status')) {
                   $status= $request->status;
                 
                }else{
                    $status=$journalist->status;
                }
                
                $journalist::where('id', $id)
              ->update([
               'name' => $request->name,
               'status' => $status,
               'logo' => $image
              ]);
              $notification = array(
                'MESSAGE'=>'  the journalist is successfully updated',
                'alert-type'=>'success'
                );
             return redirect()->route('Journalist.index')->with($notification);
          
                
                   $notification = array(
                    'alert-type' => 'error'
                   );
             return redirect()->route('Journalist.edit')->with($notification);
         

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $journalist = Journalist::findOrFail($request->id);
        
                $journalist->delete();
                $notification = array(
                    'MESSAGE'=>'  the journalist is successfully deleted',
                    'alert-type'=>'success'
                    );
                return redirect()->route('Journalist.index')->with($notification);
             
    }
}
