<?php

interface LoginDao {

    
    public function login($usuarioObj);
    
    public function getRolesByUser($idUser);
    
    public function getMenusByRole($idRole);
    
    public function getSubMenusByIdMenu($idMenu);
    
    public function getAllRoles($language);      
    
    public function hasRole($idRole, $idUser);
    
    public function addRole($idRole, $idUser);
    
    public function removeRole($idRole, $idUser);
    
    public function updatePassword($idUser, $new);
    
    
}
