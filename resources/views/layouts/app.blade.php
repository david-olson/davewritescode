<!DOCTYPE html>
<html lang="en" style="position: relative; height: 100%;">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/admin.css?ver={{ \Carbon\Carbon::now()->format('YmdHis') }}">
    <title>Admin Control Panel</title>
</head>
<body class="admin-panel">
    <div class="header-container" data-sticky-container>
        <header class="admin-panel__header sticky" data-margin-top="0" id="header" data-sticky>
            <div class="grid-x grid-padding-x align-middle">
                <div class="medium-3 cell">
                    <h1><a href="{{ route('admin.dashboard') }}">Overcoming Obstacles Admin</a></h1>
                </div>
                <div class="medium-9 cell text-right">
                    <ul class="menu dropdown align-right" data-dropdown-menu data-disable-hover="true" data-click-open="true">
                        <li>
                            <a href="#">{{ Auth::guard('web')->user()->email }}</a>
                            <ul class="menu">
                                <li>
                                    <a href="#">My Account</a>
                                </li>
                                <li>
                                    <a href="/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <div class="admin-panel__body">
        <div class="grid-x admin-panel__body__grid">
            <div class="medium-auto cell admin-panel__body__grid__nav" data-sticky-container>
                @include('admin.components.nav')
            </div>
            <div class="medium-auto cell admin-panel__body__grid__content">
                @if(session('message.text'))
                    <div class="message {{ session('message.style') }}" data-closable>
                        <p>{{ session('message.text') }}</p>
                        <button class="close-button" data-close>&times;</button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.1/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.1/jquery.tinymce.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.0/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="/js/admin.vendors.js"></script>
    <script>
        Dropzone.autoDiscover = false;
    </script>
    <script src="/js/admin.js?ver={{ \Carbon\Carbon::now()->format('YmdHis') }}"></script>
</body>
</html>
