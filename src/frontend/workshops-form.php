<h2>Registrate en los workshops</h2>

<form action="#" id="workshop-form">
    <fieldset>
        <div class="sixteen columns">
            <div class="five columns">
                <label style="text-align: left;" for="">Nombre</label>
                <input style="text-align: left;" type="text" name="nombre" required/>
            </div>

            <div class="five columns">
                <label style="text-align: left;" for="">e-mail</label>
                <input style="text-align: left;" type="email" name="email" placeholder="Dirección del registro." required/>
            </div>
        </div>
    </fieldset>


    <fieldset>
        <div class="sixteen columns">
            <?php $options = implode(' ', array_map(function ($workshop) {
                return sprintf('<option value="%s">%s</option>', htmlspecialchars($workshop['key']), htmlspecialchars($workshop['titulo']));
            }, include(__DIR__.'/workshops.php'))); ?>

            <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="five columns" style="text-align: left;">
                    <select name="workshops[]" <?= 1 === $i ? 'required="required"' : '' ?> id="workshop<?= $i ?>">
                        <option value="">---</option>
                        <?= $options; ?>
                    </select>
                </div>
            <?php endfor; ?>
        </div>
    </fieldset>

    <p class="messages"></p>

    <button type="submit" disabled="disabled">Registrarme</button>
</form>
