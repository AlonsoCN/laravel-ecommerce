{{ Form::model($category, array('url' => 'categories/'.$category->id)) }}
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name') }}
{{ Form::close() }}