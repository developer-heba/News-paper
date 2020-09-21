<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journalist;
use App\Models\Adds;
use App\Models\Magazine;
use Illuminate\Http\File;
use App\Http\Requests\MagazineRequest;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $journalists=Journalist::All();
         $magazines=Magazine::All();
       
          
        return view('Admin.magazines.All',compact('journalists','magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        
         $this->validate($request, [
          'title'=>'required',
           'journalist'=>'required',
               'filesname' => 'required',
             'filesname.*' => 'required|mimes:pdf|max:2000'
    
      ]);
 $filesarray=[];
        if($request->has('filesname'))
         {
            
            foreach($request->file('filesname') as $file)
            {
                
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('pdf_files',$filename);
               $filesarray[]=$filename;
               
            }
            
            
         }
  $data=json_encode($filesarray);
      
       
     
     
         $magazine = Magazine::create([
         'title' => $request->title,
         'file' =>  $data,
         'journalist_id'=> $request->journalist
         
     ]);

       $magazine->save();


      if(  $magazine){
      $notification = array(
        'MESSAGE'=>'  the  magazine is successfully created',
        'alert-type'=>'success'
        );
   return redirect()->route('Magazine.index')->with($notification);
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
         $magazine=Magazine::find($id);
           $magazines=Magazine::All();
      $journalists=Journalist::All();
        return view("Admin.magazines.edit",compact('magazine','journalists','magazines'));
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
        
        $magazine=Magazine::find($id);
               $this->validate($request, [
          'title'=>'required',
           'journalist'=>'required',
         
             'filesname.*' => 'required|mimes:pdf|max:2000'
    
      ]);
      
      
      $filesarray=[];
        if($request->has('filesname'))
         {
            
            foreach($request->file('filesname') as $file)
            {
                
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('pdf_files',$filename);
               $filesarray[]=$filename;
               
            }
             $data=json_encode($filesarray);
            
         }else{
             $data=$magazine->file; 
         }
 

            $magazine= Magazine::find($id);

             if (! $magazine){
             $notification = array(
                'alert-type' => 'error'
               );
              return redirect()->route('Magazine.index')->with($notification);
            }
   
          
              
          
              if ($request->has('status')) {
                   $status= $request->status;
                 
                }else{
                    $status=$magazine->status;
                }
                 if ($request->has('journalist')) {
                   $journalist= $request->journalist;
                 
                }else{
                    $journalist=$magazine->journalist_id;
                }
                
                $magazine::where('id', $id)
              ->update([
               'title' => $request->title,
               'file' => $data,
               'status'=>$status,
               'journalist_id' =>$journalist
              ]);
              $notification = array(
                'MESSAGE'=>'  the magazine is successfully updated',
                'alert-type'=>'success'
                );
             return redirect()->route('Magazine.index')->with($notification);
          
                
                   $notification = array(
                    'alert-type' => 'error'
                   );
             return redirect()->route('Magazine.edit')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy(Request $request)
    {
       $magazine = Magazine::findOrFail($request->id);
        
        
                $magazine->delete();
                $notification = array(
                    'MESSAGE'=>'  the magazine is successfully deleted',
                    'alert-type'=>'success'
                    );
                return redirect()->route('Magazine.index')->with($notification);
    }
}
