<html lang="en">

<head>
    <title align="center">Laravel DataTables Tutorial Example</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .dataTables_length {
            color: white !important;
            background-color: black !important;
        }

        .dataTables_filter {
            color: white !important;
            background-color: black !important;
        }

        .dataTables_info {
            color: white !important;
            background-color: black !important;
        }



        .dataTables_paginate {
            color: white !important;
            background-color: black !important;
        }

        .dataTables_length select {
            background-color: black;
        }

        .dataTables_filter input {
            background-color: white;
            color: black;
        }
    </style>

</head>

<body style="background-color:black">
    <div class="container">
        @yield('content')
    </div>

</body>

</html>