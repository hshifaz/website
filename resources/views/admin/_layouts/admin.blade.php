<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1">
    <title>Customer Information Management System - STELCO</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:1234/stelco_website/public/admin/css/admin.css">

</head>
<body>

<header>
    <div class="container">
        <h1>Admin Panel</h1>
    </div>
</header>

<main class="contain">
    @yield('content')
</main>

<footer>
    <div class="container">
        &copy; {!! date('Y') !!} State Electric Company Ltd.
    </div>
</footer>

</body>
</html>