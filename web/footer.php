<script>var fichiers=[<?php 
    $fichiers = array_diff(scandir("../sons"), ['.', '..']);
    foreach ($fichiers as $fichier){
        echo '"'.$fichier.'",';
    }?>];
</script>
<script src="script.js"></script>
</body>
</html>