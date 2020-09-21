@extends('layouts.admin-template')
@section('content')
@section('title', 'setting ')

@section('breadcrumb')
	<span>setting </span>
@endsection


	<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">settings </li>
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
										<h4></h4>
									</div>
									<div class="card-body">
								<form class="form-horizontal" enctype="multipart/form-data"  action="{{ url('dashboard/settings/update')}}" method="post">
											{{ csrf_field() }}
											@method('POST')
										
					    <div class="form-group row">
						
							<div class="col-md-12">
							<input type="hidden" name="id" value="{{ $sc->id }}" />
                			<input type="hidden" name="old_logo" value="{{ $sc->site_logo }}" />
                			<input type="hidden" name="old_icon" value="{{ $sc->site_icon }}" />
                			
                			<label>site name </label>
                			<input type="text" class="form-control" name="name" value="{{ $sc->site_name }}" />
                				@error('name')
                					<small class="form-text text-danger">{{$message}}</small>
                										   
                				 @enderror
        					     		</div>
                                    </div>
                                            
							<div class="form-group row">
							 	 <div class="col-md-12">
                                                                      
                    			<label> descrition site for Google search engine</label>
                    			<textarea class="form-control" rows="4" name="desc">{{ $sc->meta_desc }}</textarea>
                    				@error('desc')
                    					<small class="form-text text-danger">{{$message}}</small>
                    										   
                    				 @enderror
                                                </div> 
                               
                               
                            </div>
                            <div class="form-group row">
                           
                                
                                <div class="col-md-12">
                                   
                                    <label>Email </label>
                        			<input type="email" class="form-control" name="email" value="{{ $sc->email }}" />
                        				@error('email')
                        					<small class="form-text text-danger">{{$message}}</small>
                        										   
                        				 @enderror
                                      
                                  
                                </div>
							</div>
                          <div class="form-group row">
                                
                                <div class="col-md-12">
                                   
                               <label>phone number </label>
                			<input type="number" class="form-control" name="phone" value="{{ $sc->phone }}" />
                				@error('phone')
                					<small class="form-text text-danger">{{$message}}</small>
                										   
                				 @enderror
                                  
                                  </div>
                                   </div>
                            <div class="form-group row">
                                
                                <div class="col-md-12">
                                  
                                	<label>  Add code to head  <b>Head</b> {   HTML - CSS - JS }</label>
                        			<textarea dir="ltr" class="form-control" rows="10" 
                        			name="head_code">{{ $sc->head_code }}</textarea>
                                  
                                   </div>



							          </div>
        					 <div class="form-group row">
                                    
                                    <div class="col-md-12">
                        			<label> Add code to footer <b>Footer</b> {HTML - CSS - JS }</label>
                        			<textarea dir="ltr" class="form-control" rows="10"
                        			name="footer_code">{{ $sc->footer_code }}</textarea>
                                      
                                       </div>
        
        				                </div>
						    <div class="form-group row" >
                                    
                                  <div class="col-md-12"  >
                        				<label>  { site logo}</label>

                        				<input type="file"  class="in1" name="site_logo" title="site logo ">
                        				<img  src="{{ url('/public/images/site/'.$sc->site_logo ) }}" alt="Image preview" width="100px"
                        				height='100px' >
                        					@error('site_logo')
                        					<small class="form-text text-danger">{{$message}}</small>
                        										   
                        				 @enderror
                                      
                                       </div>

								</div>
										
				                <div class="form-group row">
                                        
                                      <div class="col-md-12">
                            				<label>{site icon }</label>

                        				<input type="file"   name="site_icon" title="site icon ">
                        				<img src="{{ url('/public/images/site/'.$sc->site_icon) }}" alt="Image preview" width="100px"
                        				height='100px' >
                        					@error('site_icon')
                        					<small class="form-text text-danger">{{$message}}</small>
                        										   
                        				 @enderror
                                          
                                           </div>
   
									</div>
									<div class="form-group row">
                                        
                                      <div class="col-md-12">
                            		<label>show site image or logo </label>
                            			<select class="form-control" name="site_name_or_img">
                            
                            				<option value="@if( $sc->site_name_or_img == 'name' ) {{'name'}} @else {{'img'}} @endif">
                            					@if( $sc->site_name_or_img == 'name' ) {{'اسم الموقع'}} @else {{'لوجو الموقع'}} @endif
                            				</option>
                            
                            				<option value="@if( $sc->site_name_or_img == 'img' ) {{'name'}} @else {{'img'}} @endif">
                            					@if( $sc->site_name_or_img == 'img' ) {{'اسم الموقع'}} @else {{'لوجو الموقع'}} @endif
                            				</option>
                            				
                            			</select>
                                                                              
                                           </div>
   
									</div>
									<div class="form-group row">
                                                
                                              <div class="col-md-12">

                                    			<label>facebook link</label>
                        		 	<input dir="ltr" type="text" class="form-control" name="facebook" value="{{ $sc->facebook }}" />
		                                                                   
                                                   </div>
											</div>
										<div class="form-group row">
                                                
                                              <div class="col-md-12">
                                    	     	<label>twitter link </label>
                                        			<input dir="ltr" type="text" class="form-control"
                                        			name="twitter" value="{{ $sc->twitter }}" />
											</div>
											</div>
		                         	<div class="form-group row">
                                                
                                              <div class="col-md-9">
                                    	     	<label>google instgram  </label>
                                        			<input dir="ltr" type="text" class="form-control"
                                        			name="instagram" value="{{ $sc->instagram }}" />
											</div>
											</div>
									<div class="form-group row">
                                                
                                              <div class="col-md-12">
		                                    	<label>  google plus link</label>
                                    			<input dir="ltr" type="text" class="form-control" 
                                    			name="google" value="{{ $sc->google_plus }}" />
											</div>
										</div>
											<div class="form-group row">
										
												<div class="col-md-9">
													<button type="submit" class="btn btn-primary">
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


@section('script')
	<script>
		function previewFile(calss, input) {
		  var preview = document.querySelector(calss);
		  var file    = document.querySelector(input).files[0];
		  var reader  = new FileReader();

		  reader.onloadend = function () {
		    preview.src = reader.result;
		  }

		  if (file) {
		    reader.readAsDataURL(file);
		  } else {
		    preview.src = "";
		  }
		}
	</script>
