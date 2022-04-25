<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobre extends CI_Controller {

	public function index()
	{   
        
		$this->load->admTemplate('navbar');
	}

	public function participantes()
	{
		$this->load->standardTemplate('participantes');
	}

	public function numero($numero)
	{	
		$dados = array('numero' => $numero);
		$this->load->admTemplate('numero', $dados);
	}
}
