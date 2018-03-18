<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('/js/Form/form.js') }}"></script>
        <title>Form.confirm</title>
    </head>
    <body>
        <div class="content">
            <h1>Form.confirm</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <ul>
                <li>name: {{ $name }}</li>
                <li>email: {{ $email }}/li>
                <li>value: {{ $value }}</li>
            </ul>
            <form action="/form/complete" method="POST">
                <button type="submit" name="submit" value="back">戻る</button>
                <button type="submit" name="submit" value="submit">送信</button>
                {{csrf_field()}}
            </form>
        </div>
    </body>
</html>
