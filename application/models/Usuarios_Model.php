<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuarios_Model extends CI_Model{
    
    public function salvar($usuario) {
        
        $this->db->insert("usuarios", $usuario);   
    }
    
    public function buscarDadosLogin($email, $senha) {
        
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }
}