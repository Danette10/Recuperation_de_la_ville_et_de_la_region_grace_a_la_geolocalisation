<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Récuperer la Géo localisation d'un utilisateur</title>
</head>
<body>

<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            console.log(position.coords.latitude);
            console.log(position.coords.longitude);
            fetch('https://api-adresse.data.gouv.fr/reverse/?lon=' + position.coords.longitude + '&lat=' + position.coords.latitude)
                .then(response => response.json())
                .then(data => localStorage.setItem('city', data.features[0].properties.city))
        });
        } else {
        console.log("La géolocalisation n'est pas supportée par votre navigateur");
    }
</script>
</body>
</html>