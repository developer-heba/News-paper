<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title','dashboard') </title>

		<!--Favicon -->
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="{{asset('Backend/plugins/bootstrap/css/bootstrap.min.css')}}">

		<!--Icons css-->
		<link rel="stylesheet" href="{{asset('Backend/css/icons.css')}}">

		<!--Style css-->
		<link rel="stylesheet" href="{{asset('Backend/css/style.css')}}">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="{{asset('Backend/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="{{asset('Backend/plugins/toggle-menu/sidemenu.css')}}">

		<!--Morris css-->
		<link rel="stylesheet" href="{{asset('Backend/plugins/morris/morris.css')}}">


		<!--Chartist css-->
		<link rel="stylesheet" href="{{asset('Backend/plugins/chartist/chartist.css')}}">
		<link rel="stylesheet" href="{{asset('Backend/plugins/chartist/chartist-plugin-tooltip.css')}}">

		<!--Full calendar css-->
		<link rel="stylesheet" href="{{asset('Backend/plugins/fullcalendar/stylesheet1.css')}}">


		<!--DataTables css-->
		<link rel="stylesheet" href="{{asset('Backend/plugins/Datatable/css/dataTables.bootstrap4.css')}}">
        <!-- tosatr cs file-->
         <link rel="stylesheet" type="text/css" href="{{ asset('Backend/css/toastr.min.css') }}">  
	</head>

	<body class="app ">
		<div id="spinner"></div>
		<div id="app" class="page">
			<div class="main-wrapper page-main" >
				<nav class="navbar navbar-expand-lg main-navbar">
					<a class="header-brand" href="index.html">
						<img src="{{asset('Backend/img/brand/logo.png')}}" class="header-brand-img" alt="  Asta-Admin  logo">
					</a>
					<form class="form-inline mr-auto">
						<ul class="navbar-nav">
							<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa fa-navicon"></i></a></li>
							<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none navsearch"><i class="ion ion-search"></i></a></li>
						</ul>

						<div class="form-inline mr-auto horizontal" id="headerMenuCollapse">
							<div class=" d-none d-lg-block">
								<ul class="nav">
									<li class="nav-item with-sub">
										<a class="nav-link mr-0" href="{{URL::to('dashboard/settings')}}">
											<i class="fa fa-cog"></i>
											<span> Settings</span>
										</a>
										
									</li>
								
								</ul>
						    </div>
						</div>
					</form>

					<ul class="navbar-nav navbar-right ">
					    <li class=""><a href="#" class=" "></a>
							<form class="form-inline mr-auto">
								<div class="search-element">
									<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
									<button class="btn btn-primary" type="submit"><i class="ion ion-search"></i></button>
								</div>
						    </form>
						</li>
					  
				
						<li class="dropdown dropdown-list-toggle">
							<a href="#" class="nav-link nav-link-lg full-screen-link">
								<i class="fa fa-expand"  id="fullscreen-button"></i>
							</a>
						</li>
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
							<div class="d-sm-none d-lg-inline-block">

							<i class="halflings-icon white user"> {{Session::get('Name')}} </i> 
							
							
							</div></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="profile.html" class="dropdown-item has-icon">
									<i class="ion ion-android-person"></i> Profile
								</a>
								
								<a href="{{URL::to('dashboard/Logout')}}" class="dropdown-item has-icon">
									<i class="ion-ios-redo"></i> Logout
								</a>
							</div>
						</li>
					</ul>
                </nav>
           </div>
        </div>

        <aside class="app-sidebar">
					<div class="app-sidebar__user">
					 <!--   <div class="dropdown">-->
						<!--	<a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">-->
						<!--		<img alt="image" src="{{asset('Backend/img/avatar/avatar-1.jpeg')}}" class=" avatar-md rounded-circle">-->
						<!--		<span class="ml-2 d-lg-block">-->
						<!--			<span class="text-dark app-sidebar__user-name mt-5">Victorina</span><br>-->
						<!--			<span class="text-muted app-sidebar__user-name text-sm"> Web-Designer</span>-->
						<!--		</span>-->
						<!--	</a>-->
						<!--</div>-->
					</div>
					<ul class="side-menu">
					    	<li class="slide">
								    	<a class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">dashboard</span><i class=""></i></a>
								     </li>
						<li class="slide">
							<a class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Journalist</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
						
					
								<li><a class="slide-item" href="{{route('Journalist.index')}}"><span>All Journalist</span></a></li>
			
							</ul>
						</li>
							
						
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-tasks"></i><span class="side-menu__label">Magazin</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
							    		
								<li><a href="{{route('Magazine.index')}}" class="slide-item"> All Magazin</a></li>

							</ul>
						</li>
						<li class="slide">
						    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-paw">
						        
						    </i><span class="side-menu__label">Adds</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
									    		
								<li><a href="{{route('Adds.index')}}" class="slide-item"> All Adds</a></li>

							</ul>
						</li>
							<li class="slide">
						    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-users">
						        
						    </i><span class="side-menu__label">users</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
									    		
								<li><a href="{{route('users.index')}}" class="slide-item"> All users</a></li>
                                 	<li><a href="{{route('users.subscribe')}}" class="slide-item">users subscribes</a></li>
							</ul>
						</li>

					</ul>
				</aside>
      
               
                <div class="modal fade" id="addNewadds" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="verifyModalContent_title">   Add new add</h4> 
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">×</span></button>
                                            </div>
                                             <div class="modal-body">
                                            	<form class="form-horizontal" enctype="multipart/form-data"  action="{{route('Adds.store')}}" method="post">
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
                												<label class="col-md-2 col-form-label" for="file">image</label>
                												<div class="col-md-9">
                													<input type="file" id="image" name="image" class="form-control" placeholder="upload image">
                													@error('image')
                                  
                													<small class="form-text text-danger">{{$message}}</small>
                										   
                															 @enderror
                												</div>
                											</div>
                											             <div class="form-group row">
                                                                <label for="magazine"
                                                                class="col-md-2 col-form-label">magazine</label>
                                                                
                                                                <div class="col-md-9">
                                                                   
                                                                       <select name="magazine" id="magazine" class="form-control">
                                                                         @foreach($magazines  as $item)
                                                                        <option 
                                                                            value="{{$item->id}}">{{$item->title}}</option>
                                                                       
                                                                      @endforeach
                                                                    </select>
                                                                        @error("magazine")
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
                   <div class="app-content">
					<section class="section">
                    @yield('content')
                    </section>
                </div>    


                


                <footer class="main-footer">
					<div class="text-center">
						Copyright &copy;  <a href="http://semi-colen.com/"> Semi-colon </a>
					</div>
				</footer>

			</div>
		</div>

		<!--Jquery.min js-->
		<script src="{{asset('Backend/js/jquery.min.js')}}"></script>

		<!--popper js-->
		<script src="{{asset('Backend/js/popper.js')}}"></script> 

		<!--Tooltip js-->
		<script src="{{asset('Backend/js/tooltip.js')}}"></script>  

		<!--Bootstrap.min js-->
		<script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="{{asset('Backend/plugins/nicescroll/jquery.nicescroll.min.js')}}"></script>

		<!--Scroll-up-bar.min js-->
		<script src="{{asset('Backend/plugins/scroll-up-bar/dist/scroll-up-bar.min.js')}}"></script>

		<!--mCustomScrollbar js-->
		<script src="{{asset('Backend/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!--Sidemenu js-->
		<script src="{{asset('Backend/plugins/toggle-menu/sidemenu.js')}}"></script>

		<!--Chart.min js-->
		<script src="{{asset('Backend/js/chart.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('Backend/plugins/othercharts/jquery.knob.js')}}"></script>
		<script src="{{asset('Backend/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!--Morris js-->
		<script src="{{asset('Backend/plugins/morris/morris.min.js')}}"></script>
		<script src="{{asset('Backend/plugins/morris/raphael.min.js')}}"></script>

		<!--mCustomScrollbar js-->
		<script src="{{asset('Backend/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>


		<!--Jquery.knob js-->
		<script src="{{asset('Backend/plugins/othercharts/jquery.knob.js')}}"></script>

		<!--Jquery.sparkline js-->
		<script src="{{asset('Backend/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!--Min Calendar -->
		<script src="{{asset('Backend/plugins/fullcalendar/calendar.min.js')}}"></script>

		<!--Scripts js-->
		<script src="{{asset('Backend/js/apexcharts.js')}}"></script>
		<script src="{{asset('Backend/js/scripts.js')}}"></script>
		<script src="{{asset('Backend/js/dashboard.js')}}"></script>

		<!-- ECharts -->
		<script src="{{asset('Backend/plugins/echarts/echarts.js')}}"></script>  

		<!--OtherCharts js-->
		<script src="{{asset('Backend/js/othercharts.js')}}"></script>

		<!-- Chart.js -->
		<script src="{{asset('Backend/plugins/Chart.js/dist/Chart.bundle.js')}}"></script>


		<!--Morris js-->
		<script src="{{asset('Backend/plugins/morris/morris.min.js')}}"></script>
		<script src="{{asset('Backend/plugins/morris/raphael.min.js')}}"></script>


		<!--Scripts js-->
		<script src="{{asset('Backend/js/scripts.js')}}"></script>
		<script src="{{asset('Backend/js/dashboard4.js')}}"></script>




		<!--DataTables js-->
		<script src="{{asset('Backend/plugins/Datatable/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('Backend/plugins/Datatable/js/dataTables.bootstrap4.js')}}"></script>
		<script src="{{asset('assets/admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
		<script>
			$(function(e) {
				$('#example').DataTable();
			} );
		</script>

		
           <!--   toastr message alert (toastr file js) -->
		   <script src="{{asset('Backend/js/toastr.min.js') }}"></script>  



		   <script>
                
                
				@if(Session::has('MESSAGE'))
				  var type = "{{ Session::get('alert-type', 'error') }}";
				switch(type)
				{
				  case 'info':
				  toastr.info("{{ Session::get('MESSAGE') }}");
				  break;
			  
				  case 'warning':
				  toastr.warning("{{ Session::get('MESSAGE') }}");
				  break;
			  
				  case 'success':
				  toastr.success("{{ Session::get('MESSAGE') }}");
				  break;
			  
				  case 'error':
				  toastr.error("{{ Session::get('MESSAGE') }}");
				  break;
			   }
			  @endif 
			  
			  </script>







	</body>
</html>