<div class="form-group {{ $errors->has('chat_id') ? 'has-error' : ''}}">
    {!! Form::label('chat_id', 'User', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('chat_id', $contact, null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('chat_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    {!! Form::label('text', 'Message', ['class' => 'col-md-4 control-label']) !!}
    <div id="editor"></div>
    <div class="col-md-6">
        {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
        {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-xs btn-primary'])
        !!}
    </div>
</div>