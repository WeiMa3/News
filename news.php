<?php

class news{

	public function defaultNews(){
		$this->getNews();
	}

	public function getNews($param='all'){
		$database = new database();
		if (is_numeric($param)){
			$news_result = $database->getNewsById($param);
		}else{
			$news_result = $database->getNewsById();
		}
		echo json_encode($news_result);
	}

	public function addNews(){
		echo "addnews";
	}

	public function deleteNews($param='none'){
		$database = new database();
		if (is_numeric($param)){
			delNewsById($param);
		}else{
			echo "Sorry, wrong route. Please enter news number.";
		}
	}

	public function updateNews($param='none'){
		echo "updtnews";
	}


}

?>