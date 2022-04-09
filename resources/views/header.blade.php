<!-- login modal -->
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
	aria-hidden="true">
	<div class="form-w3ls">
	<div class="form-head-w3l">
		<h2>Welcome</h2>
	</div>

    <ul class="tab-group cl-effect-4">
        <li class="tab active"><a href="#signin-agile">Đăng Nhập</a></li>
		<li class="tab"><a href="#signup-agile">Đăng Ký</a></li>        
    </ul>
    <div class="tab-content">
        <div id="signin-agile">   
			<form action="{{url('user/login')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<p class="header">Email</p>
				<input type="email" name="Email" placeholder="Nhập email" required="required">
				
				<p class="header">Mật khẩu</p>
				<input type="password" name="Password" placeholder="Nhập mật khẩu"  required="required">
				<input type="submit" class="sign-in" value="Sign In">

				<div class="row">
					<div class="col-md-12 ">
					<a href="{{ url('auth/google') }}" class="btn btn-lg btn-danger btn-block" style="margin-top:10px">
					<strong>Login With Google</strong>
					</a> 
					</div>
				</div>
			</form> 
			<br><br><a href="{{url('user/forgetpassword')}}" style="color:#FFA803; font-weight: bold;">* Quên mật khẩu</a>
		</div>
		<div id="signup-agile">   
			<form action="{{url('user/signup')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				
				<p class="header">Họ và tên</p>
				<input type="text" name="name" placeholder="Nhập tên" required="required">
				
				<p class="header">Email </p>
				<input type="email" name="email" placeholder="Nhập Email"  required="required">
				
				<p class="header">Mật khẩu</p>
				<input type="password" name="password" placeholder="Nhập mật khẩu"  required="required">
				
				<p class="header">Nhập lại mật khẩu</p>
				<input type="password" name="cpassword" placeholder="Nhập lại mật khẩu"  required="required">
				
				<input type="submit" class="register" value="Sign up">
			</form>

		</div> 
    </div><!-- tab-content -->
</div>
</div> 
	
