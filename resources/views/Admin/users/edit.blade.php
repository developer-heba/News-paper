@extends('layouts.admin-template')
@section('content')
@section('title', 'user edit ')

@section('breadcrumb')
	<span>user edit </span>
@endsection
	<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">user edit</li>
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
										<h4>edit user</h4>
									</div>
									<div class="card-body">
				      
										<form class="form-horizontal"   action="{{route('users.update',$user->id)}}" method="post">
											@csrf
								            	@method('PUT')
											<div class="form-group row">
												<label class="col-md-3 col-form-label">name</label>
												<div class="col-md-9">
													<input type="text" 
                                                name="name" class="form-control" value="{{$user->name}}" >
													@error('name')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
												</div>
                                            </div>
                                            
											<div class="form-group row">
                                                
                                                <label class="col-md-3 col-form-label" for="email">email</label>
                                           
                                               

												<div class="col-md-9">
                                                    <input type="text" class="form-control" id="email" name="email"    value="{{$user->email}}" >
                                                   
                                                  
                                                   
													@error('email')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
                                                </div> 
                                               
                                               
                                            </div>
                                                
											<div class="form-group row">
                                                
                                                <label class="col-md-3 col-form-label" for="password">password</label>
                                           
                                               

												<div class="col-md-9">
                                                    <input type="text" class="form-control" id="password" name="password"  >
                                                   
                                                  
                                                   
													@error('password')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
                                                </div> 
                                               
                                               
                                            </div>
                                  
                                         <div class="form-group row">
                                                <label for="switcheryColor4"
                                                class="col-md-3 col-form-label">status  </label>
                                                
                                                <div class="col-md-9">
                                                   
                                                               <select name="status" id="" class="form-control">
                                 
                                                                <option 
                                                                    value="0">blocked</option>
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
													<button type="submit" class="btn btn-info">
														<i class="la la-check-square-o"></i> update
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