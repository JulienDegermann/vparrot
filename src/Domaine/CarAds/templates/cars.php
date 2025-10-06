<section>
    <h2>Nos véhicules</h2>
    <div class="car-wrapper">
        <?php foreach ($cars as $car):
            include __DIR__ . '/_partials/_car_card.php';
        endforeach; ?>
    </div>
</section>