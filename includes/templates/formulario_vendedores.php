<fieldset><!-- 1!-->
    <legend>Informacion del Vendedor</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre(s) del vendedor" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="vendedor[apellido]" placeholder="Apellido(s) del vendedor" value="<?php echo s($vendedor->apellido); ?>">


</fieldset><!-- 1!-->

<fieldset>
    <legend> Informacion extra</legend>
    <label for="telefono">Telefono:</label>
    <input type="text" name="vendedor[telefono]" placeholder="Telefono del vendedor" value="<?php echo s($vendedor->telefono); ?>">

</fieldset>
