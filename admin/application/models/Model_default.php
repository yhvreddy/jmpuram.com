<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_default extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    //insert new data to table
    public function insertdata($tablename,$insertdata){
        $this->db->insert($tablename,$insertdata);
        $return = $this->db->affected_rows();
        return $return;
    }
    
    //insert new data to table get last insert id
    public function insertid($tablename,$insertdata){
        $this->db->insert($tablename,$insertdata);
        $return = $this->db->insert_id();
        return $return;
    }

    //rows count
    public function rowcount($tablename){
        $this->db->select('*');
        $this->db->from($tablename);
        $returndata = $this->db->get();
        $num = $returndata->num_rows();
        return $num;
    }

    //rows count with conduction
    public function rowcountcondition($tablename,$conduction){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where($conduction);
        $returndata = $this->db->get();
        $num = $returndata->num_rows();
        return $num;
    }

    //select data all
    public function select($tablename){
        $this->db->select('*');
        $this->db->from($tablename);
        $returndata = $this->db->get();
        return $returndata->result();
    }
    
    public function selectdata($tablename,$conduction=NULL){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where($conduction);
        $returndata = $this->db->get();
        return $returndata->result();
    }

    //maual select
    public function manualselect($query){
        $dataquery = $this->db->query($query);
        $result = $dataquery->result();
        return $result;
    }

    //select data all with conduction
    public function selectconduction($tablename,$conduction){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where($conduction);
        $returndata = $this->db->get();
        return $returndata->result();
    }

    //select data by conduction
    public function selectorderby($tablename,$conduction,$orderby=''){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where($conduction);
        $this->db->order_by($orderby);
        $returndata = $this->db->get();
        return $returndata->result();
    }

    //select data by conduction
    public function selectorderbylimit($tablename,$conduction,$orderby='',$limit='',$limitto=NULL){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where($conduction);
        $this->db->order_by($orderby);
        $this->db->limit($limit,$limitto);
        $returndata = $this->db->get();
        return $returndata->result();
    }

    //update data
    public function updatedata($tablename,$updatedata,$conduction){
        $this->db->where($conduction);
        $this->db->update($tablename,$updatedata);
        //echo $this->db->last_query();
        $return = $this->db->affected_rows();
        return $return;
    }
    
    //delete data peramently
    public function deleterecord($tablename,$conduction){
        $this->db->where($conduction);
        $this->db->delete($tablename);
        $return = $this->db->affected_rows();
        return $return;
    }

}
