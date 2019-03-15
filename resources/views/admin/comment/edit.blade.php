@extends('admin.common.layout')
@section('css')
    <style>
        .error{
            color: #ff6304;
        }
    </style>
    @endsection
    @section('bs')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Dashboard</a>
            </li>
            <li class="active">Comments</li>
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
                <a href="{{ route('admin.comment') }}">
                <i class="ace-icon fa fa-angle-double-right"></i>comments
                </a>
            </small>
            <small>
                <a href="{{ route('admin.comment.add') }}">
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Add New comments
                </a>
            </small>
        </h1>
    </div>
@endsection
@section('contents')
    {!! Form::model($data['row'],['method'=>'POST','route'=>['admin.comment.update',$data['row']->id],
    'class'=>'form-horizontal','enctype'=>'multipart/form-data'
    ]) !!}
    {{ Form::hidden('id',$data['row']->id) }}
    @include('admin.comment.includes.form')
    <div class="form-group">
        <label for="" class="control-label col-sm-3">Submit Your Form
        </label>
        <div class="col-sm-3">
            {!! Form::submit('submit', ['class'=>'form-control btn btn-success','id'=>'submit']) !!}


        </div>
    </div>
    {!! Form::close() !!}
@endsection
