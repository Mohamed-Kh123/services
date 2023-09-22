<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>

        /**
         * this is a hack for dragula used on KanbanApp
         *
         * @see src/components/pages/apps/KanbanApp.vue
         */
        var global = global || window
    </script>
    <link rel="preload"
          as="style"
          onload="this.rel='stylesheet'"
          href="/panel/vendors/font-awesome-v5.css"
    />
    <link
        rel="preload"
        as="style"
        onload="this.rel='stylesheet'"
        href="/panel/vendors/line-icons-pro.css"
    />
    <link
        rel="preload"
        as="style"
        onload="this.rel='stylesheet'"
        href="/panel/vendors/prism-coldark-cold.css"
    />

    <style>
        .v-loader-wrapper.is-active {
            background-color: white !important;
            z-index: 999;
        }

        .--loading .form-body {
            height: 100vh !important;
        }
    </style>
    {{--Laravel Mix - CSS File--}}
    <link rel="stylesheet" href="{{ url('css/admin/app.css') }}">
    {{--    <link rel="stylesheet" href="{{ url('scss/main.css') }}">--}}
</head>
<body>
<script>
    let direction = localStorage.getItem('admin_locale') === "ar" ? 'rtl' : 'ltr';
    document.querySelector('html').setAttribute("dir", direction);
    document.querySelector('body').setAttribute("dir", direction);
</script>
@yield('content')

{{--Laravel Mix - JS File--}}
<script src="{{ url('js/admin/app.js') }}"></script>
</body>
</html>

