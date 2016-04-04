<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>{{ app_name }} - Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="{{ assets_path }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ assets_path }}/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
  <link href="{{ assets_path }}/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="{{ assets_path }}/css/style.css" rel="stylesheet" />
  <link href="{{ assets_path }}/css/style-responsive.css" rel="stylesheet" />
  <link href="{{ assets_path }}/css/themes/default.css" rel="stylesheet" id="style_color" />
  <link href="{{ assets_path }}/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <link href="#" rel="stylesheet" id="style_metro" />
{% if css_links %}
  {{ css_links | raw }}
{% endif %}

  <script type="text/javascript" src="{{ assets_path }}/js/jq/jquery-1.3.2.min.js"></script>
  <script type="text/javascript" src="{{ assets_path }}/js/jq/jquery-ui-1.7.2.custom.min.js"></script>

  <base href="{{ base_path }}" />
  <link type="text/css" href="{{ assets_path }}/css/themes/{{ tema }}/jquery-ui-1.7.css" rel="stylesheet" />
  <script type="text/javascript" src="{{ assets_path }}/js/fungsi.js"></script>

{% if js_links %}
  {{ js_links | raw }}
{% endif %}

</head>
<body>
    <div id="logo" class="center">
        <img src="assets/img/logoc.png" alt="BMT" class="center" />
    </div>
  <div id="login">
  <p class="center"></p>
    <form>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span><input name="username" id="input-username" class="inp" type="text" placeholder="Username" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span><input name="password" id="input-password" class="inp" type="password" placeholder="Password" />
          </div>
        </div>
      </div>
      <div class="control-group remember-me">
        <div class="controls">
          <label class="checkbox">
          <input type="checkbox" name="remember" value="1"/> Remember me
          </label>
          <a href="javascript:;" class="pull-right" id="forget-password">Forgot Password?</a>
        </div>
      </div>
      <p class="infonya" style="width:150px;border:0;color:red;"></p>
      <input type="button" id="loginbtn" class="btn btn-block btn-inverse" value="Login" />
    </form>
    <form id="forgotform" class="form-vertical no-padding no-margin hide">
      <p class="center">Silahkan hubungi administrator.</p>
    </form>
  </div>

  <script src="{{ assets_path }}/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
  <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->  
  <script src="{{ assets_path }}/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>    
  <script src="{{ assets_path }}/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!--[if lt IE 9]>
  <script src="assets/plugins/excanvas.js"></script>
  <script src="assets/plugins/respond.js"></script> 
  <![endif]-->  
  <script src="{{ assets_path }}/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>  
  <script src="{{ assets_path }}/plugins/jquery.blockui.js" type="text/javascript"></script> 
  <script src="{{ assets_path }}/plugins/jquery.cookie.js" type="text/javascript"></script>
  <script src="{{ assets_path }}/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>  
  <script src="{{ assets_path }}/scripts/app.js"></script>
  <script src="{{ assets_path }}/scripts/login.js"></script> 
  <script>
    jQuery(document).ready(function() {     
      // initiate layout and plugins
      App.init();
      Login.init();
    });
  </script>

</body>
</html>
