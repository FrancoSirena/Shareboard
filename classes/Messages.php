<?php
class Messages{
   public static function setMessage($text, $type){
      if($type == "error"){
         $_SESSION['msg_error'] = $text;
      } else {
         $_SESSION['msg_success'] =$text;
      }
   }
   
   public static function display(){
      if (isset($_SESSION['msg_error'])) {
         echo '<div class="alert alert-danger">'.$_SESSION['msg_error'].'</div>';
         unset($_SESSION['msg_error']);
      }
      if (isset($_SESSION['msg_success'])){
         echo '<div class="alert alert-success">'.$_SESSION['msg_success'].'</div>';
         unset($_SESSION['msg_success']);
      }
   }
}