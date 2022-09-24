<!DOCTYPE html>
<html lang="id">

<head>
    @include('dashboard.partial.meta')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    @include('dashboard.partial.sidebar-header')
                </div>
                <div class="sidebar-menu">
                    @include('dashboard.partial.sidebar')
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    @include('dashboard.partial.navbar')
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>@yield('title')</h3>
                                <p class="text-subtitle text-muted">@yield('description')</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/admin">{{ __('Dashboard') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            @yield('title')
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        @yield('content')
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2016 &copy; esoftgreat</p>
                        </div>
                        <div class="float-end">
                            <p>made with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://esoftgreat.com">esoftgreat</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="/dist/assets/js/bootstrap.js"></script>
    <script src="/dist/assets/js/app.js"></script>
    {{-- <script src="/dist/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="/dist/assets/js/pages/form-element-select.js"></script> --}}
    <script>
        currenthref = document.querySelector('a[href="'+window.location.href+'"]')
        currenthref.parentNode.classList.add('active')
        currenthref.parentNode.parentNode.classList.add('active')
        currenthref.parentNode.parentNode.parentNode.classList.add('active')
        // console.log('a[href="'+window.location.href+'"]')
        // console.log(window.location.href)
    </script>
    @stack('scripts')
    @livewireScripts

</body>

</html>
