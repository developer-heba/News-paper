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
								<form class="form-horizontal" enctype="multipart/form-data"  action="{{ url('dashboard/settings/store')}}" method="post">
											{{ csrf_field() }}
											@method('POST')
										
					    <div class="form-group row">
						
							<div class="col-md-12">
					
                				<label> site name </label>
                		<input type="text" class="form-control" name="name" value="{{ old('name') }}"  />
        					     		</div>
                                    </div>
                                            
							<div class="form-group row">
							 	 <div class="col-md-12">
                                                                      
                    			<label> descrition site for Google search engine</label>
                    		<textarea class="form-control" rows="4" name="desc">{{ old('desc') }}</textarea>
                    			
                                                </div> 
                               
                               
                            </div>
                            <div class="form-group row">
                           
                                
                                <div class="col-md-12">
                                   
                                    <label>Email </label>
		                 	<input type="email" class="form-control"  name="email" value="{{ old('email') }}"  />

                                </div>
							</div>
                          <div class="form-group row">
                                
                                <div class="col-md-12">
                                   
                               <label>phone number </label>
                               <input type="number" class="form-control"  name="phone" value="{{ old('phone') }}"   />
                                  
                                  </div>
                                   </div>
                            <div class="form-group row">
                                
                                <div class="col-md-12">
                                  
                                	<label>  Add code to head  <b>Head</b> {   HTML - CSS - JS }</label>
                        		<textarea class="form-control" dir="ltr" rows="10" name="footer_code">{{ old('footer_code') }}</textarea>

                                  
                                   </div>



							          </div>
        					 <div class="form-group row">
                                    
                                    <div class="col-md-12">
                        			<label> Add code to footer <b>Footer</b> {HTML - CSS - JS }</label>
                        			<textarea dir="ltr" class="form-control" rows="10"
                        			name="footer_code"></textarea>
                                      
                                       </div>
        
        				                </div>
						    <div class="form-group row" >
                                    
                                  <div class="col-md-12"  >
                        				<label>  { site logo}</label>

                                 	<input type="file"  onchange="previewFile('.img1', '.in1')" class="in1" name="site_logo" title="لوجو الموقع">
 
                                      
                                       </div>

								</div>
										
				                <div class="form-group row">
                                        
                                      <div class="col-md-12">
                            				<label>{site icon }</label>

                         		  <input type="file" required onchange="previewFile('.img2', '.in2')" class="in2" name="site_icon" title="ايكون الموقع">

                                          
                                           </div>
   
									</div>
									<div class="form-group row">
                                        
                                      <div class="col-md-12">
                            		<label>show site image or logo </label>
                                  	<select class="form-control" name="site_name_or_img">
                            				<option value="name">site name </option>
                            				<option value="img">site logo </option>
                            			</select>
                                                                              
                                           </div>
   
									</div>
									<div class="form-group row">
                                                
                                              <div class="col-md-12">

                                    			<label>facebook link</label>
		                                    	<input dir="ltr" type="text" class="form-control" name="facebook" value="{{ old('facebook') }}" />
		                                                                   
                                                   </div>
											</div>
										<div class="form-group row">
                                                
                                              <div class="col-md-12">
                                    	     	<label>twitter link </label>
                                        	<input dir="ltr" type="text" class="form-control" name="twitter" value="{{ old('twitter') }}" />

											</div>
											</div>
		                         	<div class="form-group row">
                                                
                                              <div class="col-md-12">
                                    	     	<label>google instgram  </label>
                                        	<input dir="ltr" type="text" class="form-control" name="instagram" value="{{ old('instagram') }}" />

											</div>
											</div>
									<div class="form-group row">
                                                
                                              <div class="col-md-12">
		                                    	<label>  google plus link</label>
                                	<input dir="ltr" type="text" class="form-control" name="google" value="{{ old('google') }}" />

											</div>
										</div>
											<div class="form-group row">
										
												<div class="col-md-12">
													<button type="submit" class="btn btn-primary">
														<i class="la la-check-square-o"></i> Save
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
