<?php
class Mon_model extends CI_Model{
    public $table = "im_mon";
    function get_all(){
        $qry ="Select *, a.id as im_mon_id from im_mon a left join device_list b on a.machine_code=b.machine_code order by a.position asc";
        return $this->db->query($qry);
    }

    function get_device_permesin_all(){
        $qry ="SELECT
                    b.location,
                    b.device_name,
                    b.gi_name,
                    a.*
                FROM
                    device_list_perdevice a
                LEFT JOIN device_list b ON a.machine_code = b.machine_code  order by a.pos asc";
        return $this->db->query($qry);
    }

    function get_device_permesin($code){
        $qry ="SELECT
                    b.location,
                    b.device_name,
                    b.gi_name,
                    a.*
                FROM
                    device_list_perdevice a
                LEFT JOIN device_list b ON a.machine_code = b.machine_code where a.machine_code = '".$code."' order by a.pos asc";
        return $this->db->query($qry);
    }
    function get_device_relay($code){
        $qry ="SELECT
                    b.location,
                    b.device_name,
                    b.gi_name,
                    a.*
                FROM
                    device_list_perdevice a
                LEFT JOIN device_list b ON a.machine_code = b.machine_code where a.no = '".$code."' order by a.pos asc";
        return $this->db->query($qry);
    }



    function insert($data){
        return $this->db->insert($this->table,$data);
    }
    function delete($data){
        $this->db->where('no',$no);
        return $this->db->delete($this->table);
    }
    function update_pos2($com){
        $parse = explode(',', $com);
        $where="";
        $qry = 'update im_mon Set position= case id ';
        for($i=0; $i<count($parse);$i++){
            $parse2=explode('_', $parse[$i]);
            $qry.= "WHEN ".$parse2[1]."  THEN '".$i."' ";
            if($i<=($i<count($parse)-1)){
                $where .=$parse2[1]."," ;
            }else{
                $where .=$parse2[1];
            }

        }
        $qry.= "ELSE position END ";
        $qry .= "WHERE id IN (".$where.");";
       
       return $this->db->query($qry);
    }
    function update_pos($com){
        $parse = explode(',', $com);
        $where="";
        $qry = 'update device_list_perdevice Set pos= case no ';
        for($i=0; $i<count($parse);$i++){
            $parse2=explode('_', $parse[$i]);
            $qry.= "WHEN ".$parse2[1]."  THEN '".$i."' ";
            if($i<=($i<count($parse)-1)){
                $where .=$parse2[1]."," ;
            }else{
                $where .=$parse2[1];
            }

        }
        $qry.= "ELSE pos END ";
        $qry .= "WHERE no IN (".$where.");";
        return $this->db->query($qry);
    }
    function insert_mon_all($data,$data2){
        $dtJson=JSON_decode($data);
        $dtJson2=JSON_decode($data2);
        $qrydel= "delete from im_mon where machine_code="."'".$dtJson[0]->machine_code."';";
        $qrydel2= "delete from device_list_perdevice where machine_code="."'".$dtJson[0]->machine_code."';";
        
        $qry="INSERT INTO im_mon(domain_id,item_id,active,id_device,alias,name,machine_code,type,port_type,data_type,max_value) values";
        $qry2 ="INSERT INTO device_list_perdevice(machine_code,id_device,type,port_type,rack_location) values";
        $val="";
        $val2="";
        for ($i=0;$i<count($dtJson);$i++){
            $val.="('".$dtJson[$i]->domain_id."','".$dtJson[$i]->item_id."',1,".$dtJson[$i]->id_device.",'".$dtJson[$i]->alias."','".$dtJson[$i]->name."','".$dtJson[$i]->machine_code."','".$dtJson[$i]->relaytype."','".$dtJson[$i]->port_type."','".$dtJson[$i]->data_type."',".$dtJson[$i]->max_value.")";
            if($i<count($dtJson)-1){
                $val.=",";
            }
        }
        for ($i=0;$i<count($dtJson2);$i++){
            $rack=str_replace(',', '#', $dtJson2[$i]->rack_location);
            $val2.="('".$dtJson2[$i]->machine_code."','".$dtJson2[$i]->id_device."','".$dtJson2[$i]->relay_type."','".$dtJson2[$i]->port_type."','".$rack."')";
            if($i<count($dtJson2)-1){
                $val2.=",";
            }
        }
        $qry =$qry.$val;
        $qry2 =$qry2.$val2;
       $q1=$this->db->query($qrydel);
       $q2=$this->db->query($qrydel2);
       $q3=$this->db->query($qry);
       $q4=$this->db->query($qry2);
        if($q1==1 && $q2==1 && $q3==1 && $q4==1){
            return 1;
        }
        else{
            return $qry;
        }
       //return $this->db->query($qry2);
    }
}

?>
