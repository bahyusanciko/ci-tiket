<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getkod_model extends CI_Model {

     function get_kodjad(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_jadwal,3)) AS kd_max FROM tbl_jadwal");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%04s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "J".$kd;
        }

    function get_kodtuj(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_tujuan,3)) AS kd_max FROM tbl_tujuan");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "TJ".$kd;
        }
    function get_kodbus(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_bus,3)) AS kd_max FROM tbl_bus");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "B".$kd;
        }
    function get_kodtmporder(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_order,3)) AS kd_max FROM tbl_order");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%05s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "ORD".$kd;
        }
    function get_kodpel(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_pelanggan,3)) AS kd_max FROM tbl_pelanggan");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%04s", $tmp);
                }
            }else{
                $kd = "00001";
            }
            return "PL".$kd;
        }
    function get_kodkon(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_konfirmasi,3)) AS kd_max FROM tbl_konfirmasi");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%04s", $tmp);
                }
            }else{
                $kd = "00001";
            }
            return "KF".$kd;
        } 
    function get_kodadm(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_admin,3)) AS kd_max FROM tbl_admin");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%04s", $tmp);
                }
            }else{
                $kd = "00001";
            }
            return "ADM".$kd;
        }
}

/* End of file getkod_model.php */
/* Location: ./application/models/getkod_model.php */