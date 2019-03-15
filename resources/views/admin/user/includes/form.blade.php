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
        {!! Form::text('usernames', null, ['class'=>'form-control','id'=>'usersname','required']) !!}
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
