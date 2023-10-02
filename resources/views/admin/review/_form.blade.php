<div class="form-group">
    {!! Form::label('name', 'Review Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group mt-3">
    {!! Form::label('text', 'Review text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Save review', ['class'=> 'btn btn-primary mt-3']) !!}
