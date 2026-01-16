<?php
include "header.php";
?>
<div class="d-flex">
    <form method="post" action="actions/insertChoregraphie.php" id="choregraphie">
        <div class="card mb-3" style="width: 30rem;">
            <h5 class="card-header">Informations</h5>
            <div class="card-body">
                <label class="form-label">Titre</label>
                <input name="titre" type="text" maxlength="65" class="form-control" required>
                <select name="application">Application</select>
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>
        
        <div class="card mb-3" style="width: 30rem;">
            <h5 class="card-header mb-3">Actions</h5>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="addBlock('mouvement')">
                <i class="bi bi-arrows-move"></i> Ajouter un mouvement
            </button>
            <button type="button" class="btn btn-outline-warning mb-2" onclick="addBlock('son')">
                <i class="bi bi-volume-up-fill"></i> Ajouter un son
            </button>
            <button type="button" class="btn btn-outline-success mb-2" onclick="addBlock('message')">
                <i class="bi bi-chat-left-text"></i> Ajouter un message
            </button>
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="addBlock('pause')">
                <i class="bi bi-hourglass-split"></i> Ajouter une pause
            </button>
        </div>


        <div class="card mb-3 d-flex justify-content-end">
            <h5 class="card-header">Chorégraphie</h5>

            <div class="card-body">
                <div id="blocks"></div>
                <input type="hidden" name="sequence" id="sequence">
                <input type="hidden" name="token" value="<?= $token ?>">
            </div>

            <div class="card-body">
                <button type="submit" class="btn btn-primary w-50">Enregistrer</button>
            </div>
        </div>
    </form>
</div>

















<?php 
include "footer.php"
?>