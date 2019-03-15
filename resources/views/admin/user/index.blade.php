@extends('admin.common.layout')
@section('bs')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="active">User</li>
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
                <a href="{{ route('admin.user') }}">
                <i class="ace-icon fa fa-angle-double-right"></i>User
                </a>
            </small>
            <small>
                <a href="{{ route('admin.user.add') }}">
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </small>
        </h1>
    </div>
@endsection

@section('contents')
<div class="container">
    <div class="col-sm-12">
        <div class="table-responsive">
             <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Status</th>
                        <th>Settings</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['rows'] as $key=>$user)
                    <tr>
                     <td>{{ $key+1 }}</td>
                     <td>{{ $user->email }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td> @if($user->status == 1)
                    {{ 'Active' }}
                             @elseif($user->status == 0)
                             {{ 'In-Active' }}
                             @else
                             {{ 'Suspened' }}
                    @endif
                    </td>
                        <td>
                            
                            <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-info">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            
                            <a href="{{ route('admin.user.delete',$user->id) }}" class="btn btn-info">
                                    <i class="fa fa-fw fa-delete"></i>
                                </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
        </div>
    </div>
</div>
@endsection