<!-- login modal -->
<div id="header">
		 <div class="topbar" id="home">
                <div class="container">
                    <div class="topbar-left">
                        <ul class="topbar-nav clearfix">
                            <li><span class="phone">0935 444 294</span></li>
                            <li><span class="email">sweetbakery@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="topbar-right">
                        <ul class="topbar-nav clearfix">
                        	
                            @if(Auth::user())
                            	@if(Auth::user()->isAdmin())<li class="dropdown" style="cursor: pointer;"><a href="{{url('admin')}}"><i class="fa fa-gear fa-spin" style="color:black"></i>Page Admin</a></li>@endif
                            <li class="dropdown">
                                <a href="#" class="account dropdown-toggle" data-toggle="dropdown">My Account</a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a title="My Account" href="{{url('user/'.Auth::user()->id)}}">Profile</a></li>
                                    <li><a title="My Account" href="{{url('user/changePassword/'.Auth::user()->id)}}">Change Password</a></li>
                                    <li><a title="My Cart" href="{{url('user/previewCart')}}">My Order</a></li>  
                                    <li><a title="Testimonial" href="{{url('user/logout')}}">Log Out</a></li>
                                </ul>
                            </li>
                            @else 
                            <li><a href="#" class="login" data-toggle="modal" data-target="#myModal88">Login</a></li>
                            @endif
                            <li class="dropdown">
                                <a  class="currency dropdown-toggle" data-toggle="dropdown">VND</a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                   
                                    <li><a href="{{url('index')}}">US Dollar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="language dropdown-toggle" data-toggle="dropdown">Viet Nam</a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a > &nbsp;English</a></li>
                                    <li><a > &nbsp;Viet Nam</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.topbar -->
            @if(count($errors)>0)
				  	<div class="alert alert-danger">
				  		@foreach($errors->all() as $err)
				  			{{$err}}<br>
				  		@endforeach
				  	</div>
			@endif

		  	@if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {!! Session::get('flash_message') !!}
                    </div>
            @endif
            <div class="result-message">
            	@if(isset($_GET['flash_message']))
            		<div class="alert alert-warning">
            			Giỏ hàng của bạn đã trống
            		</div>
            	@endif
            </div>
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{url('index')}}" id="logo"><img src="source/image/product/logo.png" width="150px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
							<div class="header-middle">
								<form class="form-search" action="{{url('categories/search')}}" method="get">
									<div class="search">
										<input type="text" name="search_key" id="search" placeholder="Nhập tên bánh cần tìm">
									</div>
									<div class="section_room">
										<select onchange="change_country(this.value)" class="frm-field required" name="nameCategory" id="categoryId">
											@if(isset($categorySearch))
												<option value="{{$categorySearch->id}}">{{$categorySearch->name}}</option>
												@foreach($categories as $category)
													@if($category->id != $categorySearch->id)
													<option value="{{$category->id}}">{{$category->name}}</option> 
													@endif 
												@endforeach
											@else
												@foreach($categories as $category)
												<option value="{{$category->id}}">{{$category->name}}</option>     
												@endforeach
											@endif
										</select>
									</div>
									<div class="sear-sub">
										<button type="submit" class="btn btn-danger"><span class="fa fa-search"></span></button>
										<!-- <input type="submit" value="Search"> -->
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
							<div id="back_result"></div>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="totalQty">
							<div class="beta-select" ><i class="fa fa-shopping-cart"></i> Giỏ hàng ( 
								@if(Cart::count()>0 ) 
								{{Cart::count()}} 
								@else Trống 
								@endif )<i class="fa fa-chevron-down"></i></div>
							</div>
							<?php $content=Cart::Content() ?>
							@if(Cart::count()>0)
							<div id="block" style="display: block">	
							<div class="beta-dropdown cart-body">
								<div id="add-cart-item">
								@foreach($content as $item)
								
								<div class="cart-item"  >
									<div class="media"> 
										<a class="pull-left" href="#"><img src="source/image/product/{{$item->options->has('img')?$item->options->img:''}}" alt="" ></a>
										<div class="media-body">
											<input type="hidden" value="{{$item->rowId}}" id="rowId" >
											 <a><button type="button" class="remove-cart-item deleteCart" >&times;</button></a>
											<span class="cart-item-title">{{$item->name}}</span>
											<!-- <span class="cart-item-options">Size: XS; Colar: Navy</span> -->
											<span class="cart-item-amount">{{$item->qty}}*<span>{{number_format($item->price)}}</span></span>
										</div>
									</div>
								</div>
								
								@endforeach
								

								
								<div class="cart-caption" id="updateCart" >
									<div class="cart-total text-right"">Tổng tiền: <span class="cart-total-value">{{Cart::subtotal(0,'.',',')}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{url('cart')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								</div>
								
							</div>
							</div>
							@else
							<div id="block" >	
							<div class="beta-dropdown cart-body">
								<div id="add-cart-item">
								@foreach($content as $item)
								
								<div class="cart-item"  >
									<div class="media"> 
										<a class="pull-left" href="#"><img src="source/image/product/{{$item->options->has('img')?$item->options->img:''}}" alt="" ></a>
										<div class="media-body">
											<input type="hidden" value="{{$item->rowId}}" id="rowId" >
											 <a><button type="button" class="remove-cart-item deleteCart" >&times;</button></a>
											<span class="cart-item-title">{{$item->name}}</span>
											<!-- <span class="cart-item-options">Size: XS; Colar: Navy</span> -->
											<span class="cart-item-amount">{{$item->qty}}*<span>{{number_format($item->price)}}</span></span>
										</div>
									</div>
								</div>
								
								@endforeach
								

								
								<div class="cart-caption" id="updateCart" >
									<div class="cart-total text-right"">Tổng tiền: <span class="cart-total-value">{{Cart::subtotal(0,'.',',')}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{url('cart')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								</div>
								
							</div>
							</div>
							@endif
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #FFA803;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{url('index')}}">Trang chủ</a></li>
						<li><a>Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($categories as $categorie)
								<li><a href="{{url('categories/'.$categorie->id)}}">{{$categorie->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{url('contact')}}">Giới thiệu</a></li>
						<li><a href="contacts.html">Tin tức</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	<div class="clearfix"> </div>
