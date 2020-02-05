<?php

interface UserService {
    
    public function getUsers();
    
    public function add($user);
    
    public function getUserById($idUser);
    
    public function getUserByUser($user);
    
    public function resetPassword($idUser, $password);
    
    public function updatePassword($current, $new, $confirm);
    
}
