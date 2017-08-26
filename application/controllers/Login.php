<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller{
    
    public function autenticar(){
        
        $this->load->model("Usuarios_Model");
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        $usuario = $this->Usuarios_Model->buscarDadosLogin($email, $senha);
        
        if($usuario){
            $this->session->set_userdata("usuario_logado" , $usuario);
            $this->session->set_flashdata('success', 'Logado com sucesso');
            
        }else{
            $this->session->set_flashdata('danger', 'Usuário ou senha inválida');
        }
        
        redirect('/');
    }
    
    public function logout(){
        
        $this->session->unset_userdata("usuario_logado");
        $this->session->set_flashdata('success', 'Deslogado com sucesso');
        
        redirect('/');
    }
}