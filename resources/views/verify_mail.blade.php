<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/style.css">
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        <div>
            <h4>click the button below to login.</h4>
        </div>
        <a href="{{url('authenticate/'.$code)}}">
            <button class="btn btn-primary">Login</button>
        </a>
    </body>
</html>

