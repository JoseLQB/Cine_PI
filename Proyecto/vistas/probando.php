<div class="slidecontainer">
                                                    <input type="range" min="1" max="10" step="0.5" id="<?php echo $reserva->pelicula; ?>" 
                                                    name="nota" class="rango_nota custom-range" 
                                                    <?php if($reserva->fecha > date("Y-m-d")){ echo "disabled";} ?>
                                                    value='<?php if($reserva->nota!=-1){ echo $reserva->nota;}else{echo 5;} ?>'>
                                                    <input type="hidden" name="usuario" value="<?php echo $array_User->id; ?>">                                              
                                                    <input type="hidden" name="peli" value="<?php echo $reserva->pelicula; ?>">                                              
                                                    <input type="hidden" name="nueva" value="<?php if($reserva->nota!=-1){ echo 1;}else{echo 0;}?>">                                               
                                                </div>