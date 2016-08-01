<?php
class UserModel extends Model{
   public function register(){
      $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      if ($post['submit']){
         $passw = md5($post['password']);
         $this->query('Insert into users(name, email, password) values(:name, :email, :password)');
         $this->bind('name', $post['name']);
         $this->bind('email', $post['email']);
         $this->bind('password', $passw);
         $this->execute();
      
         if($this->lastInsertid()){
            header('Location: '.ROOT_URL.'/users/login');
         }
      }
      return;
   }
   public function login(){
      $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if ($post['submit']){
         if ($post['name'] == '' || $post['email'] == ''|| $post['password']==''){
            Messages::setMessage('Please fill in all fields', 'error');
            return;
         }
         $passw = md5($post['password']);
         $this->query('select * from users where email = :email and password = :password');
         $this->bind('email', $post['email']);
         $this->bind('password', $passw);
         
         $row = $this->single();
         if ($row){
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_data'] = array(
               "id" => $row['id'],
               "name" => $row['name'],
               "email" => $row['email']
            );
            header('Location: '.ROOT_URL.'/shares');
         } else {
            Messages::setMessage('Incorrect Login', 'error');
            
         }
      }
   }
   public function logout(){
      unset($_SESSION['is_logged_in']);
      unset($_SESSION['user_data']);
      session_destroy();
      header('Location: '.ROOT_URL);
   }
}