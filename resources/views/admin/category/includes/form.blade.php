<div class="form-group">
    <label for="" class="control-label col-sm-3">Title
    </label>
    <div class="col-sm-6">
        {!! Form::text('title', null, ['class'=>'form-control','id'=>'title','required']) !!}
    </div>
    @if(count($errors) && $errors->has('title'))
        <p class="error has-error">{{ $errors->first('title') }}</p>
        @endif
</div>

<div class="form-group">
    <label for="" class="control-label col-sm-3">Description
    </label>
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class'=>'form-control','id'=>'description','required']) !!}
    </div>
    @if(count($errors) > 0 && $errors->has('description'))
        <p class="error has-error">{{ $errors->first('description') }}</p>
    @endif
</div>

<div class="form-group">
        <label for="" class="control-label col-sm-3">News Pictures
        </label>
        <div class="col-sm-6">
            {!! Form::file('category_images',['class'=>'form-control','id'=>'category_images',isset($data["row"]) ? '' : 'required']) !!}
        </div>
        @if(count($errors) > 0 && $errors->has('category_images'))
            <p class="error has-error">{{ $errors->first('category_images') }}</p>
        @endif
    </div>
<div class="form-group">
    <label for="" class="control-label col-sm-3">Status
    </label>
    <div class="col-sm-6">
        {!! Form::radio('status', 1, ['class'=>'form-control','id'=>'status']) !!} Active
        {!! Form::radio('status', 0, ['class'=>'form-control','id'=>'status']) !!} InActive
    </div>
    @if(count($errors) >0 && $errors->has('status'))
    <p class="error has-error">{{ $errors->first('status') }}</p>
    @endif
</div>
