<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin panel  </title>

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


           <!-- tosatr cs file-->
        <link rel="stylesheet" type="text/css" href="{{ asset('Backend/css/toastr.min.css') }}">  

   <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />   -->
     
  


	</head>

	<body class="bg-light">
		<div id="app" class="page">
			<section class="section section-2">
                <div class="container">
					<div class="row">
						<div class="single-page single-pageimage construction-bg cover-image " data-image-src="assets/img/weather1.jpeg">
							<div class="row">
							    <div class="col-lg-6 col-xl-6">
									<div class="mt-xl-5">
										<div class="bg-transparent carouselTestimonial1 p-4 mx-auto mt-xl-5 mb-3 w-600">
										
												<div class="carousel-inner">
													<div class="carousel-item text-center active">
														<img src="{{asset('Backend/img/brand/logo-white.png')}}" class="mb-2  mt-lg-0 " alt="logo">
														<p class="m-0 pt-2 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>
													</div>
													
												

											</div>
									    </div>
									</div>
								</div>
								<div class="col-lg-6 col-xl-6">
									<div class="login-sec">
										<div class=" text-center card mb-0">
											<form id="login" class="card-body" tabindex="500" action="{{URL('dashboard/save')}}" method="post">
                                            {{ csrf_field() }}
					                  	<fieldset>
                                                                        <h4 class="mb-3">Login</h4>
											

                                                    <div class="">
													<div class="form-group">
														<input  class="form-control @if($errors->has('nemail')) border-danger @endif"  name="nemail" placeholder="type the email ...">
                                                   
                                                                  <!-- error validations-->
										  @if($errors->has('nemail')) 
                                            <span style="color:red">
                                            <!--    <input class="text-danger" > --> <small> {{ $errors->first('nemail') }} </small>
                                            </span>
                                            @endif
                                                        
                                                    </div>
                                                    


													<div class="form-group">
														<input type="password" class="form-control @if($errors->has('npassword')) border-danger @endif"  name="npassword" placeholder="type Password ...">
                                                   
                                                                  <!-- error validations-->
										  @if($errors->has('npassword')) 
                                            <span style="color:red">
                                            <!--    <input class="text-danger" > --> <small> {{ $errors->first('npassword') }} </small>
                                            </span>
                                            @endif
                                                    
                                                    </div>
													
												</div>
                                                <div class="form-group text-center mt-5 mb-4">
                                        <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Login Now </button>
                                    </div>
												<p class="mb-2"><a href="forgot.html">Forgot Password</a></p>
											
										    </form>
											
									    </div>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</section>
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

		<script src="{{asset('Backend/js/moment.min.js')}}"></script>

		<!--mCustomScrollbar js-->
		<script src="{{asset('Backend/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!--Sidemenu js-->
		<script src="{{asset('Backend/plugins/toggle-menu/sidemenu.js')}}"></script>

		<!--Scripts js-->
    <!--    <script src="{{asset('Backend/js/scripts.js')}}"></script>   -->



           <!--   toastr message alert (toastr file js) -->
       <script src="{{asset('Backend/js/toastr.min.js') }}"></script>  
        
    <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>  -->

   
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