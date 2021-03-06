<?php

class UserServiceImpl implements UserService {

    private $userDao;
    private $loginDao;
    private $binnacleDao;

    public function __construct() {
        $this->userDao = new UserDaoImpl();
        $this->loginDao = new LoginDaoImpl();
        $this->binnacleDao = new BinnacleDaoImpl();
    }

    public function getUsers() {

        return $this->userDao->getUsers();
    }

    public function add($user) {
        $addUser = $this->userDao->add($user);
                
        if($addUser){
            $binnacleData['referenceId'] = $addUser;
            $binnacleData['tableCatalogKey'] = 1;
            $binnacleData['tableDomain'] = "CAT_TABLES";
            $binnacleData['operationCatalogKey'] = 1;
            $binnacleData['operationDomain'] = "CAT_CRUD";

            $binnacleData['lastValue'] = json_encode($this->userDao->getUserById($addUser));
            $binnacleData['idUser'] = $_SESSION['user']['IDUSER'];
            
            $this->binnacleDao->add($binnacleData);
            
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {
         try {

            $binnacleData['referenceId'] = $data['idUser'];
            $binnacleData['tableCatalogKey'] = 1;
            $binnacleData['tableDomain'] = "CAT_TABLES";
            $binnacleData['operationCatalogKey'] = 3;
            $binnacleData['operationDomain'] = "CAT_CRUD";

            $binnacleData['lastValue'] = json_encode($this->userDao->getUserById($data['idUser']));
            $binnacleData['idUser'] = $_SESSION['user']['IDUSER'];


            if ($this->binnacleDao->add($binnacleData) && $this->userDao->update($data)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
        
    }

    public function getUserById($idUser) {
        return $this->userDao->getUserById($idUser);
    }

    public function getUserByUser($user) {
        return $this->userDao->getUserByUser($user);
    }

    public function resetPassword($idUser, $password) {

        $loginRequest = new LoginRequest();
        $loginRequest->setUser($_SESSION['user']['USER']);
        $loginRequest->setPassword($password);


        $login = $this->loginDao->login($loginRequest);

        if ($login) {
            return $this->userDao->resetPasswordUser($idUser);
        } else {
            return FALSE;
        }
    }

    public function updatePassword($current, $new, $confirm) {
        $loginRequest = new LoginRequest();
        $loginRequest->setUser($_SESSION['user']['USER']);
        $loginRequest->setPassword($current);
        $idUser = $_SESSION['user']['IDUSER'];

      
        if ($new != $confirm) {
            //confirmacion no valida
            return 2;
        } else if (!empty($current) && !empty($new) && !empty($confirm)) {
            if ($this->loginDao->login($loginRequest)) {
                if ($this->loginDao->updatePassword($idUser, $new)) {
                    return 1;
                } else {
                    return 4;
                }
            } else {
                //usuario no valido
                return 3;
            }
        } else {
            return 5;
        }
    }

}
