<?php

interface UserDao {
 
    public function getUsers();
    
    public function add($user);
    
    public function getUserById($idUser);
    
    public function getUserByUser($user);
    
    public function resetPasswordUser($idUser);
           
}
