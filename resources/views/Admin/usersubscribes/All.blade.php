@extends('layouts.admin-template')
@section('content')
@section('title', 'usersubscribes ')

@section('breadcrumb')
	<span>usersubscribes </span>
	
@endsection

         
@section('content')

	<section class="section">
	    
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">usersubscribes</li>
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
										<h4>usersubscribes</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-t0 w-100 text-nowrap">
												<thead>
													<tr>
														<th class="wd-15p"> ID</th>
														<th class="wd-15p">subscribe Amount </th>
														<th class="wd-10p">user</th>
										              	<th class="wd-10p">valid date</th>
														<th class="wd-10p">controlers</th>
													</tr>
												</thead>
											
									
												
												<tbody>
													@foreach ($user_subscribe as $item)
													<tr>
														<td>{{$item->id}}</td>
														<td>{{$item->amount}}</td>
													   	<td>{{$item->user_id}}</td>
												     	<td>{{$item->validuntil}}</td>
													
												
                                                      <!--  <td><div class="badge badge-success" >Insert</div></td> -->

                                                      <td class="center">
  
								 
                                          <a class="badge badge-info" width="35"  href="{{route('usersubscribe.edit',$item->id)}}">update
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
       
                                        <a class="badge badge-danger" width="35"  href="{{URL::to('dashboard/users/subscribe/delete/'.$item->id)}}">delete
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