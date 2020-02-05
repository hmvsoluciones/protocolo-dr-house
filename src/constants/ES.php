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

define("CATALOG_CLAVE_RUBRO", "Clave rubro");
define("CATALOG_CLAVE_ENTIDAD", "Clave entidad");
define("CATALOG_ESTATUS_REGISTRO", "Estatus registro");
define("CATALOG_DESCRIPCION", "Descripcion");
define("CATALOG_CLAVE_JUSTIFICADA", "ClaveJustificadaCATS");
define("CATALOG_CLASIFICADOR_NUMERICO_01", "Clasificador numerico 01");
define("CATALOG_CLASIFICADOR_NUMERICO_02", "Clasificador numerico 02");
define("CATALOG_CLASIFICADOR_ALFANUMERICO_01", "Clasificador alfanumerico 01");
define("CATALOG_CLASIFICADOR_ALFANUMERICO_02", "Clasificador alfanumerico 02");
define("CATALOG_OBSERVACIONES", "Observaciones");
define("CATALOG_USUARIO_ALTA", "Usuario alta");
define("CATALOG_FECHA_ALTA", "Fecha alta");
define("CATALOG_CLAVE_USUARIO_CAMBIO", "Clave usuario cambio");
define("CATALOG_FACHA_CAMBIO", "Fecha cambio");

define("CATALOG_TABLE_HEADER", array(
    "Modificar",
    CATALOG_CLAVE_RUBRO,
    CATALOG_CLAVE_ENTIDAD,
    CATALOG_DESCRIPCION,
    CATALOG_CLAVE_JUSTIFICADA,
    CATALOG_CLASIFICADOR_NUMERICO_01,
    CATALOG_CLASIFICADOR_NUMERICO_02,
    CATALOG_CLASIFICADOR_ALFANUMERICO_01,
    CATALOG_CLASIFICADOR_ALFANUMERICO_02,
    CATALOG_OBSERVACIONES,
    CATALOG_USUARIO_ALTA,
    CATALOG_FECHA_ALTA,
    CATALOG_CLAVE_USUARIO_CAMBIO,
    CATALOG_FACHA_CAMBIO,
    CATALOG_ESTATUS_REGISTRO
    ));

