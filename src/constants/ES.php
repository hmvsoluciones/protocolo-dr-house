<?php

//System
define("COMPANY_NAME", "Empresa");
define("SYSTEM_NAME", "Nombre sistema");
define("SYSTEM_VERSION", "1.0.0");
define("TEMP_PASSWORD", "temporal");


//Generic labels
define("WELCOME_MESSAGE", "Bienvenido");

define("SELECT_EMPTY_VALUE", "-SELECCIONE-");
define("SELECT_STATE_ACTIVE", "Activo");
define("SELECT_STATE_INACTIVE", "Inactivo");

//**********************************USERS*************************************************************

define("USER_MAIN_TITLE", "USUARIOS");
//Modal titles
define("USER_MODAL_ADD_TITLE", "AGREGAR USUARIO");
define("USER_MODAL_UPDATE_TITLE", "MODIFICAR USUARIO");
define("USER_MODAL_RESET_PASSWORD", "INGRESE SU PASSWORD");
define("USER_MODAL_ROLES", "ROLES");
define("USER_MODAL_CHANGE_PASSWORD", "MODIFICAR PASSWORD");

//Change password 
define("USER_CURRENT_PASSWORD", "Password actual");
define("USER_NEW_PASSWORD", "Nuevo password");
define("USER_CONFIRM_NEW_PASSWORD", "Confirmar nuevo password");

//Form labels
define("USER_NAME", "Nombre");
define("USER_LAST_NAME", "Apellido paterno");
define("USER_LAST_NAME2", "Apellido materno");
define("USER_MAIL", "Correo");
define("USER_USER", "Usuario");
define("USER_STATE", "Estado");
define("USER_PASSWORD", "Contraseña");


//Report headers
define("USER_TABLE_HEADER", array("Resetear Password", "Modificar", "Roles", USER_NAME, USER_MAIL, USER_USER, USER_STATE));

//Messages
define("USER_ADD_SUCCESS", "Usuario agregado satisfactoriamente");
define("USER_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
define("USER_UPDATE_SUCCESS", "Usuario modificado satisfactoriamente");
define("USER_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");
define("USER_RESET_PASSWORD_SUCCESS", "Password reiniciado correctamenta");
define("USER_RESET_PASSWORD_ERROR", "No fue posible resetar el password");
define("USER_SET_ROLE_SUCCESS", "Rol agregado correctamente");
define("USER_UNSET_ROLE_SUCCESS", "Rol inhabilitado correctamente");
define("USER_SET_ROLE_ERROR", "No fue posible modificar el rol");
define("USER_NOT_VALID", "El usuario ya se encuentra registrado");
define("USER_UPDATE_PASSWORD_SUCCESS", "Password actualizado correctamente");
define("USER_UPDATE_PASSWORD_NOT_VALID_CONFIRM", "Confirmación de nuevo password no válida");
define("USER_UPDATE_PASSWORD_NOT_VALID_USER", "Usuario no valido");
define("USER_UPDATE_PASSWORD_ERROR", "No fue posible actualizar el password");

//**********************************CATALOGS*************************************************************

define("CATALOG_MAIN_TITLE", "CATALOGOS");
//Modal titles
define("CATALOG_MODAL_ADD_TITLE", "AGREGAR CATALOGO");
define("CATALOG_MODAL_UPDATE_TITLE", "MODIFICAR CATALOGO");
//form labels

define("CATALOG_DOMAIN", "Dominio");
define("CATALOG_KEY", "ID");
define("CATALOG_VALUEES", "Valor español");
define("CATALOG_VALUEEN", "Valor inglés");
define("CATALOG_ORDER", "Orden");
define("CATALOG_DESCRIPTION", "Descripción");
define("CATALOG_STATE", "Estatus");

define("CATALOG_TABLE_HEADER", array(
    "Modificar",
    CATALOG_KEY,
    CATALOG_VALUEES,
    CATALOG_VALUEEN,
    CATALOG_ORDER,
    CATALOG_DESCRIPTION,
    CATALOG_STATE
    ));

define("CATALOG_ADD_SUCCESS", "Catálogo agregado satisfactoriamente");
define("CATALOG_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
define("CATALOG_UPDATE_SUCCESS", "Catalogo modificado satisfactoriamente");
define("CATALOG_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");

