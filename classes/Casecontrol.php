<?php
ob_start();
include_once ('lib/Database.php');
include_once ('helpers/Format.php');

class Casecontrol{
    private $db;
    private $fm;

     public function __construct()
     {
         $this->db = new Database();
         $this->fm = new Format();
     }

     public function Casedata($data){

        $title = mysqli_real_escape_string($this->db->link, $data['title']);
        $car_number = mysqli_real_escape_string($this->db->link, $data['car_number']);
        $cat_id = mysqli_real_escape_string($this->db->link, $data['cat_id']);
        $vname = mysqli_real_escape_string($this->db->link, $data['vname']);
        $vemail = mysqli_real_escape_string($this->db->link, $data['vemail']);
        $vphone = mysqli_real_escape_string($this->db->link, $data['vphone']);
        $details = mysqli_real_escape_string($this->db->link, $data['details']);
        $status = mysqli_real_escape_string($this->db->link, $data['status']);

        if(empty($title) || empty($car_number) || empty($status) || empty($cat_id) || empty($vname) || empty($vphone) || empty($details)){
            $msg ="<span class='error'>Fields Must Not be empty !</span>";
            return $msg;
        }else{
            $query = "insert into cases(title,car_number,cat_id,vname,vemail,vphone,details,status)
            values('$title','$car_number','$cat_id','$vname','$vemail','$vphone','$details','$status')";

            $insert_row = $this->db->insert($query);

            if($insert_row){
                $msg = "<span class='success'>Case Inserted Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Soemthing Went Problem !</span>";
                return $msg;
            }
        }
     }

     public function getAllCases(){

        $query = "select cases.*, category.name from cases
                INNER JOIN category 
                ON cases.cat_id = category.cat_id
                where cases.deleted = 0 order by cases.title desc
        ";
        $result = $this->db->select($query);
        return $result;
     }

     public function getcases(){

        $query = "select * from cases order by id desc limit 5;
        ";
        $result = $this->db->select($query);
        return $result;
     }

     public function getAllArchiveCases(){

        $query = "select cases.*, category.name from cases
                INNER JOIN category 
                ON cases.cat_id = category.cat_id
                where cases.deleted = 1 order by cases.title desc
        ";
        $result = $this->db->select($query);
        return $result;
     }

     public function DelcaseControl($id){

        $id = mysqli_real_escape_string($this->db->link, $id);
        
         
        $query = "update cases set deleted = 1 where id = '$id'";
        $result = $this->db->update($query);
        if($result){
            echo "<script>window.location = 'archive.php'</script>";
        }
     }

     public function DeletecaseControl($id){
        $id = mysqli_real_escape_string($this->db->link, $id);

        $query = "delete from cases where deleted = 1 and id = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $msg = "<span class='success'>Case Deleted Successfully</span>";
            return $msg;
        }else{
            $msg = "<span class='success'>Something Went Problem</span>";
            return $msg;
        }
     }

     public function RefreshcaseControl($id){
        $id = mysqli_real_escape_string($this->db->link, $id);
        
        $query = "update cases set deleted = 0 where id = '$id'";
        $result = $this->db->update($query);
        if($result){
            echo "<script>window.location = 'view_case.php'</script>";
        }
     }

     public function getcaseById($id){

         $id = mysqli_real_escape_string($this->db->link, $id);

         $query = "select * from cases where id = '$id'";
         $result = $this->db->select($query);
         return $result;
     }

     public function CasedataUpdate($id,$data){
        $title = mysqli_real_escape_string($this->db->link, $data['title']);
        $car_number = mysqli_real_escape_string($this->db->link, $data['car_number']);
        $cat_id = mysqli_real_escape_string($this->db->link, $data['cat_id']);
        $vname = mysqli_real_escape_string($this->db->link, $data['vname']);
        $vemail = mysqli_real_escape_string($this->db->link, $data['vemail']);
        $vphone = mysqli_real_escape_string($this->db->link, $data['vphone']);
        $details = mysqli_real_escape_string($this->db->link, $data['details']);
        $status = mysqli_real_escape_string($this->db->link, $data['status']);

        if(empty($title) || empty($car_number) || empty($status) || empty($cat_id) || empty($vname) || empty($vphone) || empty($details)){
            $msg ="<span class='error'>Fields Must Not be empty !</span>";
            return $msg;
        }else{
            $query = "update cases set
                       title = '$title',
                       car_number = '$car_number',
                       cat_id = '$cat_id',
                       vname = '$vname',
                       vemail = '$vemail',
                       vphone = '$vphone',
                       details = '$details',
                       status = '$status'
                       where id = '$id'
                     ";

            $update_row = $this->db->update($query);

            if($update_row){
                $msg = "<span class='success'>Case Updated Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Soemthing Went Problem !</span>";
                return $msg;
            }
        }
     }

     public function getuserCases(){
        $query = "select cases.*, category.name from cases
        INNER JOIN category 
        ON cases.cat_id = category.cat_id
        where cases.status = 1 order by cases.title desc
        ";
        $result = $this->db->select($query);
        return $result;
     }

     public function totalcase()
     {
         $query = "select * from cases where status =1";
         $result = $this->db->select($query);
         $count = mysqli_num_rows($result);
         return $count;
     }

     public function archivecase()
     {
         $query = "select * from cases where deleted = 1";
         $result = $this->db->select($query);
         $count = mysqli_num_rows($result);
         return $count;
     }

     public function archivecases()
     {
         $query = "select * from cases where deleted = 1 limit 5";
         $result = $this->db->select($query);
         return $result;
     }
}