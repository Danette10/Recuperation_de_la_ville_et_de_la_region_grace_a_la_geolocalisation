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
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            // Find city

            // const url = `https://api-adresse.data.gouv.fr/reverse/?lon=${lng}&lat=${lat}`;
            // fetch(url)
            //     .then(response => response.json())
            //     .then(data => {
            //         localStorage.setItem('city', data.features[0].properties.city);
            //     })
            //     .catch(error => console.error(error));

            // Find region
            const url2 = `https://geo.api.gouv.fr/regions?lat=${lat}&lon=${lng}`;
            fetch(url2)
                .then(response => response.json())
                .then(data => {
                    localStorage.setItem('region', data[0].nom);
                })
                .catch(error => console.error(error));
        });
        } else {
        console.log("La géolocalisation n'est pas supportée par votre navigateur");
    }
    console.log(localStorage.getItem('region'));
</script>
</body>
</html>