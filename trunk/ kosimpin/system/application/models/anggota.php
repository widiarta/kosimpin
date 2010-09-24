<?php
/**
 * Anggota a.k.a Member
 */
class Anggota extends Base_Model {

    function __construct()
    {
        parent::__construct();
        $this->init("anggota","id");
    }

    /**
     * Create new code number for anggota
     */
    function new_number()
    {
        
    }
}
?>
