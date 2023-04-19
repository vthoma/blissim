<div class="row">
    <div class="m-5 col-12 text-center">
        <h2><?= $params['product']->title ?></h2>
        <p><?= $params['product']->description ?></p>
    </div>
</div>

<h3>Commentaires</h3>
<div class="row mt-3">
    <?php foreach ($params['comments'] as $comment): ?>
        <div class="col-3">
            <div class="m-3 card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $comment->name ?></h5>
                    <p class="card-text"><?= $comment->comment ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= empty($_GET['page']) || $_GET['page'] == 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="/product/<?= $params['product']->id ?>?page=<?= $_GET["page"]-1 ?>">Précédent</a>
        </li>

        <?php for ($i=1; $i<$params['paginate']['nbPages']+1; $i++): ?>
            <li class="page-item <?= $_GET['page'] == $i ? 'disabled' : '' ?>"><a class="page-link" href="/product/<?= $params['product']->id ?>?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>

        <li class="page-item <?= $_GET['page'] == $params['paginate']['nbPages'] ? 'disabled' : '' ?>">
            <a class="page-link" href="/product/<?= $params['product']->id ?>?page=<?= $_GET["page"]+1 ?>">Suivant</a>
        </li>
    </ul>
</nav>

<?php if (isset($_SESSION['name'])): ?>
    <div class="row">
        <div class="m-5 col-12 text-center">
            <h2>Ajouter un commentaire</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="comment" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php endif; ?>
