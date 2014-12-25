<?php
$protocol = $_SERVER["SERVER_PROTOCOL"];
if ('HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol)
    $protocol = 'HTTP/1.0';
header("$protocol 503 Service Unavailable", true, 503);
header('Content-Type: text/html; charset=utf-8');
header('Retry-After: 3600');
?>
<html>
    <head>
        <title>Site is down for maintenence</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="robots" content="noindex,nofollow,noimageindex,nocache,nosnippet,noodp,noydir"/>
        <style>
            body { text-align: center; padding: 150px; }
            h1 { font-size: 50px; }
            body { font: 20px Helvetica, sans-serif; color: #333; }
            article { display: block; text-align: left; width: 650px; margin: 0 auto; }
            a { color: #996699; text-decoration: none; }
            a:hover { color: #996699; text-decoration: none; }
        </style>
    </head>
    <body>
        <article>
            <h1>Site is temporary unavailable.</h1>
            <p>We are currently performing scheduled maintenance. Site will back soon.</p>
            <p>We apologize for any inconvenience.</p>
            <p>&mdash; <a href="mailto:tiribthe4hyyan@gmail.com">[Development Team]</a></p>
        </article>
    </body>
</html>