<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Project 3</title>
    <meta charset='utf-8'/>
    <link href='/css/styles.css' rel='stylesheet'>

</head>

<body>
<section id='main'>
    <header>
        <h1 id='title'>
            Currency Converter
        </h1>
        <p id='info'>
            Currency conversion rates are current as of:
            <br>
            {{ date('Y/m/d H:I:s T', $timeValue)}}
            <br>
            Reload the page to get the latest rates.
        </p>
    </header>
    @yield('form')


</section>
</body>

</html>
