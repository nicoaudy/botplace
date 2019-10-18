<div class="form-group {{ $errors->has('token') ? 'has-error' : ''}}">
    {!! Form::label('token', 'Token', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('token', null, ['class' => 'form-control']) !!}
        {!! $errors->first('token', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('is_bot') ? 'has-error' : ''}}">
    {!! Form::label('is_bot', 'Is Bot', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('is_bot', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('is_bot', '0', true) !!} No</label>
</div>
        {!! $errors->first('is_bot', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-xs btn-primary']) !!}
    </div>
</div>
