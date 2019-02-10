<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class TemasService extends CI_Controller {

	/*
     	Tipo: Servicio
     	Descripcion: Obtener los datos del JSON para insertarlos o actualizarlos (si ya existen) en la base de datos.
  	*/
	public function GuardarDatos()
	{
		//Se carga el modelo a usar
		$this->load->model('Temas_model');

		//Se obtienen los datos que se pasan mediante el metodos POST
		$datos = $_POST["jsonData"];
		$datos = json_decode($datos);

		//Se iteran
		foreach ($datos as $key => $value) {
			//Se obtienen los datos, que estan bajo el atributo data en cada posicion del JSON
			$data = $value->data;

			//Se consulta en la base de datos la existencia del tema por su id
			$data_tema = $this->Temas_model->get_topic($data->id);

			//Se generan los datos a enviar al metodo en el modelo
			$array_atributos = array(
				"id" => $data->id,
				"title" => $data->title,
				"display_name" => $data->display_name,
				"display_name_prefixed" => $data->display_name_prefixed,
				"banner_img" => $data->banner_img,
				"header_img" => $data->header_img,
				"public_description_html" => $data->public_description_html,
				"public_description" => $data->public_description,
				"submit_text_html" => $data->submit_text_html,
				"description_html" => $data->description_html,
				"description" => $data->description,
				"submit_text" => $data->submit_text,
				"community_icon" => $data->community_icon,
				"show_media" => $data->show_media,
				"banner_background_image" => $data->banner_background_image,
				"banner_background_color" => $data->banner_background_color,
				"icon_img" => $data->icon_img,
				"over18" => $data->over18,
				"created" => $data->created,
				"allow_videos" => $data->allow_videos,
				"spoilers_enabled" => $data->spoilers_enabled,
				"primary_color" => $data->primary_color,
				"subscribers" => $data->subscribers,
				"submit_text_label" => $data->submit_text_label,
				"lang" => $data->lang,
				"key_color" => $data->key_color,
				"name" => $data->name,
				"url" => $data->url,
				"emojis_enabled" => $data->emojis_enabled,
				"allow_images" => $data->allow_images,
				"advertiser_category" => $data->advertiser_category
			);
			
			//Si el id del tema iterado no existe en la base de datos se registra
			if(count($data_tema) == 0){							
				$this->Temas_model->insert_topic($array_atributos);
			}else{
				//Si el id del tema iterado no existe en la base de datos se actualiza
				$this->Temas_model->update_topic($array_atributos);
			}
		}
	}

	/*
     	Tipo: Servicio
     	Descripcion: Obtener los datos de todos los temas registrados en la base de datos.
  	*/
	public function ObtenerDatos()
	{
		//Se carga el modelo a usar
		$this->load->model('Temas_model');

		//Se consultan todos los temas
		$data_temas = $this->Temas_model->all_topic();

		//Se iteran los temas para convertir la fecha a formato año-mes-dia
		foreach ($data_temas as $key => $value) {
			//Se cambia el formato de la fecha y se asigna a un atributo del json
			$value->created = date("Y-m-d", $value->created);
		}
		
		//Se genera la respuesta
		echo json_encode($data_temas);
	}

	/*
     	Tipo: Servicio
     	Descripcion: Obtener los datos de un tema en especifico.
  	*/
	public function ObtenerTema()
	{
		//Se carga el modelo a usar
		$this->load->model('Temas_model');

		//Se obtiene el id del tema seleccionado
		$id_tema_seleccionado = $_POST["id"];

		//Se consultan los datos del tema por el id
		$data_tema = $this->Temas_model->get_topic($id_tema_seleccionado);
		
		if(count($data_tema) > 0){
			$data_tema = $data_tema[0];	
		}

		//Se genera la respuesta
		echo json_encode($data_tema);
	}
}
