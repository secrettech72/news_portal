@extends('admin.common.layout')
@section('bs')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Category</a>
            </li>
            <li class="active">ff</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
            </form>
        </div><!-- /.nav-search -->
    </div>
@endsection

@section('ps')
<div class="page-header">
        <h1>
            <a href="{{ route('admin.dashboard') }}">Dashboard
            </a>
            <small>
                <a href="{{ route('admin.news') }}">
                <i class="ace-icon fa fa-angle-double-right"></i>Category
                </a>
            </small>
            <small>
                <a href="{{ route('admin.news.add') }}">
                    <i class="ace-icon fa fa-angle-double-right"></i> Add New Category
                </a>
            </small>
        </h1>
    </div>
@endsection
@section('contents')
    {!! Form::open(['method' => 'POST', 'route' => 'admin.category.store', 'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data']) !!}
    @include('admin.category.includes.form')
                        <div class="form-group">
                                <label for="" class="control-label col-sm-3">Submit Your Form
                                </label>
                                <div class="col-sm-3">
                            {!! Form::submit('submit', ['class'=>'form-control btn btn-success','id'=>'submit']) !!}
                            </div>
                            </div>
    {!! Form::close() !!}
@endsection
