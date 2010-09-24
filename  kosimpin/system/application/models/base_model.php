<?php
/**
 * Database CRUD Model
 */
class Base_model extends Model {

    var $table_name;
    var $field_id;

    function __construct($table_name,$id_field)
    {
        parent::Model();
        $this->table_name = $table_name;
        $this->field_id = $id_field;

    }

    function save($data)
    {
        $this->db->insert($this->table_name,$data);
    }

    function delete($id)
    {
        $where = array("$this->field_id"=>$id);
        $this->db->delete($this->table_name,$where);
    }

    /**
     * 
     * @param int $id
     * @return resultset
     */
    function get_by_id($id)
    {
        $where = array("$this->field_id"=>$id);
        $this->db->select("*")
                 ->from($this->table_name)
                 ->where($where);
        $rec = $this->db->get();

        if($rec->num_rows()>0)
        {
            return $rec->result();
        }

        return FALSE;
    }

    /**
     *
     * @param Object $data
     * @param int $id
     */
    function update($data,$id)
    {
        $where = array("$this->field_id"=>$id);
        $this->db->where($where);
        $this->db->update($this->table_name,$data);
    }
}
?>
