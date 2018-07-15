<?php

class database{
	private $connection;
	private function getConnInstant(){
//if connection has not been built, create a connection.
		if(!$this->connection){
			$pdo = new PDO('mysql:host=localhost;dbname=news_db;charset=utf8mb4','root','root');
			$this->connection=$pdo;
		}
		return $this->connection;
	}

	public function getNewsById($id='all'){//默认all
		if(is_numeric($id)){
			//get news by id
			$stmt=$this->getConnInstant()->prepare('SELECT * FROM news WHERE idnews=:id');//用getConnInstant($id)在news_db中搜索该新闻 ：id --占位符(:后面可自己取名)
			$stmt->execute(
				array(
					':id'=>$id
				)
			);
			$news=$stmt->fetch(PDO::FETCH_ASSOC);
		}else{
			//get all news
			$stmt=$this->getConnInstant()->query('SELECT * FROM news');
			$news=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return $news;
	}

	public function addNewsByInput($id){
		//if id exists, del news.
			//echo "News ".$param." was deleted.";
		//else, echo "News ".$param." does not exist.";
	}

	public function delNewsById($id){
		$sql='DELETE FROM news WHERE idnews=$id';
		//if id exists, del news.
		//echo "News ".$param." was deleted.";
		//else, echo "News ".$param." does not exist.";
	}


}

?>