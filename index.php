<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>密码站 - 数据检索系统（免费版）</title>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
 <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script>
        $(function(){
            $("button").click(function(){
                var inputVal = $("#keywords").val();
                $.ajax({
                    type:"GET",
                    url:"search.php?keywords=" + inputVal,
                    dataType:"json",
                    success:function(data){
                        $(function(){
                            var con="";
                            $.each(data,function(i,data){
                                if (data.result == "0") {
                                    con+="<p>请输入关键词</p>"
                                }else if(data.result == "1"){
                                    con+="<p>无结果</p>"                               
                                }else if(data.result == "3"){
                                	con+="请先登陆！"
                                }
                                else{
                                    con+="<p>"+data.email+"&nbsp&nbsp&nbsp"+data.name+"&nbsp&nbsp&nbsp"+data.password+"&nbsp&nbsp&nbsp"+data.cardid+"&nbsp&nbsp&nbsp"+data.phone+"</p>"
                                }
                            });
                                console.log(con);
                                $("#search_result").html(con);
                        })
                        return false; 
                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
    	function InputCheck(LoginForm)
{
  if (LoginForm.username.value == "")
  {
    alert("请输入用户名!");
    LoginForm.username.focus();
    return (false);
  }
  if (LoginForm.password.value == "")
  {
    alert("请输入密码!");
    LoginForm.password.focus();
    return (false);
  }
}
    </script>
</head>
<body>
<div class="temp-popup-form-wrapper">
<nav class="navbar navbar-inverse temp-custom-navigation">
  <div class="container-fluid">
    <div class="navbar-header temp-custom-logo-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">密码站 - 数据检索系统（免费版）</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right temp-custom-list-items">
      	<?php
       if(!isset($_SESSION['username'])){
         echo '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#RegistrationModal">注册</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#LogInModal">登录</a></li>';
        }else{
	    $username = $_SESSION['username'];
         echo '<li class="nav-item"><a class="nav-link" href="admin/admin.php" target="_blank">Welcome:'.$username.'</a></li>';
         }
        ?>
        <li class="nav-item"><a class="nav-link" href="http://www.mimaz.org/contact.html" target="_blank">联系</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#PaymentModal">赞助</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#ForgotModal">忘记密码</a></li>
      </ul>
    </div>
  </div>
</nav>
<section class="aui-content">
	<div style="height:2px;">	</div>
	<div class="aui-content-up">
		<form action="##" name="form1">
			<div class="aui-content-up-form">
				<h2>检索内容</h2>
			</div>
			<div class="aui-form-group clear">
				<label class="aui-label-control">
					账号 <em>*</em>
				</label>
				<div class="aui-form-input">
					<input type="text" class="aui-form-control-two" name="keywords" id="keywords" required id="1" placeholder="请输入账号" >
				</div>
			</div>
			
			<div class="aui-form-group-text">
				<h3>点击查询，结果将显示在下方</h3>
				<p><div id="search_result"></div></p>
			</div>

		
	</div>
	<div class="aui-btn-default">
		<button class="aui-btn aui-btn-account" name="button" type="button" id="btn">查询</button>
	</div>
	</form>
</section>
</div>
 <div class="modal fade" id="RegistrationModal" role="dialog">
  <div class="temp-custom-modal-wrap">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content temp-custom-modal-content">
        <button type="button" class="close temp-custom-close-button" data-dismiss="modal">&times;</button>
        <div class="modal-body temp-custom-modal-body">
          <div class="temp-login-form-wrapper">
            <div class="row custom-row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 temp-form-column-wrap-image">
                <div class="temp-reg-column-wrap-image">
                  <div class="temp-form-inner-wrapper">
                    <h2>注册</h2>
                    <p>您需要先注册，再登陆。</p>
                    <p class="temp-heading-for-icon temp-reg-para">第三方登录</p>
                    <div class="temp-anchor-wrap temp-reg-anchor-wrap">
                    	<a href="#" class="temp-anchor temp-icon-color text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-qq" aria-hidden="true"></i>
                        </span>
                        <span>qq登录(暂不支持)</span>
                     </a>
                     <a href="#" class="temp-anchor temp-icon-color text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-wechat" aria-hidden="true"></i>
                        </span>
                        <span>微信登录(暂不支持)</span>
                     </a></br>
                      <a href="#" class=" temp-anchor text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </span>
                        <span>facebook登录(暂不支持)</span>
                      </a>
                      <a href="#" class="temp-anchor temp-icon-color text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-google" aria-hidden="true"></i>
                        </span>
                        <span>google登录(暂不支持)</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="temp-form-column-wrap">
                  <h2>注册</h2>
                  <form action="reg.php" method="post">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <span class="temp-span-wrap temp-span-input-label-wrap">
                            <input  class="temp_input_field" type="text" name="myname">
                            <label class="temp_input_label">
                              <span class="temp_input_label-content">昵称</span>
                            </label>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <span class="temp-span-wrap temp-span-input-label-wrap">
                            <input class="temp_input_field" type="text" name="myemail">
                            <label class="temp_input_label">
                              <span class="temp_input_label-content">邮箱</span>
                            </label>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group">
                          <span class="temp-span-wrap temp-span-input-label-wrap">
                            <input class="temp_input_field" type="password" name="mypass">
                            <label class="temp_input_label">
                              <span class="temp_input_label-content">密码</span>
                            </label>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="form-group">
                          <span class="temp-span-wrap temp-span-input-label-wrap">
                            <input class="temp_input_field" type="password" name="mypass2">
                            <label class="temp_input_label">
                              <span class="temp_input_label-content">确认密码</span>
                            </label>
                          </span>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="temp-login-button-wrap">
                          <input class="btn btn-info temp-form-button" type="submit" name="regsubmit" value="注册" />
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<div class="modal fade" id="LogInModal" role="dialog">
  <div class="temp-custom-modal-wrap">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content temp-custom-modal-content">
        <button type="button" class="close temp-custom-close-button" data-dismiss="modal">&times;</button>
        <div class="modal-body temp-custom-modal-body">
          <div class="temp-login-form-wrapper">
            <div class="row custom-row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 temp-form-column-wrap-image">
                <div class="temp-login-column-wrap-image">
                  <div class="temp-form-inner-wrapper">
                   <h2>登陆</h2>
                    <p>您需要先注册，再登陆。</p>
                    <p class="temp-heading-for-icon temp-reg-para">第三方登录</p>
                    <div class="temp-anchor-wrap temp-reg-anchor-wrap">
                    	<a href="#" class="temp-anchor temp-icon-color text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-qq" aria-hidden="true"></i>
                        </span>
                        <span>qq登录(暂不支持)</span>
                     </a>
                     <a href="#" class="temp-anchor temp-icon-color text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-wechat" aria-hidden="true"></i>
                        </span>
                        <span>微信登录(暂不支持)</span>
                     </a></br>
                      <a href="#" class=" temp-anchor text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </span>
                        <span>facebook登录(暂不支持)</span>
                      </a>
                      <a href="#" class="temp-anchor temp-icon-color text-left">
                        <span class="temp-social-icon-wrap">
                          <i class="fa fa-google" aria-hidden="true"></i>
                        </span>
                        <span>google登录(暂不支持)</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="temp-form-column-wrap">
                  <h2>登录</h2>
                  <form action="login.php" method="post">
                    <div class="form-group">
                      <span class="temp-span-wrap temp-span-input-label-wrap">
                        <input class="temp_input_field" type="text" name="emaillogin">
                        <label class="temp_input_label">
                          <span class="temp_input_label-content">邮箱</span>
                        </label>
                      </span>
                    </div>
                    <div class="form-group">
                      <span class="temp-span-wrap temp-span-input-label-wrap">
                        <input class="temp_input_field" type="password" name="passwordlogin">
                        <label class="temp_input_label">
                          <span class="temp_input_label-content">密码</span>
                        </label>
                      </span>
                    </div>
                    <div class="form-group">
                      <label class="temp-checkbox-wrap">
                        <input name="signup_agree_checkbox" value="1" type="checkbox">
                        记住密码
                        <span class="checkmark"></span> 
                      </label>
                    </div>
                    <div class="temp-login-button-wrap">
                      <input class="btn btn-info temp-form-button" type="submit" name="loginsubmit" value="登录" />
                    </div>
                  </form>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="PaymentModal" role="dialog">
  <div class="temp-custom-modal-wrap">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content temp-custom-modal-content">
        <button type="button" class="close temp-custom-close-button" data-dismiss="modal">&times;</button>
        <div class="modal-body temp-custom-modal-body">
          <div class="temp-login-form-wrapper">
            <div class="row custom-row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 temp-form-column-wrap-image">
                <div class=" temp-payment-column-wrap-image">
                  <div class="temp-form-inner-wrapper">
                    <h2>赞助我们</h2>
                    <p>感谢您赞助密码站 - 社工安全系统</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="temp-form-column-wrap">
                  <h2>微信联系方式</h2>
                  <p>该系统仅供团队内部使用。</p>
                  <p>系统BUG反馈微信：</p>
                  <img src="http://www.mimaz.org/images/slice/wx.jpg" alt="background-image" class="img-responsive">
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ForgotModal" role="dialog">
  <div class="temp-custom-modal-wrap">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content temp-custom-modal-content">
        <button type="button" class="close temp-custom-close-button" data-dismiss="modal">&times;</button>
        <div class="modal-body temp-custom-modal-body">
          <div class="temp-login-form-wrapper">
            <div class="row custom-row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 temp-form-column-wrap-image">
                <div class=" temp-forget-password-column-wrap-image">
                  <div class="temp-form-inner-wrapper">
                    <h2>忘记密码?</h2>
                    <p>
                      请提供您注册时使用的用户名或电子邮件地址。我们会给你发一封电子邮件，允许你重设密码。
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="temp-form-column-wrap">
                  <h2>忘记密码?</h2>
                  <form>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <span class="temp-span-wrap temp-span-input-label-wrap">
                            <input  class="temp_input_field" type="text" >
                            <label class="temp_input_label">
                              <span class="temp_input_label-content">邮箱</span>
                            </label>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="temp-login-button-wrap">
                          <button class="btn btn-info temp-form-button" type="button">提交发送</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/form.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
</body>
</html>