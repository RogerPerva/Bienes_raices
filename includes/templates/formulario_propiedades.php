<fieldset><!-- 1!-->
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text"  id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo); ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="propiedad[precio]" placeholder="Precio" value="<?php echo s($propiedad->precio); ?>">
                
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

                <?php if($propiedad->imagen){ ?>
                    <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
                    <?php } ?>

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="propiedad[descripcion]" > <?php echo s($propiedad->descripcion); ?></textarea>

            </fieldset><!-- 1!-->
            <fieldset><!-- 2!-->
                <legend>Informacion Propiedad</legend>
                
                <label for="habitaciones">Habitaciones:</label>
                <input 
                type="number"
                  id="habitaciones"
                   name="propiedad[habitaciones]"
                    placeholder="Ej: 3"
                     min="1"
                      max="9"
                       value="<?php echo s($propiedad->habitaciones); ?>">
                
                <label for="wc">Baños:</label>
                <input type="number"  id="wc" name="propiedad[wc]" placeholder="Ej: 4" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">
                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number"  id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 2" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">

            </fieldset><!-- 2!-->
            <fieldset> <!-- 3!-->
                <legend>Vendedor</legend> 
                <label for="vededor">Vendedor</label>
                <select name="propiedad[vendedorId]" id="vendedor">
                    <option selected value="">-- Seleccione --</option>
                <?php foreach($vendedores as $vendedor): ?>
                    <option
                    <?php //Para guardar el vendedor que seleccionamos lo tomamos de $propiedad que es el objeto que estamos llenando.?>
                        <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''?>
                     value="<?php echo s($vendedor->id); ?>">
                                    <?php echo s($vendedor->nombre); ?>
                    </option>
                <?php endforeach; ?>
                    </select>
            </fieldset><!-- 3!-->