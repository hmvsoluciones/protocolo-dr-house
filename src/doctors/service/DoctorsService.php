<?php

interface DoctorsService {
    
    public function getAllData();
    
    public function add($data);
    
    public function update($data);
    
    public function getById($id);    
}
