<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"/var/www/movie/application/index/view/index/selectshow.html";i:1519453941;s:53:"/var/www/movie/application/index/view/index/base.html";i:1519453941;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>全球影视社区，在线购票</title>
<link href="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/jquery.min.js"></script>
<script src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.useso.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript" src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/css/font-awesome.min.css" />
<script src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
                });
			   
</script>
<link rel="stylesheet" href="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/css/menu.css" />

<script type="text/javascript" src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($){ 
				$(".scroll").click(function(event)	{	
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
</head>
<body>
	<!-- header-section-starts -->
		
		<div class="header-top-strip" id="home">
			<div class="container">
				<div class="header-top-left">
					<p><a href="support.html">24/7 Customer Care</a> | <a class="play-icon popup-with-zoom-anim" href="#small-dialog" href="#"> Resend Booking Confirmation</a> </p>
				<div id="small-dialog" class="mfp-hide">
						<div class="select-city">
							<h3>Resend Confirmation</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
							<div class="confirmation">
							<form>
								<input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]2,4})?" title="Enter a valid email"/>
								<input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]1}\d{9}" title="Enter a valid mobile number" />
								<input type="submit" value="SEND">
							</form>
						</div>
							<div class="clearfix"></div>
						</div>
					</div>	
				</div>
				<div class="header-top-right">
				<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- Button trigger modal  -->
	<a class="play-icon popup-with-zoom-anim" href="#small-dialog1">Select a Region</a>
	<!---pop-up-box---->  
					<link href="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!---//pop-up-box---->
				

                     <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>

    <?php if(\think\Session::get('login_nick') != ''): ?>

            <button class="btn btn-primary"  data-toggle="modal"><?php echo \think\Session::get('login_nick'); ?></button>

            <button class="btn btn-primary" onclick="alert('开发中...')"  data-toggle="modal">登出</button>


    <?php else: ?>

<button class="btn btn-primary" id="loginbtn" data-toggle="modal" data-target="#loginmodal">Login</button>


    <?php endif; ?>
				<!-- Large modal -->



<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    登录/注册</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">登录</a></li>
                            <li><a href="#Registration" data-toggle="tab">注册</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal" id="loginform">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        邮箱</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="loginemail" class="form-control" id="email1" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="loginpassword" class="form-control" id="exampleInputPassword1" placeholder="password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="button" onclick="login()" class="btn btn-primary btn-sm">
                                            登录</button>
                                        <a href="javascript:;">Forgot your password?</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal" id="registerform">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select class="form-control" name="sex">
                                                    <option value="1">男士</option>
                                                    <option value="2">女士</option>
                                                    <option value="3">其他</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nickname" placeholder="Name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        邮箱</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        手机号码</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="phone" class="form-control" id="mobile" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="button" onclick="register()" class="btn btn-primary btn-sm">
                                            注册</button>
                                        <button type="button" onclick="$('#loginmodal').modal('hide')" class="btn btn-default btn-sm">
                                            取消</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            哈</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3 class="other-nw">
                                    佳佳影视</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-primary">祝您</a> <a href="#" class="btn btn-danger">
                                        开心</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function register(){
	$.post("<?php echo $webserver; ?>Index/index/register",$("#registerform").serialize(),function(data){
		
	if(data.code === 1)

		alert("register success");
	}
,'JSON');	
}


