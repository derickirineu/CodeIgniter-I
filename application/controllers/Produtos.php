<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Produtos extends CI_Controller {

    public function index() {
        
        $this->load->model("Produtos_Model");
        
        $produtos = $this->Produtos_Model->buscarTodos();

        $dados = array("produtos" => $produtos);

        $this->load->helper(array("currency"));
        $this->load->view("produtos/index.php", $dados);
    }

    public function formulario()
    {
    	$this->load->view("produtos/formulario");
    }

    public function novo()
    {
    	$usuarioLogado = $this->session->userdata("usuario_logado");
    	$produto = array(

    		"nome" => $this->input->post("nome"),
    		"descricao" => $this->input->post("descricao"),
    		"preco" => $this->input->post("preco"),
    		"usuario_id" => $usuarioLogado['id']

    	);
    	$this->load->model("Produtos_Model");
    	$this->Produtos_Model->salva($produto);
    	$this->session->set_flashdata("success", "Produto salvo com sucesso");
    	redirect("/");

    }

}
