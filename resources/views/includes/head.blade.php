<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{url('/')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Faveo</title>

    <link href="https://support.faveohelpdesk.com/themes/default/common/images/favicon.ico" rel="shortcut icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("/dist/css/adminlte.css") }}>
    <link rel="stylesheet" href={{ asset("/dist/css/highlighter.css") }}>
    <link rel="stylesheet" href={{ asset("/dist/css/alt/adminlte.components.css") }}>
    <link rel="stylesheet" href={{ asset("/dist/css/alt/adminlte.core.css") }}>
    <link rel="stylesheet" href={{ asset("/dist/css/alt/adminlte.extra-components.css") }}>
    <link rel="stylesheet" href={{ asset("/dist/css/alt/adminlte.light.css") }}>
    <link rel="stylesheet" href={{ asset("/dist/css/alt/adminlte.pages.css") }}>
    <script src="{{ asset('/Helper/helpers.js') }}"></script>
<style>
    code{
        color: #007bff;
    }
</style>

</head>
