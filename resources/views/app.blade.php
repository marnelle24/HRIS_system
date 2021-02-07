
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>Lanex HRIS System</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css"> 
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app"></div>
    <!-- We have to include public/js/app.js. Add the following code before end of body tag -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>