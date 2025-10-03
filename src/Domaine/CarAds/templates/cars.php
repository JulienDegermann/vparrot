<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <h2>Nos véhicules</h2>

        <?php foreach ($cars as $car):
            include __DIR__ . '/_partials/_cars.php';
        endforeach; ?>
    </section>
</body>

</html>