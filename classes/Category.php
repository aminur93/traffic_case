<?php

include_once ('lib/Database.php');
include_once ('helpers/Format.php');

class Category
{
    private $db;
    private $fm;

     public function __construct()
     {
         $this->db = new Database();
         $this->fm = new Format();
     }

     public function CategoryData($data)
     {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);

        if (empty($name)) {
            $msg ="<span class='error'>Fields Must Not be empty !</span>";
            return $msg;
        }else{
            $query = "insert into category(name) values('$name')";
            $insert_row = $this->db->insert($query);

            if ($insert_row) {
                $msg = "<span class='success'>category Inserted Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Soemthing Went Problem !</span>";
                return $msg;
            }
        }
     }

     public function getcategory()
     {
         $query = "select * from category order by cat_id desc";
         $result = $this->db->select($query);
         return $result;
     }

     public function getcategories()
     {
         $query = "select * from category order by cat_id desc limit 5";
         $result = $this->db->select($query);
         return $result;
     }

     public function getCatById($id){
        $query = "select * from category where cat_id = '$id'";
        $result = $this->db->select($query);
        return $result;
     }

     
     public function UpdateCategoryData($id,$data){

        $name = mysqli_real_escape_string($this->db->link, $data['name']);

        if (empty($name)) {
            $msg ="<span class='error'>Fields Must Not be empty !</span>";
            return $msg;
        }else{
            $query = "update category set name = '$name' where cat_id = '$id'";
            $update_row = $this->db->update($query);

            if ($update_row) {
                $msg = "<span class='success'>category Updated Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Soemthing Went Problem !</span>";
                return $msg;
            }
        }
     }

     public function Deletecat($delcat)
     {
        $delcat = mysqli_real_escape_string($this->db->link, $delcat);
        
         $query = "delete from category where cat_id = '$delcat'";
         $result = $this->db->delete($query);
         return $result;
     }

     public function totalcategory()
     {
         $query = "select * from category";
         $result = $this->db->select($query);
         $count = mysqli_num_rows($result);
         return $count;
     }
}