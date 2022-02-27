<head>
    <link rel="stylesheet" href="resources/views/vendor/mail/html/themes/default.css">
</head>
<h1><span>Pozdrav, {{$email_data['name']}}!</span></h1>
<br><br>
<p>Dobrodošli na moj sajt.
<br>
Molim Vas kliknite na sljedeći link da biste potvrdili svoju email adresu!</p>
<br><br>
<a href="http://localhost/oglasi_za_posao/public/verify?code={{$email_data['verification_code']}}"><button class="btn-primary">Klikni ovdje!</button></a>

<br><br>
Hvala Vam!
<br>

