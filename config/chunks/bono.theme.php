<?php

// BONO
return array(
    // Bono Themeing
    'bono.theme' => array(
        // The class of your theme, basically it register the template and copy all of it's assets (js, css, etc) to your project
        'class' => 'Xinix\\Theme\\Naked2Theme',

        // Make it overidable, means everytime you change the assets in your dependency folder, it will be copied again
        'overwrite' => false,
    ),
);
