
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>Lanex HRIS System</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/css/app.css"> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app"></div>
    <!-- We have to include public/js/app.js. Add the following code before end of body tag -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>