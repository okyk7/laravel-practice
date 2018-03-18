<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Index.top</title>
    </head>
    <body>
        <div class="content">
            <h1>Index.top</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- アクション指定 --}}
            <a href="{{ action('Form@top') }}">form画面へ</a><br />
            {{-- url指定 --}}
            <a href="{{ url('/form') }}">form画面へ</a><br />
        </div>
    </body>
</html>
