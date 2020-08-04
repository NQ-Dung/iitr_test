<h1>Login<h1>
{{ Form::open(['url' => 'login']) }}
<table style="padding-bottom:15px">
    <tr>
        <td style="width:35%">{{ Form::label('name', 'Username') }}</td>
        <td>{{ Form::text('name', '', ['placeholder' => 'Username', 'required' => 'required']) }}</td>
    </tr>
    <tr>
        <td>{{ Form::label('email', 'Email') }}</td>
        <td>{{ Form::text('email', '', ['placeholder' => 'email@example.com', 'required' => 'required']) }}</td>
    </tr>
    <tr>
        <td>{{ Form::label('password', 'Password') }}</td>
        <td>{{ Form::password('password') }}</td>
    </tr>
</table>
{{ Form::submit('Login') }}
{{ Form::close('login') }}
