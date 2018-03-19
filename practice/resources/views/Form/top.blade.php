<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Form.top</title>
    </head>
    <body>
        <div class="content">
            <h1>Form.top</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/form/confirm" method="POST">
                name: <input type="text" name="name" value="{{ old('name') }}" /><br />
                email: <input type="text" name="email" value="{{ old('email') }}" /><br />
                value: <input type="text" name="value" value="{{ old('value') }}" /><br />
                <input type="submit" />
                {{csrf_field()}}
            </form>

            <table style="border: 1px solid black;">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>value</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->value }}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </body>
</html>
