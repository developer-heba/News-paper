@extends('layouts.admin-template')
@section('content')
@section('title', 'usersubscribe edit ')

@section('breadcrumb')
	<span>usersubscribe edit </span>
@endsection
	<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">usersubscribe edit</li>
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
										<h4>edit usersubscribe</h4>
									</div>
									<div class="card-body">
				      
										<form class="form-horizontal"   action="{{route('usersubscribe.update',$user_subscribe->id)}}" method="post">
											@csrf
								            	<input type="hidden" 
                                                name="user_id" class="form-control" value="{{$user_subscribe->user_id}}" >
											<div class="form-group row">
												<label class="col-md-3 col-form-label">amount</label>
												<div class="col-md-9">
													<input type="text" 
                                                name="amount" class="form-control" value="{{$user_subscribe->amount}}" >
													@error('amount')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
												</div>
                                            </div>
                                            
											<div class="form-group row">
                                                
                                                <label class="col-md-3 col-form-label" for="vaild_untill">vaild Until</label>
                                           
                                               

												<div class="col-md-9">
												    <input type="date" id="start" name="trip-start"  class="form-control" id="vaild_untill" 
												    name="vaild_until"  value="{{ date('Y-m-d',strtotime($user_subscribe->validuntil)) }}">
                                               
                                                   
                                                  
                                                   
													@error('vaild_until')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
                                                </div> 
                                              
                            
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