<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuarios extends CI_Controller{
    
    public function novo() {
        
        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha"))
        );
        $this->load->database();
        $this->load->model("Usuarios_Model");
        $this->Usuarios_Model->salvar($usuario);
        $this->session->set_flashdata("success", "Usuário cadastrado com sucesso");
        redirect("/");
        
        
    }
}