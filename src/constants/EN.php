<?php
//System
define("COMPANY_NAME", "Company");
define("SYSTEM_NAME", "System name");
define("SYSTEM_VERSION", "1.0.0");
define("TEMP_PASSWORD", "temporal");


//Generic labels
define("WELCOME_MESSAGE", "Welcome");

define("SELECT_EMPTY_VALUE", "-SELECCIONE-");
define("SELECT_STATE_ACTIVE", "Active");
define("SELECT_STATE_INACTIVE", "Inactive");

/* define("BUTTON_ACEPT","Aceptar");
  define("BUTTON_SAVE","Guardar"); */

//**********************************USERS*************************************************************

define("USER_MAIN_TITLE", "USERS");
//Modal titles
define("USER_MODAL_ADD_TITLE", "ADD USER");
define("USER_MODAL_UPDATE_TITLE", "MODIFY USER");
define("USER_MODAL_RESET_PASSWORD", "CURRENT PASSWORD");
define("USER_MODAL_ROLES", "ROLES");
define("USER_MODAL_CHANGE_PASSWORD", "CHANGE PASSWORD");

//Change password 
define("USER_CURRENT_PASSWORD", "Current password");
define("USER_NEW_PASSWORD", "New password");
define("USER_CONFIRM_NEW_PASSWORD", "confirm new password");

//Form labels
define("USER_NAME", "Name");
define("USER_LAST_NAME", "Last name");
define("USER_LAST_NAME2", "Last name 2");
define("USER_MAIL", "Mail");
define("USER_USER", "User");
define("USER_STATE", "State");
define("USER_PASSWORD", "Passwod");


//Report headers
define("USER_TABLE_HEADER", array(USER_NAME, USER_MAIL, USER_USER, USER_STATE, "Reset Password", "Modify", "Roles"));

//Messages
define("USER_ADD_SUCCESS", "User successfully added");
define("USER_ADD_ERROR", "Can't add user, please verify again");
define("USER_UPDATE_SUCCESS", "User successfully updated");
define("USER_UPDATE_ERROR", "Can't update user, please verify again");
define("USER_RESET_PASSWORD_SUCCESS", "Password reset");
define("USER_RESET_PASSWORD_ERROR", "Can't reset password");
define("USER_SET_ROLE_SUCCESS", "Role successfully added");
define("USER_UNSET_ROLE_SUCCESS", "Role disabled");
define("USER_SET_ROLE_ERROR", "Roles setted");
define("USER_NOT_VALID", "The user is already registered");
define("USER_UPDATE_PASSWORD_SUCCESS", "Password successfully updated");
define("USER_UPDATE_PASSWORD_NOT_VALID_CONFIRM", "Not valid confirmation");
define("USER_UPDATE_PASSWORD_NOT_VALID_USER", "Invalid user");
define("USER_UPDATE_PASSWORD_ERROR", "Can't update password");

//**********************************CATALOGS*************************************************************

define("CATALOG_MAIN_TITLE", "CATALOGS");
//Modal titles
define("CATALOG_MODAL_ADD_TITLE", "ADD CATALOG");
define("CATALOG_MODAL_UPDATE_TITLE", "UPDATE CATALOG");
//form labels

define("CATALOG_DOMAIN", "Domain");
define("CATALOG_KEY", "ID");
define("CATALOG_VALUEES", "Spanish value");
define("CATALOG_VALUEEN", "English value");
define("CATALOG_ORDER", "Order");
define("CATALOG_DESCRIPTION", "Descriptión");
define("CATALOG_STATE", "Status");

define("CATALOG_TABLE_HEADER", array(
    "Update",
    CATALOG_KEY,
    CATALOG_VALUEES,
    CATALOG_VALUEEN,
    CATALOG_ORDER,
    CATALOG_DESCRIPTION,
    CATALOG_STATE
    ));

define("CATALOG_ADD_SUCCESS", "Catalog successfully added");
define("CATALOG_ADD_ERROR", "Can't add catalog item");
define("CATALOG_UPDATE_SUCCESS", "Catalog successfully updated");
define("CATALOG_UPDATE_ERROR", "Can't update catalog, please verify again");
