<?php
/**
 * David Jimenez Castillo
 * 
 */

get_header();

?>


<div class="wrap">
    <h1 id="wpFormContactTitle">Formulario de contacto</h1>
    <div id="seccionImagenContacto">
        <img style="height: 200px; margin-left: 50px;" src="https://runazul.com/wp-content/uploads/2020/12/image-2-300x117.png" alt="" class="alignnone size-medium wp-image-16" />
    </div>
    <div id="seccionMensajes">
    <?php if( isset($_GET['errormsg'])): ?>
    <div style="background-color: lightcoral; color: red; padding: 1em; margin-bottom: 1em; margin-left: 50px;">
        <p><?php echo $_GET['errormsg']; ?></p>
    </div>
    <?php endif; ?>
        
    <?php if( isset($_GET['exito'])): ?>
    <div style="background-color: lightgreen; color: green; padding: 1em; margin-bottom: 1em; margin-left: 50px;">
        <p><?php echo $_GET['exito']; ?></p>
    </div>
    <?php endif; ?>    
    </div>

    <form name="wpFormContact" id="wpFormContact" action="<?php echo esc_url(admin_url('admin-post.php'))?>" method="post">
    <label for="txtnombre">Nombre:</label> 
    <input type="text" id="txtnombre" name="txtnombre">

    <textarea name="txtmensaje" id="txtmensaje" cols="12" rows="5">Mensaje:</textarea>
    <input type="button" onclick="sendData()"  value="Enviar"> 

    <input type="hidden" name="action" value="contactform">
    </form>
    <script type="text/javascript">
        function sendData(){
            if(document.wpFormContact.txtnombre.value == ""){
                alert("ingresa un nombre");
            }else{
                if(document.wpFormContact.txtmensaje.value == ""){
                    alert("ingresa un mensaje");
                }else{
                    document.wpFormContact.submit();    
                }
            }
        }
    </script>
</div>
	<main id="primary" class="site-main">
            
		<?php
		
		?>

	</main><!-- #main -->

<?php

get_footer();
