<?php
ob_start();
?>
<!-- <form action="/ajout/" method="post" class="admin" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="libelle" class="form-label">Libelle voyage</label>
        <input type="text" name="libelle" class="form-control" id="libelle">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" id="description">
    </div>
    <div class="mb-3">
        <label class="form-label" for="prix">Prix</label>
        <input type="number" name="prix" class="form-control" id="prix">
    </div>
    <div class="mb-3">
        <label class="form-label" for="tag">Tag</label>
        <input type="text" name="tag" class="form-control" id="tag">
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="img" name="img">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
<form action="" class="admin">
    <table>
        <select name="tag" id="tag">
            <?php foreach ($tag as $tags) : ?>
                <option value="<?= $tags->getLIBELLE_TAG() ?>"><?= $tags->getLIBELLE_TAG() ?></option>
            <?php endforeach ?>
        </select>
        <thead>
            <tr>
                <th><input type="checkbox" name="check"></th>
                <th>id</th>
                <th>nom</th>
                <th>prix</th>
                <th>description</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voyages as $voyage) : ?>
                <tr>
                    <td><input type="checkbox" name="check"></td>
                    <td><?= $voyage->getID_VOYAGE() ?></td>
                    <td><?= $voyage->getLIBELLE_VOYAGE() ?></td>
                    <td><?= $voyage->getPRIX_VOYAGE() ?></td>
                    <td class="desc"><?= $voyage->getDESC_VOYAGE() ?></td>
                    <td><?= $voyage->getIMAGE_VOYAGE() ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</form>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>