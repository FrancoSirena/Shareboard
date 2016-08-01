<?php
class ShareModel extends Model{
   public function index(){
      $this->query("select * from shares order by create_date desc");
      $rows = $this->resultset();
      return $rows;
   }
   public function add(){
      $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if ($post['submit']){
         if ($post['title'] == '' || $post['body'] == ''|| $post['link']==''){
            Messages::setMessage('Please fill in all fields', 'error');
            return;
         }
         
         $this->query('Insert into shares(title, body, link, user_id) values(:title, :body, :link, :user)');
         $this->bind('title', $post['title']);
         $this->bind('body', $post['body']);
         $this->bind('link', $post['link']);
         $this->bind('user', $_SESSION['user_data']['id']);
         $this->execute();
      
         if($this->lastInsertid()){
            header('Location: '.ROOT_URL.'/shares');
         }
      }
      return;
   }
}