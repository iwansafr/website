<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('login') }} - {{ __('Admin Dashboard') }}</title>
    <link rel="stylesheet" href="/dist/assets/css/main/app.css">
    <link rel="stylesheet" href="/dist/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="/dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/dist/assets/images/logo/favicon.png" type="image/png">
    @livewireStyles
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href=""><img src="/dist/assets/images/logo/logo.svg" alt="Logo"></a>
                    </div>
                    @livewire('auth.login')
                    
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background-image: url('https://wallpaperaccess.com/full/1947484.jpg');">
                </div>
            </div>
        </div>

    </div>
    @livewireScripts
</body>

</html>
