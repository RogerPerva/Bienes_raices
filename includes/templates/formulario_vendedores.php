<fieldset><!-- 1!-->
    <legend>Informacion del Vendedor</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre(s) del vendedor" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="vendedor[apellido]" placeholder="Apellido(s) del vendedor" value="<?php echo s($vendedor->apellido); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="vendedor[imagen]">

    <!-- <?php // if ($vendedor->imagen) { ?>
        <img src="/imagenes/<?php // echo $vendedor->imagen ?>" class="imagen-small">
    <?php //} ?> -->

</fieldset><!-- 1!-->