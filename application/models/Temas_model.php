<?php
   class Temas_model extends CI_Model {

      /*
         Tipo: Metodo
         Descripcion: Insertar registros en la tabla topic, los cuales vienen del JSON de datos externo.
      */
      public function insert_topic($datos){
         $this->db->insert('topic', $datos);      
      }

      /*
         Tipo: Metodo
         Descripcion: Listar todos los datos de la tabla topic.
      */
      public function all_topic(){
         $query = $this->db->get('topic')->result();
         return $query;
      }

      /*
         Tipo: Metodo
         Descripcion: Consultar los datos de un tema por su id
      */
      public function get_topic($id){
         $this->db->select('*');
         $this->db->from('topic');
         $this->db->where('id', $id); 
         $query = $this->db->get()->result();
         return $query;
      }

      /*
         Tipo: Metodo
         Descripcion: Actualizar todos los datos de un tema por su id
      */
      public function update_topic($datos)
      {
         $this->db->update('topic', $datos, array('id' => $datos['id']));
      }

   }
?>