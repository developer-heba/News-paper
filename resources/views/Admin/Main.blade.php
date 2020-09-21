@extends('layouts.admin-template')
@section('content')

		
<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Finance Dashboard</li>
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
							<div class="col-sm-12 col-lg-6 col-xl-3">
								<div class="card">
									<div class="card-body">
										<div class="card-value float-right text-purple">
											<span class="sparkline11 mt-2"></span>
										</div>
										<h3 class="mb-1 counter font-30 font-weight-bold">678</h3>
										<div class="text-muted">Total Income</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-xl-3">
								<div class="card">
									<div class="card-body">
										<div class="card-value float-right text-purple">
											<div class="sparkline_pie h-100" ></div>
										</div>
										<h3 class="mb-1  text-green font-30 font-weight-bold">$<span class="counter">56,755</span></h3>
										<div class="text-muted">Total Revenue</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-xl-3">
								<div class="card">
									<div class="card-body">
										<div class="card-value float-right text-purple">
											<div class="sparkline22 h-100" ></div>
										</div>
										<h3 class="mb-1  text-red counter font-30 font-weight-bold">567</h3>
										<div class="text-muted">Total Expenses</div>
									</div>

								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-xl-3">
								<div class="card">
									<div class="card-body">
										<div class="card-value float-right text-purple">
											<div class="sparkline_area h-100"></div>
										</div>
										<h3 class="mb-1  counter font-30 font-weight-bold">34.2%</h3>
										<div class="text-muted">Net Profit</div>
									</div>
									<div class="card-chart-bg">

									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class=" col-md-12 col-lg-12 col-xl-7">
								<div class="card">
								    <div class="card-header"><h4 class="">Revenue And Expenses</h4></div>
									<div class="card-body">
										<div class="row">
											<div class=" col-sm-4 pb-4 mb-2 text-center">
										        <h5 class="text-primary font-weight-bold">$143,346</h5>
												<span class="dot-label bg-primary"></span>Expenses
											</div><!-- col -->
											<div class=" col-sm-4 pb-4 mb-2 text-center">
											    <h5 class="text-success font-weight-bold">$167,346</h5>
												<span class="dot-label bg-success"></span>Revenue
											</div><!-- col -->
											<div class=" col-sm-4 pb-4 mb-2 text-center">
											    <h5 class="text-danger font-weight-bold">$167,346</h5>
												<span class="dot-label bg-danger"></span>Profit
											</div><!-- col -->
										</div>
										<div id="echart1" class="chartsh overflow-hidden "></div>
									</div>
								</div>
							</div>
							<div class=" col-md-12 col-lg-12 col-xl-5">
								<div class="row">
								    <div class="col-sm-12 col-lg-6 col-md-6 ">
										<div class="card">
											<div class="card-body p-3 text-center">

												<div class="mt-2">
													<h1 class="text-primary">0.35</h1>
													<p>Current Ratio</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 col-md-6 ">
										<div class="card">
											<div class="card-body p-3 text-center">
												<div class="mt-2">
													<h1 class="text-danger">1.45</h1>
													<p>Quick Ratio</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 col-md-6 ">
										<div class="card">
											<div class="card-body text-center mb-0 pb-0">
											    <h5 class="">Income Budget</h5>
												<div class="mt-3">
													<input type="text" class="knob" value="75" data-thickness="0.1" data-width="90" data-height="90" data-fgColor="#3454f5">
												    <p class="mb-0">Total Income</p>
												</div>
											</div>
											<ul class="list-items pt-2 card-body">
												<li class="p-2">
													<span class="list-label"></span>Budget
													<span class="list-items-percentage float-right font-weight-bold">4500,00</span>
												</li>
												<li class="p-2">
													<span class="list-label"></span>Balance
													<span class="list-items-percentage float-right font-weight-bold">-34,645</span>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 col-md-6 ">
										<div class="card">
											<div class="card-body text-center mb-0 pb-0">
											    <h5 class="">Expense Budget</h5>
												<div class="mt-3">
													<input type="text" class="knob" value="63" data-thickness="0.1" data-width="90" data-height="90" data-fgColor="#01cf6b">
												    <p class="mb-0">Total Expense</p>
												</div>
											</div>
											<ul class="list-items pt-2 card-body">
												<li class="p-2">
													<span class="list-label"></span>Budget
													<span class="list-items-percentage float-right font-weight-bold">5678,20</span>
												</li>
												<li class="p-2 mb-1">
													<span class="list-label"></span>Balance
													<span class="list-items-percentage float-right font-weight-bold">-24,835</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
					    </div>

						
						  

						<div class="row ">
							<div class="col-sm-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-header border-bottom-0">
										<h4>Social Activities</h4>
									</div>

									<div class="">
										<div class="table-responsive">
											<table class="table table-bordered table-hover  mb-0 text-nowrap">
												<thead>
													<tr>
														<th>#</th>
														<th>Campaign</th>
														<th>Client</th>
														<th>Budget</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Gmail</td>
														<td>Ryan MacLeod</td>
														<td>$12k</td>
														<td><span class="badge badge-success">Active</span></td>
													</tr>
													<tr>
														<td>2</td>
														<td>FaceBook</td>
														<td>Jacob Sutherland</td>
														<td>$16k</td>
														<td><span class="badge badge-primary">Running</span></td>
													</tr>
													<tr>
														<td>3</td>
														<td>Skype</td>
														<td>James Oliver</td>
														<td>$14k</td>
														<td><span class="badge badge-warning">Active</span></td>
													</tr>
													<tr>
														<td>4</td>
														<td>Twitter</td>
														<td>Lisa Nash</td>
														<td>$19k</td>
														<td><span class="badge badge-danger">Active</span></td>
													</tr>
													<tr>
														<td>5</td>
														<td>Youtube</td>
														<td>Alan Walsh</td>
														<td>$21k</td>
														<td><span class="badge badge-primary">Hold</span></td>
													</tr>
													<tr>
														<td>6</td>
														<td>Pinterest</td>
														<td>Pippa Mills</td>
														<td>$14k</td>
														<td><span class="badge badge-warning">Hold</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
				


				
@endsection                