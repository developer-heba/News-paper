@extends('layouts.admin-template')
@section('title', 'Journalist ')

@section('breadcrumb')
	<span>Journalist </span>
@endsection

<div class="modal fade" id="addNew" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="verifyModalContent_title"> Add new Journalist</h4> 
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            	<form class="form-horizontal" enctype="multipart/form-data"  action="{{route('Journalist.store')}}" method="post">
											@csrf
											@method('post')
										
											<div class="form-group row">
												<label class="col-md-2 col-form-label">name</label>
												<div class="col-md-9">
													<input type="text" 
													name="name" class="form-control" >
													@error('name')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
															 @enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 col-form-label" for="logo">logo</label>
												<div class="col-md-9">
													<input type="file" id="logo" name="logo" class="form-control" placeholder="logo">
													@error('logo')
                  
													<small class="form-text text-danger">{{$message}}</small>
										   
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
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All journalists</li>
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
										<h4>journalists </h4>
											@error('name')
                              
                								<small  class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										   
                								
                								
                									    @enderror
                									    
                									    
                									    
                									 @error('logo')
                                
                								<small class="form-text alert alert-warning col-md-6">{{$message}}</small>
                										  
                									 @enderror
                								
                									 
                								
				<a class="badge badge-success"  style="margin-top:30px; color:#fff ;cursor:pointer;" data-toggle="modal" data-target="#addNew"  data-whatever="@mdo">Add New</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-t0 w-100 text-nowrap">
												<thead>
													<tr>
														<th class="wd-15p"> ID</th>
														<th class="wd-15p">Journalist Name</th>
														<th class="wd-15p">logo</th>
														<th class="wd-10p">Status</th>

                                                          <th class="wd-20p" >control </th>
													</tr>
												</thead>
												<tbody>
													@foreach ($journalists as $item)
													<tr>
														<td>{{$item->id}}</td>
														<td>{{$item->name}}</td>
													
													<td><img src="{{$item->logo}}" width="40"height="40"></td>
														<td>{{$item->getstatus()}}</td>
												
                                                      <!--  <td><div class="badge badge-success" >Insert</div></td> -->

                                                      <td class="center">
  
								 
                                        
                                        <a class="badge badge-info" width="35"  href="{{route('Journalist.edit',$item->id)}}">update
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									 <a class="badge badge-danger" width="35"  href="{{URL::to('/dashboard/Journalist/delete/'.$item->id)}}">delete
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