function login(){

	var mail = $("input[name='loginemail']").val();
	var password = $("input[name='loginpassword']").val();
	if(mail===null || password === null){
		alert('请填写邮箱及密码');
		return false;
	}
	$.post("<?php echo $webserver; ?>Index/index/login",{'email':mail,'password':password},function(data){

			if(data.code === 1){
				$("#loginmodal").modal('hide');
				$("#loginbtn").attr('data-target','');
				$("#loginbtn").html(data.nickname);
				alert('登陆成功');
			}else{
				alert('密码错误');
            }

        }
		
    ,'JSON');


}
</script>
</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="container">
		  <div class="main-content">
			<div class="header">
				<div class="logo">
					<a href="index.html"><h1>全球影视社区</h1></a>
				</div>
				<div class="search">
					<div class="search2">
					  <form>
						<i class="fa fa-search"></i>
						 <input type="text" value="Search for a movie, play, event, sport or more" onfocus="this.value = '';" onblur="if (this.value == '') this.value = 'Search for a movie, play, event, sport or more';}"/>
					  </form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
	<div class="bootstrap_container">
            <nav class="navbar navbar-default w3_megamenu" role="navigation">
                <div class="navbar-header">
          			<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.html" class="navbar-brand"><i class="fa fa-home"></i></a>
				</div><!-- end navbar-header -->
        
            <div id="defaultmenu" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">主页</a></li>	
                    <!-- Mega Menu -->
					<li class="dropdown w3_megamenu-fw"><a href="movies.html" data-toggle="dropdown" class="dropdown-toggle">影视</a>
                    </li>


					<li class="dropdown w3_megamenu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Events<b class="caret"></b></a>
                        <ul class="dropdown-menu half">
                            <li class="w3_megamenu-content withdesc">
                                <div class="row">
					<h5 class="movies-page">for events page - <a href="events.html">Click here</a> </h5>
								<h3 class="title">Featured Events</h3>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="events.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f2.jpg" alt="" /></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="events.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f3.jpg" alt=""></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="events.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f4.jpg" alt="" /></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="events.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f1.jpg" alt="" /></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
					</li>


					<li class="dropdown w3_megamenu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">在线视频<b class="caret"></b></a>
                        <ul class="dropdown-menu half3">
                            <li class="w3_megamenu-content withoutdesc">
                                <div class="row">
								<h5 class="movies-page">for plays page - <a href="plays.html">Click here</a> </h5>
								<h3 class="title">Featured Events</h3>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="plays.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f2.jpg" alt="" /></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="plays.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f3.jpg" alt=""></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="plays.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f4.jpg" alt="" /></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                    <div class="col-sm-3">
                                    	<div class="e-movie">
								<div class="e-movie-img">
									<a href="plays.html"><img src="<?php echo \think\Config::get('WEBSERVER'); ?>/public/film/images/f1.jpg" alt="" /></a>
								</div>
								<div class="e-buy-tickets">
									<a href="event-payment.html">BUY TICKETS</a>
								</div>
							</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
					</li>
					<li class="dropdown"><a href="<?php echo url('index/index/blog'); ?>">博客</a>
					
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages<b class="caret"></b></a>
							 <ul class="dropdown-menu" role="menu">

	<li><a href="about.html">About</a></li>
	<li><a href="blog.html">Blog</a></li>
	<li><a href="404.html">404</a></li>
	<li><a href="contact.html">Contact us</a></li>
	<li><a href="faq.html">FAQs</a></li>
	<li><a href="about.html">Current Openings</a></li>
                            <li class="dropdown-submenu">
                                <a href="#">News</a>
								<ul class="dropdown-menu">
																	<li><a href="press.html">Press Release</a></li>
	<li><a href="public-relations.html">Public Relations</a></li>
	<li><a href="press.html">Press Coverage</a></li>
								</ul><!-- end dropdown-menu -->
                            </li><!-- end dropdown-submenu -->
                        </ul>
                       <!-- end dropdown-menu -->
					</li><!-- end standard drop down -->
					<!-- end dropdown w3_megamenu-fw -->
                </ul><!-- end nav navbar-nav -->
                
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">联系我们<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form id="contact1" action="#" name="contactform" method="post">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" name="name" id="name1" class="form-control" placeholder="Name"> 
                                        <input type="text" name="email" id="email1" class="form-control" placeholder="Email"> 
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" name="phone" id="phone1" class="form-control" placeholder="Phone">
                                        <input type="text" name="subject" id="subject1" class="form-control" placeholder="Subject"> 
                                    </div>                 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea class="form-control" name="comments" id="comments1" rows="6" placeholder="Your Message ..."></textarea>
                                    </div>   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="pull-right">
                                            <input type="submit" value="SEND" id="submit1" class="btn btn-primary small">
                                        </div>  
                                    </div>
									<div class="clearfix"></div>  
                                </form>
                            </li>
                        </ul>
					</li>
				</ul><!-- end nav navbar-nav navbar-right -->
			</div><!-- end #navbar-collapse-1 -->
            
			</nav><!-- end navbar navbar-default w3_megamenu -->
		</div><!-- end container -->
    
<!-- AddThis Smart Layers END -->







	