define("CATALOG_ADD_SUCCESS", "Catálogo agregado satisfactoriamente");
define("CATALOG_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
define("CATALOG_UPDATE_SUCCESS", "Catalogo modificado satisfactoriamente");
define("CATALOG_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");

//**********************************MEDICOS*************************************************************

define("HEALT_SECTOR_KEY_MAIN_TITLE", "CLAVE SECTOR SALUD");
//Modal titles
define("HEALT_SECTOR_KEY_MODAL_ADD_TITLE", "AGREGAR CLAVE SECTOR SALUD");
define("HEALT_SECTOR_KEY_MODAL_UPDATE_TITLE", "MODIFICAR CLAVE SECTOR SALUD");
//
////Form labels
define("HEALT_SECTOR_KEY", "Clave sector salud");
define("HEALT_SECTOR_KEY_PRESENTATION", "Presentación");
define("HEALT_SECTOR_KEY_PRESENTATION_QUANTITY", "Cantidad presentación");
define("HEALT_SECTOR_KEY_UM_QUANTITY", "Cantidad UM");
define("HEALT_SECTOR_KEY_MEASURE_QUANTITY", "Cantidad unidad de medida");
define("HEALT_SECTOR_KEY_FAMILY", "Familia");
define("HEALT_SECTOR_KEY_KEY_UNIT_MEASURE", "Clave unidad de medida");
define("HEALT_SECTOR_KEY_DESCRIPTION", "Descriopción");
//define("DOCTOR_LASTNAME2", "Apellido materno");
//define("DOCTOR_SPECIALITY_ITEM_KEY", "Clave rubro especialidad");
//define("DOCTOR_SPECIALITY_KEY", "Especialidad");
//define("DOCTOR_PHONE", "Telefono");
//define("DOCTOR_ADMISION_DATE", "Fecha de ingreso");
//define("DOCTOR_OBSERVATIONS", "Observaciones");
//define("DOCTOR_USER_REGISTRATION", "Usuario alta");
//define("DOCTOR_REGISTRATION_DATE", "Fecha de registro");
//
////Report headers
//define("DOCTOR_TABLE_HEADER", array("Modificar", DOCTOR_REGISTRATION, DOCTOR_STATE, DOCTOR_RFC, DOCTOR_CURP, DOCTOR_PROFESSIONAL_LICENSE, DOCTOR_NAME, DOCTOR_LASTNAME, DOCTOR_LASTNAME2, DOCTOR_SPECIALITY_ITEM_KEY, DOCTOR_SPECIALITY_KEY, DOCTOR_PHONE, DOCTOR_ADMISION_DATE, DOCTOR_OBSERVATIONS, DOCTOR_USER_REGISTRATION, DOCTOR_REGISTRATION_DATE));
//
//////Messages
//define("DOCTOR_ADD_SUCCESS", "Médico agregado satisfactoriamente");
//define("DOCTOR_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
//define("DOCTOR_UPDATE_SUCCESS", "Medico modificado satisfactoriamente");
//define("DOCTOR_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");

//**********************************CLAVE SECTOR SALUD*************************************************************

define("DOCTOR_MAIN_TITLE", "MEDICOS");
//Modal titles
define("DOCTOR_MODAL_ADD_TITLE", "AGREGAR MEDICO");
define("DOCTOR_MODAL_UPDATE_TITLE", "MODIFICAR MEDICO");

//Form labels
define("DOCTOR_REGISTRATION", "Matricula");
define("DOCTOR_STATE", "Status registro");
define("DOCTOR_RFC", "RFC");
define("DOCTOR_CURP", "CURP");
define("DOCTOR_PROFESSIONAL_LICENSE", "Cedula profesional");
define("DOCTOR_NAME", "Nombre");
define("DOCTOR_LASTNAME", "Apellido paterno");
define("DOCTOR_LASTNAME2", "Apellido materno");
define("DOCTOR_SPECIALITY_ITEM_KEY", "Clave rubro especialidad");
define("DOCTOR_SPECIALITY_KEY", "Especialidad");
define("DOCTOR_PHONE", "Telefono");
define("DOCTOR_ADMISION_DATE", "Fecha de ingreso");
define("DOCTOR_OBSERVATIONS", "Observaciones");
define("DOCTOR_USER_REGISTRATION", "Usuario alta");
define("DOCTOR_REGISTRATION_DATE", "Fecha de registro");

//Report headers
define("DOCTOR_TABLE_HEADER", array("Modificar", DOCTOR_REGISTRATION, DOCTOR_STATE, DOCTOR_RFC, DOCTOR_CURP, DOCTOR_PROFESSIONAL_LICENSE, DOCTOR_NAME, DOCTOR_LASTNAME, DOCTOR_LASTNAME2, DOCTOR_SPECIALITY_ITEM_KEY, DOCTOR_SPECIALITY_KEY, DOCTOR_PHONE, DOCTOR_ADMISION_DATE, DOCTOR_OBSERVATIONS, DOCTOR_USER_REGISTRATION, DOCTOR_REGISTRATION_DATE));

////Messages
define("DOCTOR_ADD_SUCCESS", "Médico agregado satisfactoriamente");
define("DOCTOR_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
define("DOCTOR_UPDATE_SUCCESS", "Medico modificado satisfactoriamente");
define("DOCTOR_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");
//**********************************MEDICAMENTOS*************************************************************

define("MEDICINES_MAIN_TITLE", "MEDICAMENTOS");
//Modal titles
define("MEDICINES_MODAL_ADD_TITLE", "AGREGAR MEDICAMENTO");
define("MEDICINES_MODAL_UPDATE_TITLE", "MODIFICAR MEDICAMENTO");
//
////Form labels
define("MEDICINES_KEY", "Clave medicamento");
define("MEDICINES_DESCRIPTION", "Descripción");
define("MEDICINES_STATE", "Estado");
define("MEDICINES_COMERCIAL_DESCRIPTION", "Descripción comercial");
define("MEDICINES_HEALT_SECTOR_KEY", "Clave sector salud");
define("MEDICINES_BARCODE_KEY", "Código de barras");
define("MEDICINES_GENERIC_KEY", "Clave genérico");
define("MEDICINES_CLASIFICATION", "Clasificación");
define("MEDICINES_THERAPEUTIC_AREA", "Área terapéutica");
define("MEDICINES_FAMILY", "Familia");
define("MEDICINES_PRESENTATION", "Presentación");
define("MEDICINES_PROVIDER", "Proveedor");
define("MEDICINES_UNIT_OF_MEASUREMENT", "Unidad de medida");
define("MEDICINES_COST", "Costo");
define("MEDICINES_VOLUME", "Volumen");
define("MEDICINES_WEIGHT", "Peso");
define("MEDICINES_OSMOLARITY", "Osmolaridad");
define("MEDICINES_DENSITY", "Densidad");
define("MEDICINES_CALORIES", "Calorias");
define("MEDICINES_CONCENTRATION", "Concentración");
define("MEDICINES_MAXIMUM_DOSE_KILOGRAM", "Dosis máxima kilográmo");
define("MEDICINES_MAXIMUM_DOSE_METER_2", "Dosis máxima metro 2");
define("MEDICINES_VALENCIA", "Valencia");
define("MEDICINES_CONFIGURATOR", "Configurador");
define("MEDICINES_SHOW_ONCO", "Muestra onco");
define("MEDICINES_SHOW_NPT", "Muestra NPT");
define("MEDICINES_SHOW_ANTI", "Muestra Anti");
define("MEDICINES_USER_REGISTRATION", "Usuario alta");
define("MEDICINES_REGISTRATION_DATE", "Fecha de registro");
define("MEDICINES_KEY_USER_MODIFY", "Clave usuario modificación");
define("MEDICINES_KEY_DATE_MODIFY", "Fecha de modificación");
//Report headers
define("MEDICINES_TABLE_HEADER", array("Modificar", 
    MEDICINES_KEY, 
    MEDICINES_DESCRIPTION, 
    MEDICINES_COMERCIAL_DESCRIPTION, 
    MEDICINES_HEALT_SECTOR_KEY, 
    MEDICINES_BARCODE_KEY,
    MEDICINES_GENERIC_KEY, 
    MEDICINES_CLASIFICATION, 
    MEDICINES_THERAPEUTIC_AREA, 
    MEDICINES_FAMILY, 
    MEDICINES_PRESENTATION, 
    MEDICINES_PROVIDER, 
    MEDICINES_UNIT_OF_MEASUREMENT,
    MEDICINES_COST, 
    MEDICINES_VOLUME, 
    MEDICINES_WEIGHT, 
    MEDICINES_OSMOLARITY, 
    MEDICINES_DENSITY, 
    MEDICINES_CALORIES, 
    MEDICINES_CONCENTRATION, 
    MEDICINES_MAXIMUM_DOSE_KILOGRAM,
    MEDICINES_MAXIMUM_DOSE_METER_2, 
    MEDICINES_VALENCIA, 
    MEDICINES_CONFIGURATOR, 
    MEDICINES_SHOW_ONCO, 
    MEDICINES_SHOW_NPT, 
    MEDICINES_SHOW_ANTI, 
    MEDICINES_USER_REGISTRATION, 
    MEDICINES_REGISTRATION_DATE)
);
//Messages
define("MEDICINES_ADD_SUCCESS", "Medicamento agregado satisfactoriamente");
define("MEDICINES_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
define("MEDICINES_UPDATE_SUCCESS", "Medicamento modificado satisfactoriamente");
define("MEDICINES_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");

//**********************************WAREHOUSES*************************************************************

define("WAREHOUSE_MAIN_TITLE", "ALMACÉN");
//Modal titles
define("WAREHOUSE_MODAL_ADD_TITLE", "AGREGAR ALMACÉN");
define("WAREHOUSE_MODAL_UPDATE_TITLE", "MODIFICAR ALMACÉN");
//
////Form labels
define("WAREHOUSES_KEY_WAREHOUSES", "Clave almacén");
define("WAREHOUSES_REAL_NAME", "Nombre Real");
define("WAREHOUSES_KEY_ACENDEP", "Clave acendep");
define("WAREHOUSES_TIP", "Tipo");
define("WAREHOUSES_KEY_RESPOSABLE", "Clave personal responsable");
define("WAREHOUSES_OBS", "Observaciones");
define("WAREHOUSES_KEY_USER_REGISTRY", "Usuario alta");
define("WAREHOUSES_DATE_REGISTRY", "Fecha de registro");
define("WAREHOUSES_KEY_USER_MODIFY", "Clave usuario modificación");
define("WAREHOUSES_KEY_DATE_MODIFY", "Fecha de modificación");
//
////Report headers
define("WAREHAUSES_TABLE_HEADER", array("Modificar",WAREHOUSES_KEY_WAREHOUSES, WAREHOUSES_REAL_NAME, WAREHOUSES_KEY_ACENDEP, WAREHOUSES_TIP, WAREHOUSES_KEY_RESPOSABLE, WAREHOUSES_OBS, WAREHOUSES_KEY_USER_REGISTRY, WAREHOUSES_DATE_REGISTRY, WAREHOUSES_KEY_USER_MODIFY, WAREHOUSES_KEY_DATE_MODIFY ));
//
//////Messages
define("WAREHOUSES_ADD_SUCCESS", "Almacén agregado satisfactoriamente");
define("WAREHOUSES_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
define("WAREHOUSES_UPDATE_SUCCESS", "Almacén modificado satisfactoriamente");
define("WAREHOUSES_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");

//**********************************GENERIC*************************************************************

define("GENERIC_MAIN_TITLE", "GENÉRICOS");
//Modal titles
define("GENERIC_MODAL_ADD_TITLE", "AGREGAR GENÉRICO");
define("GENERIC_MODAL_UPDATE_TITLE", "MODIFICAR GENÉRICO");
//
////Form labels
define("GENERIC_GENERIC_KEY", "Clave genérico");
define("GENERIC_NAME", "Nombre genérico");
define("GENERIC_SHORT_NAME", "Nombre corto");
define("GENERIC_TYPE", "Tipo Genérico");
define("GENERIC_CHANGE", "Genérico Intercambiable");
define("GENERIC_KEY_USER_REGISTRY", "Usuario alta");
define("GENERIC_DATE_REGISTRY", "Fecha de registro");
define("GENERIC_KEY_USER_MODIFY", "Clave usuario modificacion");
define("GENERIC_KEY_DATE_MODIFY", "Fecha de modificacion");
//

////Report headers
define("GENERIC_TABLE_HEADER", array("Modificar", GENERIC_GENERIC_KEY, GENERIC_NAME, GENERIC_SHORT_NAME, GENERIC_TYPE, GENERIC_CHANGE, GENERIC_KEY_USER_REGISTRY, GENERIC_DATE_REGISTRY, GENERIC_KEY_USER_MODIFY, GENERIC_KEY_DATE_MODIFY));
//
//////Messages
define("GENERIC_ADD_SUCCESS", "Genérico agregado satisfactoriamente");
define("GENERIC_ADD_ERROR", "No fue posible agregar el registro, favor de verificar");
define("GENERIC_UPDATE_SUCCESS", "Genérico modificado satisfactoriamente");
define("GENERIC_UPDATE_ERROR", "No fue posible modificar el registro, favor de verificar");

