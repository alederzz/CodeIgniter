<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $titulo; ?></title>
        
        <!-- Vendor CSS -->
        <link href="vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vendors/socicon/socicon.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="<?php echo base_url('')?>css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url('')?>css/app.min.2.css" rel="stylesheet">
    </head>
    
    <body class="login-content">
        <!-- Login -->
         
            <div class="lc-block toggled" id="l-login">
                <div id="status"></div>
                <form id="loginform" class="form-horizontal" role="form">
                <?php echo $this->session->flashdata('mensaje'); ?>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="md md-person"></i></span>
                    <div class="fg-line">
                        <input id="inputUser" type="text" class="form-control" name="user" placeholder="Nombre de Usuario">
                    </div>
                </div>
                
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                    <div class="fg-line">
                        <input id="inputPassword" type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        <i class="input-helper"></i>
                        No cerrar sesion
                    </label>
                </div>
                
                <a class="btn btn-login btn-danger btn-float" href=""><i class="md md-arrow-forward"></i></a>
                
                <ul class="login-navigation">
                    <li data-block="#l-register" class="bgm-red">Registrate</li>
                    <li data-block="#l-forget-password" class="bgm-orange">Olvidaste la Contraseña?</li>
                </ul>
            </form>
            </div>
        <!-- Register -->
        <div class="lc-block" id="l-register">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Nombre de Usuario">
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-mail"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Dirección de Email">
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Accept the license agreement
                </label>
            </div>
            
            <a href="" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></a>
            
            <ul class="login-navigation">
                <li data-block="#l-login" class="bgm-green">Login</li>
                <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
            </ul>
        </div>
        
        <!-- Forgot Password -->
        <div class="lc-block" id="l-forget-password">
            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-email"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
            </div>
            
            <a href="" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></a>
            
            <ul class="login-navigation">
                <li data-block="#l-login" class="bgm-green">Login</li>
                <li data-block="#l-register" class="bgm-red">Register</li>
            </ul>
        </div>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">IE SUCKS!</h1>
                <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser <br/>in order to access the maximum functionality of this website. </p>
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="img/browsers/chrome.png" alt="">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="img/browsers/firefox.png" alt="">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="img/browsers/safari.png" alt="">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                            <div>IE (New)</div>
                        </a>
                    </li>
                </ul>
                <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
            </div>   
        <![endif]-->
        
        <!-- Javascript Libraries -->
        <script src="<?php echo base_url('')?>js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo base_url('')?>js/bootstrap.min.js"></script>
        
        <script src="vendors/waves/waves.min.js"></script>
        
        <script src="<?php echo base_url('')?>js/functions.js"></script>
        <script>

        $(document).on("ready", function(){
            $(".btn-login").click(function(e){
                e.preventDefault();
                var usuario=$("#inputUser").val();
                var password=$("#inputPassword").val();

                        var parametros = {
                                "user" : usuario,
                                "password" : password
                        };
                        $.ajax({
                                data:  parametros,
                                url:   'ajax/login',
                                type:  'post',
                                beforeSend: function () {
                                        $("#status").html('<div class="alert alert-info"><i class="md md-spin md-rotate-right"></i> Comprobando Datos..</div>');
                                },
                                success:  function (response) {
                                        if(response === "TRUE"){
                                            function exito(){
                                            $("#status").html('<div class="alert alert-success"><i class="md md-check"></i> Estas Logueado</div>');
                                            }
                                            window.setTimeout(exito,600);
                                            function redireccion(){
                                                location.reload();
                                            }
                                            window.setTimeout(redireccion,1200);
                                        }else{
                                            if(response === "FALSE"){
                                                function error(){
                                                    $("#status").html('<div class="alert alert-danger">El usuario y la contraseña son incorrectos</div>');
                                                }
                                                window.setTimeout(error,600);
                                            }
                                        }
                                }
                        });

            });
        });
        </script>
        
    </body>
