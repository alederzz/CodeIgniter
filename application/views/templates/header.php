<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $titulo; ?></title>

        <!-- Vendor CSS -->
        <link href="<?php echo base_url();?>vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?php echo base_url();?>vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="<?php echo base_url();?>css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/app.min.2.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url("css/autocomplete-styles.css"); ?>">
        
    </head>
    <body>
        <header id="header">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="<?php echo base_url(); ?>">Sistema de Facturación</a>
                </li>
                
                <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                    <li id="top-search">
                        <a class="tm-search" href=""></a>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-settings" href=""></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li>
                                <a data-action="fullscreen" href="">Toggle Fullscreen</a>
                            </li>
                            <li>
                                <a data-action="clear-localstorage" href="">Clear Local Storage</a>
                            </li>
                            <li>
                                <a href="">Ver Perfil</a>
                            </li>
                            <li>
                                <a href="">Configuración</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("home/logout")?>">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>

                    </ul>
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div>
        </header>

        <!-- breadcrumb -->
        <?php if($segmentos > 0):
            echo $bread; ?>
        <?php endif; ?>
        <!-- ./ breadcrumb -->

        <section id="main">
            <aside id="sidebar">
                <div class="sidebar-inner">
                    <div class="si-inner">
                        <div class="profile-menu">
                            <a href="" style="">
                                <div class="profile-pic">
                                    <img src="<?php echo base_url(user_data('avatar'));?>" alt="">
                                </div>
                                
                                <div class="profile-info">
                                    <?php echo user_data('usuario'); ?>
                                </div>
                            </a>
                        </div>
                        
                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo base_url()?>"><i class="zmdi zmdi-home"></i> Dashboard</a>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-assignment"></i> Facturas</a>

                                <ul>
                                    <li><?php echo anchor('facturar','Documentos'); ?></li>
                                    <li><?php echo anchor('facturar/crear','Crear Factura'); ?></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-accounts"></i> Clientes</a>
                
                                <ul>
                                    <li><?php echo anchor('clientes','Clientes'); ?></li>
                                    <li><?php echo anchor('clientes/agregar','Ingresar Cliente'); ?></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-book"></i> Inventario</a>
                
                                <ul>
                                    <li><?php echo anchor('inventario','Productos'); ?></li>
                                    <li><?php echo anchor('inventario/agregar_producto','Ingresar Producto'); ?></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href=""><i class="zmdi zmdi-equalizer"></i>Reportes</a>
                                <ul>
                                    <li><a href="colors.html">Colors</a></li>
                                    <li><a href="animations.html">Animations</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            
            <section id="content">
                <div class="container">
                <?php echo $this->session->flashdata("document_status"); ?>