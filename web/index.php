<?php
include "header.php";
?>

<form method="post" action="actions/insertChoregraphie.php" id="choreoForm">

    <div class="card mb-3" style="width: 30rem;">
        <h5 class="card-header">Informations</h5>

        <div class="card-body">
            <label class="form-label">Titre</label>
            <input name="titre" type="text" maxlength="65" class="form-control" required>
        </div>

        <div class="card-body">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
    </div>
    
    <div class="card mb-3" style="width: 30rem;">
        <h5 class="card-header">Actions</h5>
        <button type="button" class="btn btn-outline-primary" onclick="addBlock('movement')">➕ Mouvement</button>
        <button type="button" class="btn btn-outline-warning" onclick="addBlock('sound')">➕ Son</button>
        <button type="button" class="btn btn-outline-success" onclick="addBlock('text')">➕ Texte</button>
    </div>

    <div class="card mb-3">
        <h5 class="card-header">Chorégraphie</h5>

        <div class="card-body">

            <div id="blocks"></div>

            <input type="hidden" name="sequence" id="sequence">
            <input type="hidden" name="token" value="<?= $token ?>">
            <input type="hidden" name="id_demande" value="<?= $id_demande ?>">
        </div>

        <div class="card-body">
            <button type="submit" class="btn btn-primary w-50">Envoyer</button>
        </div>
    </div>
</form>

<?php 
include "footer.php"
?>