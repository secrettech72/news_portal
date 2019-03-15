@extends('admin.common.layout')
@section('bs')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="active">News</li>
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
                <i class="ace-icon fa fa-angle-double-right"></i>News
                </a>
            </small>
            <small>
                <a href="{{ route('admin.user.add') }}">
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Add New News
                </a>
            </small>
        </h1>
    </div>
@endsection

@section('contents')
        <div class="table-responsive">
             <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>News Pictures</th>
                        <th>Status</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data['rows']->count() > 0)
                @foreach($data['rows'] as $key=>$data)
                    <tr>
                     <td>{{ $key+1 }}</td>
                     <td>{{ $data->title }}</td>
                    <td>{{ $data->description }}</td>
                    <td>Test Cate</td>
                        <td>@if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$data->news_images))
                                <img src="{{ asset('Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$data->category_images) }}" class="img img-responsive" style="width: 300px" alt="News">
                                @else
                                No
                        @endif
                        </td>
                    <td> @if($data->status == 1)
                    {{ 'Active' }}
                             @elseif($data->status == 0)
                             {{ 'In-Active' }}
                             @else
                             {{ 'Suspened' }}
                    @endif
                    </td>
                        <td>
                            
                            <a href="{{ route('admin.category.edit',$data->id) }}" class="btn btn-info">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.category.delete',$data->id) }}" class="btn btn-info" onclick="return confirm('are you sure to delete this?')">
                                    <i class="fa fa-fw fa-remove"></i>
                                </a>
                            
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="6" style="color:red; text-align:center;">No data found.</td></tr>
                    @endif
                </tbody>
             </table>
        </div>
@endsection
