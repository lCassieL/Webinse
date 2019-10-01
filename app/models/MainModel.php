<?php

class MainModel extends Model{
    
    public function getPersons(){
        if($this->db->connect_errno===0){
            $query = 'select * from persons';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function deletePerson($id){
        if($this->db->connect_errno === 0){
            $query = 'delete from persons where id ='.$id;
            $this->db->query($query);
        }
    }

    public function addPerson($name, $surname, $email){
        if($this->db->connect_errno === 0){
            $query = 'insert into persons (name, surname, email) values("'.$name.'","'.$surname.'","'.$email.'")';
            $this->db->query($query);
        }
    }

    public function updatePerson($id, $name, $surname, $email){
        if($this->db->connect_errno === 0){
            $query = 'update persons set name="'.$name.'", surname="'.$surname.'", email="'.$email.'" where id ='.$id;
            $this->db->query($query);
        }   
    }

}