$sequence = json_decode($_POST['sequence'], true);

foreach ($sequence as $step) {
    switch ($step['type']) {
        case 'movement':
            // ex: envoyer angle au servo
            break;

        case 'sound':
            // ex: jouer son
            break;

        case 'text':
            // ex: afficher sur OLED
            break;
    }
}