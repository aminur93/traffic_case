<?php


class Payment
{
    private $db;
    private $fm;

     public function __construct()
     {
         $this->db = new Database();
         $this->fm = new Format();
     }

     public function addpayment($data){
        $user_id = mysqli_real_escape_string($this->db->link, $data['user_id']);
        $case_id = mysqli_real_escape_string($this->db->link, $data['case_id']);
        $tnumber = mysqli_real_escape_string($this->db->link, $data['tnumber']);
        $tid = mysqli_real_escape_string($this->db->link, $data['tid']);
        $cvc = mysqli_real_escape_string($this->db->link, $data['cvc']);
        $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
        $status = 1;

        if(empty($tnumber) || empty($tid) || empty($cvc) || empty($amount)){
            $msg = "<span class='error'>Field Must Not Be Empty</span>";
            return $msg;
        }else{
            $query = "Insert into payment(user_id,case_id,tnumber,tid,cvc,amount,status)
            values('$user_id','$case_id','$tnumber','$tid','$cvc','$amount','$status')";
            $insert_row = $this->db->insert($query);
            if($insert_row){
                $msg = "<span class='success'>Payment Successfull</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>something went wrong</span>";
                return $msg;
            }
        }
     }

     public function clear(){
         $query = "select payment.*, register.email, cases.title, cases.car_number
         from payment 
         INNER JOIN register
         ON payment.user_id = register.id
         INNER JOIN cases
         ON payment.case_id = cases.id
         where payment.status = 1 order by id desc 
         ";
         $result = $this->db->select($query);
         return $result;
     }
}