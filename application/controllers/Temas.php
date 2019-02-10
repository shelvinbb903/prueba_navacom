<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
	Nota:
		Para renderizar cada vista, se uso una plantilla layouts/main, el cual tiene el menu y todo el diseño general para todas las demas vistas
*/
class Temas extends CI_Controller {

	/*
     	Tipo: Servicio Vista
     	Descripcion: Renderizar la vista del listado de temas.
  	*/
	public function Listado()
	{
		//Se carga el contenido de la vista en una variable para pasarlo a una plantilla
		$contenido = $this->load->view('temas/listado', array(), true);

		//Se renderiza la vista de la plantilla con el contenido
		$this->load->view('layouts/main', array("titulo" => "Lista de Temas", "content" => $contenido));
	}

	/*
     	Tipo: Servicio Vista
     	Descripcion: Renderizar la vista de Copiar o replicar los datos de un JSON externo a la base de datos.
  	*/
	public function Copiar()
	{
		//Se carga el contenido de la vista en una variable para pasarlo a una plantilla
		$contenido = $this->load->view('temas/replicar', array(), true);

		//Se renderiza la vista de la plantilla con el contenido
		$this->load->view('layouts/main', array("titulo" => "Copiar Datos", "content" => $contenido));
	}

	/*
     	Tipo: Servicio Vista
     	Descripcion: Renderizar la vista de ver los datos de un tema.
  	*/
	public function VerTema()
	{
		//Se carga el modelo a usar
		$this->load->model('Temas_model');

		//Se obtiene el id del tema seleccionado
		$id_seleccionado = $this->uri->segment(3);

		//Se consultan los datos del tema seleccionado
		$data_tema = $this->Temas_model->get_topic($id_seleccionado);
		
		if(count($data_tema) > 0){
			$data_tema = $data_tema[0];	
			$data_tema->created = date("Y-m-d", $data_tema->created);
		}

		//Se carga el contenido de la vista en una variable para pasarlo a una plantilla
		$contenido = $this->load->view('temas/datos', array("data_tema" => $data_tema), true);

		//Se renderiza la vista de la plantilla con el contenido
		$this->load->view('layouts/main', array("titulo" => "Datos Tema", "content" => $contenido));
	}
}