<!-- AddThis Smart Layers END -->
	<div class="m-tickets-instantly">
		<h4>Book tickets instantly</h4>
		<div class="fleft m-select">
                        <label><input id="rdbMovie" name="rdbMovieSearch" type="radio" class="checkins" onclick="fnOcCriteria('ET', 'MT');" checked="checked">
                        <span class="fleft mr20">Movies</span></label>
                        <label><input id="rdbCinema" name="rdbMovieSearch" type="radio" class="checkins" onclick="fnOcCriteria('VN', 'MT');" checked="checked">
                        <span class="fleft mr20">Cinemas</span></label>
                    </div>
		<div class="m-select-movie">
					<select class="list_of_movies"><option value="">Select Movie</option><optgroup label="Telugu"><option style="padding-left: 10px;" value="ANAN">Asura (U/A)</option><option style="padding-left: 10px;" value="CHDM">Jurassic World (2D Telugu) (U/A)</option><option style="padding-left: 10px;" value="GUDR">Jurassic World (3D Telugu) (U/A)</option><option style="padding-left: 10px;" value="GUNT">Jyothi Lakshmi (U/A)</option><option style="padding-left: 10px;" value="JANG">Kerintha (U)</option><option style="padding-left: 10px;" value="KAKI">Krishnamma Kalipindi Iddarini (U/A)</option><option style="padding-left: 10px;" value="KURN">Lava Kusa (A)</option><option style="padding-left: 10px;" value="MART">Pandaga Chesko (U/A)</option><option style="padding-left: 10px;" value="PRVT">Tippu (A)</option><option style="padding-left: 10px;" value="RAJA">Vinavayya Ramayya (U/A)</option></optgroup><optgroup label="Hindi"><option style="padding-left: 10px;" value="TAWA">ABCD 2 (3D) (U)</option><option style="padding-left: 10px;" value="ZIRO">ABCD 2 (2D) (U)</option></optgroup><optgroup label="English"><option style="padding-left: 10px;" value="DIB">Jurassic World (3D) (U/A)</option><option style="padding-left: 10px;" value="GUW">Guwahati</option></optgroup></select>
                    </div>
		<div class="m-select-date">
					<select class="list_of_movies"><option value="">Select Date</option><option style="padding-left: 10px;" value="ANAN">Today, 18 jun</option><option style="padding-left: 10px;" value="CHDM">Tomorrow, 19 jun</option><option style="padding-left: 10px;" value="CHDM">saturday, 20 jun</option><option style="padding-left: 10px;" value="CHDM">sunday, 21 jun</option></select>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="now-showing-list">
		<div class="col-md-4 movies-by-category movie-booking">
			<h5><?php echo $film[0]['title']; ?></h5>
			<div class="movie-ticket-book">
					<div class="clearfix"></div>
					<img src="images/movie-show.jpg" alt="" />
					<div class="bahubali-details">
						<h4>Release Date:</h4>
						<p><?php echo date("M d,Y",$film[0]['publishtime']); ?></p>
						<h4>Duration:</h4>
						<p>2 hrs 30 mins</p>
						<h4>Director:</h4>
						<p><?php echo $film[0]['director']; ?></p>
						<h4>Language:</h4>
						<p>Telugu</p>
						<h4>Genre:</h4>
						<p>Action, Romance</p>
						<h4>Cast & Crew:</h4>
						<p>Prabhas as Amarendra Baahubali and Shivudu, Rana Daggubati as Bhallala Deva in Telugu and Palvaalthevan in Tamil, Anushka Shetty as Devasena, Tamannaah as Avantika, Sathyaraj as Kattappa, Nassar as Bijjala Deva in Telugu and Pingala Devan in Tamil, Ramya Krishnan as Sivagami</p>
					</div>
				</div>
			</div>
		<div class="col-md-8 movies-dates">	

			<?php if(is_array($moviedates) || $moviedates instanceof \think\Collection || $moviedates instanceof \think\Paginator): if( count($moviedates)==0 ) : echo "" ;else: foreach($moviedates as $key=>$da): ?>
			<div class="movie-date-selection">
				<ul>
					<li class="location">
						<a href="pic-a-movie.html"><i class="fa fa-map-marker"></i><?php echo $da['name']; ?>: <?php echo $da['address']; ?></a>
					</li>
					<?php if(is_array($da['time']) || $da['time'] instanceof \think\Collection || $da['time'] instanceof \think\Paginator): if( count($da['time'])==0 ) : echo "" ;else: foreach($da['time'] as $key=>$v): ?>
					<li class="time">
						<a href="<?php echo url('Index/index/payment',array('cid'=>$da['cinemaid'],'vid'=>$film[0]['id'],'time'=>$v,'tid'=>$da['id'])); ?>"><?php echo $v; ?></a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
	
				</ul>
			</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
		<div class="clearfix"></div>
	</div>
	







		</div>
		<div class="footer">
			<div class="col-md-3 footer-left">
				<div class="f-mov-list">
					<h4>Latest Movies</h4>
					<ul>
						<li><a href="now-showing.html">Now Showing</a></li>
						<li><a href="comming-soon.html">Coming Soon</a></li>
						<li><a href="celebrities.html">Movie Celebrities</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="f-mov-list">
					<h4>Movie Reviews</h4>
					<ul>
						<li><a href="404.html" target="target_blank">Entertainment News</a></li>
						<li><a href="blog.html" target="target_blank">Rajeev Masand</a></li>
						<li><a href="blog.html" target="target_blank">Film Reviews</a></li>
						<li><a href="write-us.html" target="target_blank">Guest Blogging</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="f-mov-list">
					<h4>Movie Trailers</h4>
					<ul>
						<li><a href="trailers-now-showing.html">Now Showing</a></li>
						<li><a href="trailers-comming-soon.html">Coming Soon</a></li>						
					</ul>
					<div class="clearfix"></div>
				</div>
				</div>
			<div class="col-md-3 footer-left">
				<div class="f-mov-list">
					<h4>Cinemas & Regions</h4>
					<ul>
						<li><a href="regions.html">All Regions</a></li>
						<li><a href="cinema-chain.html">Cinema Chains</a></li>
						<li><a href="cinemas.html">Cinemas</a></li>						
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="f-mov-list">
					<h4>Movies by Language</h4>
					<ul>
						<li><a href="movies.html">Hindi</a></li>
						<li><a href="movies.html">English</a></li>
						<li><a href="movies.html">Marathi</a></li>
						<li><a href="movies.html">Bengali</a></li>
						<li><a href="movies.html">Tamil</a></li>
						<li><a href="movies.html">Telugu</a></li>
						<li><a href="movies.html">Malayalam</a></li>
						<li><a href="movies.html">Bhojpuri</a></li>
						<li><a href="movies.html">Kannada</a></li>					
					</ul>
					<div class="clearfix"></div>
				</div>
				</div>
			<div class="col-md-3 footer-left">
				<div class="f-mov-list">
					<h4>Exclusives</h4>
					<ul>
						<li><a href="donate.html">Book A Smile</a></li>
						<li><a href="vochers.html">Corporate Vouchers</a></li>
						<li><a href="gift-cards.html">Gift Cards</a></li>
					</ul>
					<div class="clearfix"></div>					
				</div>	
				<div class="f-mov-list">
					<h4>Help</h4>
					<ul>
						<li><a href="site-map.html">Sitemap</a></li>
						<li><a href="feed-back.html">Feedback</a></li>
						<li><a href="faq.html">FAQs</a></li>
						<li><a href="terms-and-conditions.html">Terms and Conditions</a></li>
						<li><a href="privacy-policy.html">Privacy Policy</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>			
			</div>
			<div class="col-md-3 footer-left">
				<div class="f-mov-list">
					<h4>Movies by Genre</h4>
					<ul>
						<li><a href="movies.html">Action</a></li>
						<li><a href="movies.html">Romance</a></li>
						<li><a href="movies.html">Comedy</a></li>
						<li><a href="movies.html">Adult</a></li>
						<li><a href="movies.html">Adventure</a></li>
						<li><a href="movies.html">Classic</a></li>
						<li><a href="movies.html">Crime</a></li>
						<li><a href="movies.html">Drama</a></li>
						<li><a href="movies.html">Family </a></li>
						<li><a href="movies.html">Fantasy</a></li>
						<li><a href="movies.html">Musical</a></li>
						<li><a href="movies.html">Mystery</a></li>
						<li><a href="movies.html">Suspense</a></li>
						<li><a href="movies.html">Thriller</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12">
			<div class="footer-right">
				<div class="follow-us">
					<h5 class="f-head">Follow us</h5>
					<ul class="social-icons">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="subscribe">
					<h5 class="f-head">Subscribe to our newsletters</h5>
					<input type="text" class="text" value="Enter Email ID" onfocus="this.value = '';" onblur="if (this.value == 'Enter email...') this.value = 'Enter Email ID';}">
					<input type="submit" value="submit">
					<div class="clearfix"></div>
				</div>
				<div class="recent_24by7">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog" href="#"><i class="fa fa-calendar-o"></i>Resend Booking Confirmation</a>
					<a href="support.html"><i class="fa fa-question"></i>24/7 Customer Care</a>
				</div>
					<div class="clearfix"></div>
			</div>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
			<div class="copy-rights text-center">
				<p>Copyright &copy; 2015.佳佳影视社区 All rights reserved.More infomation <a href="<?php echo \think\Config::get('WEBSERVER'); ?>" target="_blank">sw ltd</a></p>
			</div>
	</div>
 <script type="text/javascript">
						$(document).ready(function() 
							/*
							var defaults = 
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop( easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
