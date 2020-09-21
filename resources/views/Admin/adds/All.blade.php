@extends('layouts.admin-template')
@section('content')
@section('title', 'Adds ')

@section('breadcrumb')
	<span>Adds </span>
@endsection
    

	<section class="section">
                    	<ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Adds</li>
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
										<h4>Adds</h4>
									
											@error('name')
                              
                								<small  class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										   
                								
                								
                									    @enderror
                									    
                									    
                									    
                									 @error('image')
                                
                								<small class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										  
                									 @enderror
                								
                									 
                									 @error('magazine')
                                  
                								<small class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										 
                									 @enderror
                									
											<a class="badge badge-success"  style="margin-top:30px; color:#fff;cursor:pointer;"
											data-toggle="modal" data-target="#addNewadds"  data-whatever="@mdo">Add New</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-t0 w-100 text-nowrap">
												<thead>
													<tr>
													    	<th class="wd-15p">ID</th>
														<th class="wd-15p"> name</th>
													
														<th class="wd-15p">image</th>
														<th class="wd-10p">magazine</th>
                                                        <th class="wd-25p">status</th>
                                                       <th class="wd-10p">controlers</th>
													</tr>
												</thead>
												<tbody>
											@foreach ($adds as $item)
													<tr>
														<td>{{$item->id}}</td>
														<td>{{$item->name}}</td>
														
												    	<td > <img src="{{URL::to('storage/app/Adds_images').'/'.$item->image}}" width="40" height="40"></td> 
												    	<td>{{ $item->magazine->title}}</td>
														<td>{{$item->getstatus()}}</td>
												
                                                      <!--  <td><div class="badge badge-success" >Insert</div></td> -->

                                                      <td class="center">
  
								 
                                                            
                                                            <a class="badge badge-info" width="35"  href="{{route('Adds.edit',$item->id)}}">update
                    									     	<i class="halflings-icon white thumbs-up"></i>  
                    									        </a>
                    									    <a class="badge badge-danger" width="35"  href="{{URL::to('dashboard/Adds/delete/'.$item->id)}}">delete
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