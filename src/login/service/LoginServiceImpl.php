<?php

class LoginServiceImpl implements LoginService {

    private $loginDao;

    public function __construct() {
        $this->loginDao = new LoginDaoImpl();
    }

    public function login($loginRequest) {
        return $this->loginDao->login($loginRequest);
    }

    public function getRolesByIdUser($idUser) {
        return $this->loginDao->getRolesByUser($idUser);
    }

    public function getMenusByRole($idRole) {
        return $this->loginDao->getMenusByRole($idRole);
    }

    public function getSubMenusByIdMenu($idMenu) {
        return $this->loginDao->getSubMenusByIdMenu($idMenu);
    }

    public function getAllRoles($language) {
        return $this->loginDao->getAllRoles($language);
    }
    
    public function setRole($idRole, $idUser) {
        if($this->loginDao->hasRole($idRole, $idUser)){
            if($this->loginDao->removeRole($idRole, $idUser)){
                return 2;
            } else {
                return 3;
            }
        } else {
            if($this->loginDao->addRole($idRole, $idUser)){
                return 1;
            } else {
                return 4;
            }
        }
    }

}
