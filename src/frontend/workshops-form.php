<h2>Registrate en los workshops</h2>

<form action="#" id="workshop-form">
    <fieldset>
        <div class="sixteen columns">
            <div class="five columns">
                <label style="text-align: left;" for="">Nombre</label>
                <input style="text-align: left;" type="text" name="nombre"/>
            </div>

            <div class="five columns">
                <label style="text-align: left;" for="">e-mail</label>
                <input style="text-align: left;" type="email" name="email"/>
            </div>
        </div>
    </fieldset>


    <fieldset>
        <div class="sixteen columns">
            <?php
            $workshops = include(__DIR__.'/workshops.php');
            foreach ($workshops as $pos => $workshop): ?>
            <label class="five columns" style="text-align: left;">
                <input type="checkbox" name="workshops[]" value="<?= $workshop['key'] ?>"/> <span><?= $workshop['titulo'] ?></span>
            </label>
            <?php if (0 === (($pos + 1) % 3)) : ?>
        </div>
        <div class="sixteen columns">
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </fieldset>

    <p class="messages"></p>

    <button type="submit">Registrarme</button>
</form>
