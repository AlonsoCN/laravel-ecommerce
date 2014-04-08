{{ Form::open(array('url'=>'login')) }}
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email') }}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
    {{ Form::button('Sign In', array('type'=>'submit')) }}
{{ Form::close() }}