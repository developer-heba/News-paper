<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddsRequest;
use App\Models\Journalist;
use App\Models\Adds;
use App\Models\Magazine;
class AddsController extends Controller
{


  //yujyugyhihkjhkjhkljhk
    /**ghghghghghghgh
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $journalists=Journalist::All();
         $magazines=Magazine::All();
         $adds=Adds::All();
         
        return view('Admin.adds.All',compact('adds','journalists','magazines'));
    }

   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
           $this->validate($request, [
          'name'=>'required',
           'magazine'=>'required',
             'image' => 'required|mimes:jpg,png,jpeg,svg|max:2000'
    
      ]);
        
        if($request->has('image')){
            
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('Adds_images',$filename);
        }
        
         $adds =Adds::create([
         'name' => $request->name,
         'image' =>  $filename,
         'magazine_id'=> $request->magazine
         
     ]);

       $adds->save();
   
      if($adds){
      $notification = array(
        'MESSAGE'=>'  the  Add is successfully created',
        'alert-type'=>'success'
        );
   return redirect()->route('Adds.index')->with($notification);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $adds=Adds::find($id);
           $magazines=Magazine::All();
      $journalists=Journalist::All();
        return view("Admin.adds.edit",compact('adds','journalists','magazines'));
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
       
          
    
        ];
        $messages =[
            'name.required'=>'adds name is required',
       
       
        
           
        ];
        $validatedData = $request->validate(
            $rules, $messages);

            $adds= Adds::find($id);

             if (! $adds){
             $notification = array(
                'alert-type' => 'error'
               );
              return redirect()->route('Adds.index')->with($notification);
            }
        // update date
          
              
                if ($request->has('image')) {
          $filename = time().'_'.$request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('Adds_images',$filename);
                   
                
                 
                }else{
                     $filename=$adds->image;
                }
                  
              if ($request->has('status')) {
                   $status= $request->status;
                 
                }else{
                    $status=$adds->status;
                }
                 if ($request->has('magazine')) {
                   $magazine= $request->magazine;
                 
                }else{
                   $magazine=$adds->magazine_id;
                }
                
                $adds::where('id', $id)
              ->update([
               'name' =>      $request->name,
               'image' =>        $filename,
               'magazine_id' =>  $magazine
              ]);
              $notification = array(
                'MESSAGE'=>'  the adds is successfully updated',
                'alert-type'=>'success'
                );
             return redirect()->route('Adds.index')->with($notification);
          
                
                   $notification = array(
                    'alert-type' => 'error'
                   );
             return redirect()->route('Adds.edit')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request)
    {
       $adds = Adds::findOrFail($request->id);
        
        
               $adds->delete();
                $notification = array(
                    'MESSAGE'=>'  the$adds is successfully deleted',
                    'alert-type'=>'success'
                    );
                return redirect()->route('Adds.index')->with($notification);
    }
}
