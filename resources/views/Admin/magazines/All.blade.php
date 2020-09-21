@extends('layouts.admin-template')
@section('content')
@section('title', 'Magazines ')

@section('breadcrumb')
	<span>magazines </span>
@endsection
<div class="modal fade" id="addNewmagazine" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="verifyModalContent_title">   Add new Magazine</h4> 
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            	<form class="form-horizontal" enctype="multipart/form-data"  action="{{route('Magazine.store')}}" method="post">
                											@csrf
                											@method('post')
                										
                											<div class="form-group row">
                												<label class="col-md-2 col-form-label">title</label>
                												<div class="col-md-9">
                													<input type="text" 
                													name="title" class="form-control" >
                													@error('title')
                                  
                													<small class="form-text text-danger">{{$message}}</small>
                										   
                															 @enderror
                												</div>
                											</div>
                											<div class="form-group row">
                												<label class="col-md-2 col-form-label" for="file">pdf file</label>
                												<div class="col-md-9">
                													<input type="file" id="file" name="filesname[]" class="form-control"  accept="pdf/*" ="pdf file" multiple="multiple">
                													@error('filesname')
                                  
                													<small class="form-text text-danger">{{$message}}</small>
                										   
                															 @enderror
                												</div>
                											</div>
                											             <div class="form-group row">
                                                                <label for="journalists"
                                                                class="col-md-2 col-form-label">Journalist</label>
                                                                
                                                                <div class="col-md-9">
                                                                   
                                                                       <select name="journalist" id="journalists" class="form-control">
                                                                         @foreach($journalists  as $item)
                                                                        <option 
                                                                            value="{{$item->id}}">{{$item->name}}</option>
                                                                       
                                                                      @endforeach
                                                                    </select>
                                                                        @error("journalist")
                                                                        <span class="text-danger"> </span>
                                                                        @enderror
                                                                  
                                                                </div>
                											</div>
                											</div>
                                            <div class="modal-footer">
                                                	<div class="form-group row">
                    										
                    												<div class="col-md-9">
                    													<button type="submit" class="btn btn-primary">
                    														<i class="la la-check-square-o"></i> save
                    													</button>
                    												</div>
                    											</div>
                             </form>
                                </div>
                            </div>
                        </div>
                    </div>




						
@section('content')

	<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All magazines</li>
							<li class="ml-auto d-lg-flex d-none">
								<span class="sparkline_bar mr-2 float-left"></span>
								<span class="float-left border-">
									<span class="mb-0 mt-1 mr-2">1,267</span><small class="mb-0 mr-3">[ Visitors ]</small>
								</span>
								<span class="sparkline_bar1 mr-2 float-left"></span>
								<span class="float-left">
									<span class="mb-0 mt-1 mr-2">215</span><small class="mb-0">[ Chats ]</small>
								</span>
							</li>
                        </ol>
                        


                        <div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4>Magazines</h4>
							
											@error('title')
                              
                								<small  class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										   
                								
                								
                									    @enderror
                									    
                									    		 @error('journalist')
                                  
                								<small class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										 
                									 @enderror
                									    
                									 @error('filesname')
                                
                								<small class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										  
                									 @enderror
                								
                									 
                							
				<a class="badge badge-success"  style="margin-top:30px; color:#fff;cursor:pointer;" data-toggle="modal" data-target="#addNewmagazine"  data-whatever="@mdo">Add New</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-t0 w-100 text-nowrap">
												<thead>
													<tr>
														<th class="wd-15p"> ID</th>
														<th class="wd-15p">Magazine title </th>
														<th class="wd-10p">Journalist</th>
														<th class="wd-15p">file</th>
														<th class="wd-10p">Status</th>
														<th class="wd-10p">controlers</th>
													</tr>
												</thead>
											
									
												
												<tbody>
													@foreach ($magazines as $item)
													<tr>
														<td>{{$item->id}}</td>
														<td>{{$item->title}}</td>
													<td>{{$item->jornalist->name}}</td>
													
													<td>
													   <?php $files=json_decode($item->file,true)?>
														@foreach ( $files as $file)
														
													       
				  <a  href="/storage/app/pdf_files/{{$file}}" target="_blank" ><img src='/storage/app/images/pdf.png' width="50" height="50"></a>
													    
													    	@endforeach
													    
													    </td>
														<td>{{$item->getstatus()}}</td>
												
                                                      <!--  <td><div class="badge badge-success" >Insert</div></td> -->

                                                      <td class="center">
  
								 
                                        
                                        <a class="badge badge-info" width="35"  href="{{route('Magazine.edit',$item->id)}}">update
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
       
                                        <a class="badge badge-danger" width="35"  href="{{ URL::to('dashboard/Magazine/delete/'.$item->id)}}">delete
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									    
                                        
								
								
                                    
						
								</td>
	                                            	</tr>
													@endforeach
											
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
    </section>







@endsection