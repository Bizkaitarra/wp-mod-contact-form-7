<?php

/*
Plugin Name: Modificar datos de contact form 7
Description: Modifica los destinatarios de los formularios de contacto.
Version: 1.0.0
Author: Jon Gonzalez
Author URI: http://www.tudesarroladorweb.com
License: MIT License
License URI: http://opensource.org/licenses/MIT
Text Domain: wp-mod-contact-form-7

*/

function wp_contact_form_changes ($WPCF7_ContactForm) {
    //Obtención del objeto actual
    $cf = WPCF7_ContactForm::get_current();
    //Obtención de propiedades.
    $propiedades = $cf->get_properties();
    //Modificación de destinatario
    $propiedades["mail"]["recipient"] = 'miemail@domio.org';
    //Modificación del asunto
    $propiedades["mail"]["subject"] = 'Nuevo asunto';
    //Modificación del mensaje
    $propiedades["mail"]["body"] = 'Nuevo mensaje';
    //Establecer las propiedades en el objeto.
    $cf->set_properties($propiedades);
    //Devolver por constumbre el parámetro que se ha obtenido
    return $WPCF7_ContactForm;        
}
add_action("wpcf7_before_send_mail", "wp_contact_form_changes", 10, 1);