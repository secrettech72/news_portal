<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login Page - Ace Admin</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ asset('admin/ssets/css/font-awesome-ie7.min.css') }}" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace-fonts.css') }}" />

    <!-- ace styles -->

    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/ace-rtl.min.css') }}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('admin/ssets/css/ace-ie.min.css') }}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{ asset('admin/assets/js/html5shiv.js') }}"></script>
    <script src="{{ asset('admin/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            @include('admin.common.session_messages')
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="icon-leaf green"></i>
                            <span class="red">Ace</span>
                            <span class="white">Application</span>
                        </h1>
                        <h4 class="blue">&copy; Company Name</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="icon-coffee green"></i>
                                        Please Enter Your Information
                                    </h4>

                                    <div class="space-6"></div>

                                    <!-- Login Form -->
                                    {{ Form::open(['method'=>'POST','route'=>'news.register.store','class'=>'form-horizontal']) }}
                                    <div class="form-group">
                                        <label for="" class="control-label col-sm-3">Email
                                        </label>
                                        <div class="col-sm-6">
                                            {!! Form::text('email', null, ['class'=>'form-control','id'=>'email','required']) !!}
                                        </div>
                                        @if(count($errors) && $errors->has('email'))
                                            <p class="error has-error">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="control-label col-sm-3">UserName
                                        </label>
                                        <div class="col-sm-6">
                                            {!! Form::text('user_name', null, ['class'=>'form-control','id'=>'usersname','required']) !!}
                                        </div>
                                        @if(count($errors) > 0 && $errors->has('usersname'))
                                            <p class="error has-error">{{ $errors->first('usersname') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-sm-3">First Name
                                        </label>
                                        <div class="col-sm-6">
                                            {!! Form::text('first_name', null, ['class'=>'form-control','id'=>'first_name']) !!}
                                        </div>
                                        @if(count($errors) >0 && $errors->has('first_name'))
                                            <p class="error has-error">{{ $errors->first('first_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-sm-3">Last Name
                                        </label>
                                        <div class="col-sm-6">
                                            {!! Form::text('last_name', null, ['class'=>'form-control','id'=>'last_name']) !!}
                                        </div>
                                        @if(count($errors) >0 && $errors->has('last_name'))
                                            <p class="error has-error">{{ $errors->first('last_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-sm-3">Password
                                        </label>
                                        <div class="col-sm-6">
                                            {!! Form::password('password', ['class'=>'form-control','id'=>'password','required']) !!}
                                        </div>
                                        @if(count($errors) >0 && $errors->has('password'))
                                            <p class="error has-error">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-sm-3">Status
                                        </label>
                                        <div class="col-sm-6">
                                            {!! Form::radio('status', 1, ['class'=>'form-control','id'=>'status']) !!} Active
                                            {!! Form::radio('status', 2, ['class'=>'form-control','id'=>'status']) !!} InActive
                                        </div>
                                        @if(count($errors) >0 && $errors->has('status'))
                                            <p class="error has-error">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="control-label col-sm-3">Submit Your Form
                                        </label>
                                        <div class="col-sm-3">
                                            {!! Form::submit('submit', ['class'=>'form-control btn btn-success','id'=>'submit']) !!}
                                        </div>
                                    </div>
                                    {{ Form::close() }}

                                    <div class="social-login center">
                                        <a class="btn btn-primary">
                                            <i class="icon-facebook"></i>
                                        </a>

                                        <a class="btn btn-info">
                                            <i class="icon-twitter"></i>
                                        </a>

                                        <a class="btn btn-danger">
                                            <i class="icon-google-plus"></i>
                                        </a>
                                    </div>
                                </div><!-- /widget-main -->
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->
                        <!-- /signup-box -->
                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('admin/assets/js/jquery-2.0.3.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('admin/assets/js/jquery-1.10.2.min.js') }}'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='{{ asset('admin/assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>

<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#'+id).addClass('visible');
    }
</script>
</body>
</html>
