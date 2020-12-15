<?php

/* 
 
 */

function capura_de_valores_del_formulario(){
    
    //Verificar campos obligatorios y campos válidos
    
    if ( !isset($_POST['txtnombre']) || empty($_POST['txtnombre']) ){
         wp_redirect(add_query_arg( array('errormsg'=> 'El campo nombre está incompleto'),get_home_url()."/contacto")  ); exit;
    }
    
    $nombre = sanitize_text_field($_POST['txtnombre']);
    $mensaje = sanitize_text_field($_POST['txtmensaje']);
    
    $SQL="INSERT INTO `tbl_contacto`(
            `id_contacto`,
            `creado`,
            `nombre`,
            `mensaje`
        )
        VALUES(null,NOW(),'$nombre','$mensaje');";

    global $wpdb;
    $wpdb->query($SQL);
    
    //enviar por correo
    
    //$wp_mail("ing.dave.jca@gmail.com","Formulario de contacto", "El usuario".$nombre."envió =>".$mensaje);
   
    //redirigir al usuario con un mensaje de éxito
    wp_redirect(add_query_arg( array('exito'=> 'Mensaje Enviado Exitosamente'),get_home_url()."/contacto")  ); exit;
  
}

add_action('admin_post_nopriv_contactform','capura_de_valores_del_formulario');
add_action('admin_post_contactform','capura_de_valores_del_formulario');



