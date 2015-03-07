<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
* 
* Author: Josue Ibarra
*         @josuetijuana
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Spanish language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'Este formulario no pasa las pruebas de seguridad.';

// Login
$lang['login_heading']         = 'Ingresar';
$lang['login_subheading']      = 'Por favor, introduce tu email/usuario y contraseña.';
$lang['login_identity_label']  = 'Email:';
$lang['login_password_label']  = 'Contraseña:';
$lang['login_remember_label']  = 'Recuérdame:';
$lang['login_submit_btn']      = 'Ingresar';
$lang['login_forgot_password'] = '¿Has olvidado tu contraseña?';

// Index
$lang['index_heading']           = 'Usuarios';
$lang['index_subheading']        = 'Debajo está la lista de usuarios.';
$lang['index_fname_th']          = 'Nombre';
$lang['index_lname_th']          = 'Apellidos';
$lang['index_phone_th']          = 'Teléfono';
$lang['index_cedula_th']         = 'Cédula';
$lang['index_direccion_th']      = 'Dirección';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Grupos';
$lang['index_status_th']         = 'Estado';
$lang['index_action_th']         = 'Acción';
$lang['index_active_link']       = 'Activo';
$lang['index_inactive_link']     = 'Inactivo';
$lang['index_create_user_link']  = 'Crear nuevo usuario';
$lang['index_create_group_link'] = 'Crear nuevo grupo';

// Deactivate User
$lang['deactivate_heading']                  = 'Desactivar usuario';
$lang['deactivate_subheading']               = '¿Está seguro que quiere desactivar al usuario \'%s  %s\'';
$lang['deactivate_confirm_y_label']          = 'Sí:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Enviar';
$lang['deactivate_validation_confirm_label'] = 'confirmación';
$lang['deactivate_validation_user_id_label'] = 'ID de usuario';

// Activate User
$lang['activate_heading']                  = 'Activar usuario';
$lang['activate_subheading']               = '¿Está seguro que quiere Activar al usuario';
$lang['activate_confirm_y_label']          = 'Sí:';
$lang['activate_confirm_n_label']          = 'No:';
$lang['activate_submit_btn']               = 'Enviar';
$lang['activate_validation_confirm_label'] = 'confirmación';
$lang['activate_validation_user_id_label'] = 'ID de usuario';



// Create User
$lang['create_user_heading']                           = 'Crear Usuario';
$lang['create_user_subheading']                        = 'Por favor, introduzca la información del usuario.';
$lang['create_user_fname_label']                       = 'Nombres:';
$lang['create_user_lname_label']                       = 'Apellidos:';
$lang['create_user_cedula_label']                      = 'Cédula:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Teléfono:';
$lang['create_user_codtarjeta_label']                  = 'Código Sim:';
$lang['create_user_direccion_label']                   = 'Dirección:';
$lang['create_user_nombre_enfermedad_label']           = 'Enfermedad:';
$lang['create_user_alergia_label']                     = 'Alergias:';
$lang['create_user_medicamento_label']                 = 'Medicamentos:';
$lang['create_user_tiposangre_label']                  = 'Tipo de Sangre:';
$lang['create_user_peso_label']                        = 'Peso:';
$lang['create_user_discapacidad_label']                = 'Discapacidad:';
$lang['create_user_genero_label']                      = 'Género:';
$lang['create_user_fnacimiento_label']                 = 'Fecha de Nacimiento:';
$lang['create_user_nomcontacto_label']                 = 'Contacto:';
$lang['create_user_phonecontacto_label']               = 'Num. del Contacto:';
$lang['create_user_password_label']                    = 'Contraseña:';
$lang['create_user_password_confirm_label']            = 'Confirmar contraseña:';
$lang['create_user_submit_btn']                        = 'Crear Usuario';

$lang['create_user_validation_fname_label']            = 'Nombre';
$lang['create_user_validation_lname_label']            = 'Apellidos';
$lang['create_user_validation_email_label']            = 'Correo electrónico';
$lang['create_user_validation_phone1_label']           = 'Primera parte del número de teléfono';
$lang['create_user_validation_phone2_label']           = 'Segunda parte del número de teléfono';
$lang['create_user_validation_phone3_label']           = 'Tercera parte del número de teléfono';
$lang['create_user_validation_cedula_label']           = 'Num de la Cédula';
$lang['create_user_validation_direccion_label']        = 'Dirección';
$lang['create_user_validation_nombre_enfermedad_label']= 'Enfermedad';
$lang['create_user_validation_medicamento_label']      = 'Medicamento';
$lang['create_user_validation_alergia_label']          = 'Alergia';
$lang['create_user_validation_tiposangre_label']       = 'Tipo de Sangre';
$lang['create_user_validation_nomcontacto_label']      = 'Contacto';
$lang['create_user_validation_peso_label']             = 'Peso';
$lang['create_user_validation_discapacidad_label']     = 'Discapacidad';
$lang['create_user_validation_genero_label']           = 'Genero';
$lang['create_user_validation_phonecontacto_label']    = 'Num. del Contacto';
$lang['create_user_validation_password_label']         = 'Contraseña';
$lang['create_user_validation_password_confirm_label'] = 'Confirmación de contraseña';

