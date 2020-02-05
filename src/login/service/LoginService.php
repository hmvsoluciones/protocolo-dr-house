<?php

interface LoginService {
    
    public function login($user);
    
    public function getRolesByIdUser($idUser);
    
    public function getMenusByRole($idRole);
    
    public function getAllRoles($languague);
    
    public function setRole($idRole, $idUser);
    
}
