<?php

$scheduleSettings = require __DIR__.'/settings-agenda.php';

if (null === $scheduleSettings) {
    return;
}

?>

<div class="white-wrapper">

    <div class="container container-with-margin" id="agenda">
        <section class="sixteen columns workshops clearfix">

            <h1>Agenda</h1>

            <h2><strong>30</strong> cupos para cada workshop!</h2>


            <!-- In nested columns give the first column a class of alpha
            and the second a class of omega -->

            <?php foreach ($scheduleSettings as $time => $workshops): ?>
                <div class="row">
                    <div class="two columns alpha"><?= $time ?></div>
                    <?php foreach ($workshops as $workshop): ?>
                        <div class="<?= 3 === count($workshops) ? 18 < strlen($workshop) ? 'five' : 'four' : 'seven' ?> columns omega"><?= $workshop ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</div>

