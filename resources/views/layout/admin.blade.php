<html>
    <head>
        <!-- BOOTSTRAP STYLES-->
        <link href="{{asset('/admin/css/bootstrap.css')}}" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="{{asset('/admin/css/font-awesome.css')}}" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="{{asset('/admin/css/basic.css')}}" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="{{asset('/admin/css/custom.css')}}" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="/static/layui/css/layui.css">
        <script type="text/javascript" src="/static/layui/layui.js"></script>
        <script type="text/javascript" src="/static/layui/jquery-3.3.1.js"></script>
        <title>微商城 - @yield('title')</title>
    </head>
    <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">后台·首页</a>
            </div>

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="{{url('logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="{{asset('/admin/img/user.png')}}" class="img-thumbnail" />

                            <div class="inner-text">
                                <!-- @if(session('name'))
                                    {{Session::get('name')}}
                                @else -->
                                   <a href="">登录</a> | <a href="">注册</a>
                                <!-- @endif -->
                            <br />
                                <small>Last Login : 2 Weeks Ago </small>
                            </div>
                        </div>

                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>商品 <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/cate"><i class="fa fa-toggle-on"></i>添加分类</a>
                            </li>
                            <li>
                                <a href="/admin/list"><i class="fa fa-toggle-on"></i>分类列表</a>
                            </li>
                            <li>
                                <a href="/admin/add_goods"><i class="fa fa-toggle-on"></i>商品添加</a>
                            </li>

                            <li>
                                <a href="/admin/goods_list"><i class="fa fa-toggle-on"></i>商品列表</a>
                            </li>

                            <li>
                                <a href="/admin/add_attr"><i class="fa fa-toggle-on"></i>添加属性</a>
                            </li>

                            <li>
                                <a href="/admin/attr_list"><i class="fa fa-toggle-on"></i>属性列表</a>
                            </li>

                            <li>
                                <a href="/admin/productadd"><i class="fa fa-toggle-on"></i>添加货品</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>货物管理<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href=""><i class="fa fa-toggle-on"></i>货物添加</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-toggle-on"></i>货物列表</a>
                            </li>

                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bicycle "></i>我是最棒滴 <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">

                             <li>
                                <a href="form.html"><i class="fa fa-desktop "></i>Basic </a>
                            </li>
                             <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Advance</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>


    <div id="footer-sec">
        Copyright &copy; 2016.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('/admin/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('/admin/js/bootstrap.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('/admin/js/jquery.metisMenu.js')}}"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('/admin/js/custom.js')}}"></script>
    <script src="{{asset('/admin/js/bootstrap.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    </body>
</html>