<div class="row mt-4">
    <?php foreach($params as $products): ?>
        <?php foreach($products as $product): ?>
        <div class="col-3 mt-4">
            <div class="card" style="width: 18rem;">
                <img src="https://placehold.co/600x400" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $product->title ?></h5>
                    <p class="card-text"><?= $product->description ?></p>
                    <a href="product/<?= $product->id ?>" class="btn btn-primary">Détail</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    <?php endforeach ?>
</div>