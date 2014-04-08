{{ Form::open(array('url' => 'categories')) }}
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name') }}
{{ Form::close() }}