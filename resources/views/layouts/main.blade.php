<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic Portfolio Website</title>
    <link rel="stylesheet" href="/css/foundation.css">
    <link rel="stylesheet" href="/css/main.css">

</head>
<body>

<div style="background-color: #34495e" class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas>
    <div class="grid-y grid-padding-x" style="height: 100%;">
        <br>

        <div class="cell auto">
            <h5 class="manuTitle">Main Manu</h5>
            <ul class="side-nav mynav">
                <li>
                    <a href="/">Home</a>
                </li>
                @if(!Auth::check())
                <li>
                    <a href="/login">Login</a>
                </li>
                <li>
                    <a href="/register">Register</a>
                </li>
                @endif
                @if(Auth::check())
                <li>
                    <a href="/gallery/create">Create Gallery</a>
                </li>
                <li>
                    <a href="/logout">Logout</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="off-canvas-content" data-off-canvas-content>

    @if (Session::has('message'))
        <div data-alert class="alert-box">
        {{Session::get('message')}}
        </div>
    @endif

    @yield('content')

</div>
<script src="/js/vendor/jquery.js"></script>
<script src="/js/vendor/foundation.js"></script>

<script>
    $(document).foundation();
</script>
</body>
</html>


