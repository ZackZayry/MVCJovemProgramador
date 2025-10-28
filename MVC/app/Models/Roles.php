<?php

namespace App\Models;


use App\Core\Model;
/**
* create table user_roles(
* id_user_roles int auto_increment primary key,
* role_description varchar(10) not null
* );
*/
class Roles extends Model{
    protected $db;
    protected $table = "user_role";
    protected $id = "id_user_roles";

    public function __construct(){
        parent::__construct();
    }

    public function getUserRoles(int $userId){
        $query = "SELECT * FROM $this->table WHERE usuario_id_usuario = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll();        
    } 

}