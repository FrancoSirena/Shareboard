<?php
class Shares extends Controller{
   protected function index(){
		$viewmodel = new ShareModel();
		$this->ReturnView($viewmodel->Index(), true);
   }
   protected function add() {
		if (!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'/shares');
			return;
		}	
		$viewmodel = new ShareModel();
		$this->ReturnView($viewmodel->add(), true);
   }
}