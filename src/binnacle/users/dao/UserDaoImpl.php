<?php

class UserDaoImpl extends Connection implements UserDao {

    private $util;

    function LoginDaoImpl() {
        $this->util = new UtilImpl();
    }

    public function getUsers() {

        $query = "SELECT IDUSER, NAME, LASTNAME, LASTNAME2, USER, MAIL, STATE FROM admuser";

        $json = $this->getAll($query);

        return $json;
    }

    public function add($user) {

        //$temporal = $this->util->encrypt(TEMP_PASSWORD);

        $temporal = "Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==";

        $query = "INSERT INTO admuser(NAME, LASTNAME, LASTNAME2, MAIL, USER, CREDENTIAL,  STATE) "
                . " VALUES('{$user['name']}', '{$user['lastName']}', '{$user['lastName2']}', '{$user['mail']}', '{$user['user']}', '{$temporal}', 1)";

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }
     public function update($user) {     
        
        $query = "UPDATE admuser SET NAME='{$user['name']}', LASTNAME='{$user['lastName']}', LASTNAME2='{$user['lastName2']}', MAIL='{$user['mail']}', STATE={$user['state']}, user='{$user['user']}' "
                . " WHERE  IDUSER = {$user['idUser']}";                

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($idUser) {
        $query = "SELECT IDUSER, NAME, LASTNAME, LASTNAME2, MAIL, USER, STATE FROM admuser WHERE IDUSER = {$idUser}";
                
        return $this->getRow($query);
    }
    
    public function getUserByUser($user) {
        $query = "SELECT IDUSER, NAME, LASTNAME, LASTNAME2, MAIL, USER, STATE FROM admuser WHERE USER LIKE '{$user}'";
                
        return $this->getRow($query);
    }

    public function resetPasswordUser($idUser) {
        
        $temporal = "Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==";
        
         $query = "UPDATE admuser SET CREDENTIAL = '{$temporal}' "
                . " WHERE  IDUSER = {$idUser}";                

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

}
