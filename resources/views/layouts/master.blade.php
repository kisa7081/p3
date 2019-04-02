<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Project 3</title>
    <meta charset='utf-8'/>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='/css/styles.css' rel='stylesheet'>
</head>

<body class='mt-4'>
    <section id='main'>
        <header>
            <h1 id='title'>
                Currency Converter
            </h1>
            <hr>
            <p id='info'>
                Currency conversion rates are current as of:
                <br>
                {{ $ratesTimeStamp }}
                <br>
            </p>
        </header>
        @yield('content')
    </section>
</body>
</html>