// Edit User
$lang['edit_user_heading']                           = 'Editar Usuario';
$lang['edit_user_subheading']                        = 'Por favor introduzca la nueva información del usuario.';
$lang['edit_user_fname_label']                       = 'Nombre:';
$lang['edit_user_lname_label']                       = 'Apellidos:';
$lang['edit_user_cedula_label']                      = 'Cédula:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Teléfono:';
$lang['edit_user_codtarjeta_label']                  = 'Código Sim:';
$lang['edit_user_direccion_label']                   = 'Dirección:';
$lang['edit_user_nombre_enfermedad_label']           = 'Enfermedad:';
$lang['edit_user_medicamento_label']                 = 'Medicamento:';
$lang['edit_user_alergia_label']                     = 'Alergia:';
$lang['edit_user_fnacimiento_label']                 = 'Fecha de Nacimiento:';
$lang['edit_user_tiposangre_label']                  = 'Tipo de Sangre:';
$lang['edit_user_nomcontacto_label']                 = 'Contacto:';
$lang['edit_user_phonecontacto_label']               = 'Teléfono del Contacto:';
$lang['edit_user_peso_label']                        = 'Peso:';
$lang['edit_user_discapacidad_label']                = 'Discapacidad:';
$lang['edit_user_genero_label']                      = 'Genero:';
$lang['edit_user_password_label']                    = 'Contraseña: (si quieres cambiarla)';
$lang['edit_user_password_confirm_label']            = 'Confirmar contraseña: (si quieres cambiarla)';
$lang['edit_user_groups_heading']                    = 'Miembro de grupos';
$lang['edit_user_submit_btn']                        = 'Guardar Usuario';
$lang['edit_user_validation_fname_label']            = 'Nombre';
$lang['edit_user_validation_lname_label']            = 'Apellidos';
$lang['edit_user_validation_email_label']            = 'Correo electrónico';
$lang['edit_user_validation_phone1_label']           = 'Primera parte del número de teléfono';
$lang['edit_user_validation_phone2_label']           = 'Segunda parte del número de teléfono';
$lang['edit_user_validation_phone3_label']           = 'Tercera parte del número de teléfono';
$lang['edit_user_validation_cedula_label']           = 'Cédula';
$lang['edit_user_validation_direccion_label']        = 'Dirección';
$lang['edit_user_validation_tiposangre_label']       = 'Tipo de Sangre';
$lang['edit_user_validation_nomcontacto_label']      = 'Contacto';
$lang['edit_user_validation_phonecontacto_label']    = 'Teléfono del Contacto:';

$lang['edit_user_validation_groups_label']           = 'Grupos';
$lang['edit_user_validation_password_label']         = 'Contraseña';
$lang['edit_user_validation_password_confirm_label'] = 'Confirmación de contraseña';

// Create Group
$lang['create_group_title']                  = 'Crear Grupo';
$lang['create_group_heading']                = 'Crear Grupo';
$lang['create_group_subheading']             = 'Por favor introduzca la información del grupo.';
$lang['create_group_name_label']             = 'Nombre de Grupo:';
$lang['create_group_desc_label']             = 'Descripción:';
$lang['create_group_submit_btn']             = 'Crear Grupo';
$lang['create_group_validation_name_label']  = 'Nombre de Grupo';
$lang['create_group_validation_desc_label']  = 'Descripcion';

// Edit Group
$lang['edit_group_title']                  = 'Editar Grupo';
$lang['edit_group_saved']                  = 'Grupo Guardado';
$lang['edit_group_heading']                = 'Editar Grupo';
$lang['edit_group_subheading']             = 'Por favor, registre la información del grupo.';
$lang['edit_group_name_label']             = 'Nombre de Grupo:';
$lang['edit_group_desc_label']             = 'Descripción:';
$lang['edit_group_submit_btn']             = 'Guardar Grupo';
$lang['edit_group_validation_name_label']  = 'Nombre de Grupo';
$lang['edit_group_validation_desc_label']  = 'Descripción';

// Change Password
$lang['change_password_heading']                               = 'Cambiar Contraseña';
$lang['change_password_old_password_label']                    = 'Antigua Contraseña:';
$lang['change_password_new_password_label']                    = 'Nueva Contraseña (de al menos %s caracteres de longitud):';
$lang['change_password_new_password_confirm_label']            = 'Confirmar Nueva Contraseña:';
$lang['change_password_submit_btn']                            = 'Cambiar';
$lang['change_password_validation_old_password_label']         = 'Antigua Contraseña';
$lang['change_password_validation_new_password_label']         = 'Nueva Contraseña';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirmar Nueva Contraseña';

// Forgot Password
$lang['forgot_password_heading']                 = 'He olvidado mi Contraseña';
$lang['forgot_password_subheading']              = 'Por favor, introduce tu %s para que podamos enviarte un email para restablecer tu contraseña.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Enviar';
$lang['forgot_password_validation_email_label']  = 'Correo Electrónico';
$lang['forgot_password_username_identity_label'] = 'Usuario';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'El correo electrónico no existe.';

// Reset Password
$lang['reset_password_heading']                               = 'Cambiar Contraseña';
$lang['reset_password_new_password_label']                    = 'Nueva Contraseña (de al menos %s caracteres de longitud):';
$lang['reset_password_new_password_confirm_label']            = 'Confirmar Nueva Contraseña:';
$lang['reset_password_submit_btn']                            = 'Guardar';
$lang['reset_password_validation_new_password_label']         = 'Nueva Contraseña';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirmar Nueva Contraseña';

// Activation Email
$lang['email_activate_heading']    = 'Activar cuenta por %s';
$lang['email_activate_subheading'] = 'Por favor ingresa en este link para %s.';
$lang['email_activate_link']       = 'activar tu cuenta';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Reestablecer contraseña para %s';
$lang['email_forgot_password_subheading'] = 'Por favor ingresa en este link para %s.';
$lang['email_forgot_password_link']       = 'Restablecer Tu Contraseña';

// New Password Email
$lang['email_new_password_heading']    = 'Nueva contraseña para %s';
$lang['email_new_password_subheading'] = 'Tu contraseña ha sido restablecida a: %s';
