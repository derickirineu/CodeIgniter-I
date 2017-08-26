<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Produtos_Model extends CI_Model{
    
    public function buscarTodos() {
        return $this->db->get("produtos")->result_array();       
    }
    

	public function salva($produto)
	{
		$this->db->insert("produtos", $produto);
	}
	
}