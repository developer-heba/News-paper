@extends('layouts.admin-template')
@section('content')
@section('title', 'Journalist edit ')

@section('breadcrumb')
	<span>Journalist edit </span>
@endsection
	<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page">edit Journalist </li>
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
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Edit  A Journalist
                                           
									</div>
									<div class="card-body">
                                       
										<form class="form-horizontal" enctype="multipart/form-data"  action="{{route('Journalist.update',$journalist->id)}}" method="post">
											@csrf
											@method('PUT')
										
											<div class="form-group row">
												<label class="col-md-3 col-form-label">name</label>
												<div class="col-md-9">
													<input type="text" 
                                                name="name" class="form-control" value="{{$journalist->name}}" >
													@error('name')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
												</div>
                                            </div>
                                            
											<div class="form-group row">
                                                
                                                <label class="col-md-3 col-form-label" for="logo">logo</label>
                                           
                                               
                                           
												<div class="col-md-3">
                                                    <input type="file" id="logo" name="logo"  placeholder="logo"  value="{{$journalist->logo}}" >
                                                    <br>
                                                    <img src="{{$journalist->logo}}" width="100"height="70" style="margin-top:20px !important "> 
                                                   
													@error('logo')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
                                                </div> 
                                               
                                               
                                            </div>
                                            <div class="form-group row">
                                                <label for="switcheryColor4"
                                                class="col-md-3 col-form-label">status  </label>
                                                
                                                <div class="col-md-3">
                                                   
                                                       
                                                    
                                                               <select name="status" id="" class="form-control">
                                 
                                                                <option 
                                                                    value="0">pending</option>
                                                                    <option 
                                                                    value="1">active </option>
                            
                                                             
                                                            </select>
                                                        @error("status")
                                                        <span class="text-danger"> </span>
                                                        @enderror
                                                  
                                                </div>
											</div>
                                          
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





						
    </section>







@endsection