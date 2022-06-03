<?php
class Rating{
	private $host  = 'sql301.epizy.com';
    private $user  = 'epiz_28621327';
    private $password   = "VRcE9gn7WL8vyTQ";
    private $database  = "epiz_28621327_database";    
    private $itemUsersTable = 'account';
	private $itemTable = 'apps';	
    private $itemRatingTable = 'item_rating';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			mysqli_set_charset($conn, 'UTF8');
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($sqlQuery));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	public function userLogin($username, $password){
		$sqlQuery1 = "
	 		SELECT password 
	 		FROM ".$this->itemUsersTable." 
	 		WHERE username='".$username."'";
		$res = $this->getData($sqlQuery1);
		
		if (password_verify($password,$res[0]['password'])){
			$sqlQuery = "
						SELECT * 
						FROM ".$this->itemUsersTable." 
						WHERE username='".$username."'";
			return  $this->getData($sqlQuery);
		}
        return "";
	}		
	public function getItemList(){
		$sqlQuery = "
			SELECT * FROM ".$this->itemTable;
		return  $this->getData($sqlQuery);	
	}
	public function getItem($id){
		$sqlQuery = "
			SELECT * FROM ".$this->itemTable."
			WHERE id='".$id."'";
		return  $this->getData($sqlQuery);	
	}
	public function getItemRating($itemId){
		$sqlQuery = "
			SELECT r.ratingId, r.itemId, r.userId, u.username, u.avatar, 
			r.ratingNumber, r.title, r.comments, r.created, r.modified, u.firstname, u.lastname
			FROM ".$this->itemRatingTable." as r
			LEFT JOIN ".$this->itemUsersTable." as u ON (r.userid = u.id)
			WHERE r.itemId = '".$itemId."'";
		return  $this->getData($sqlQuery);		
	}
	public function getRatingAverage($itemId){
		$itemRating = $this->getItemRating($itemId);
		$ratingNumber = 0;
		$count = 0;		
		foreach($itemRating as $itemRatingDetails){
			$ratingNumber+= $itemRatingDetails['ratingNumber'];
			$count += 1;			
		}
		$average = 0;
		if($ratingNumber && $count) {
			$average = $ratingNumber/$count;
		}
		return $average;	
	}
	public function saveRating($POST, $user){	
		$sqlQuery1 = "
	 		SELECT id
	 		FROM ".$this->itemUsersTable." 
	 		WHERE username='".$user."'";
		$res = $this->getData($sqlQuery1);	
		
		$insertRating = "INSERT INTO ".$this->itemRatingTable." (itemId, userId, ratingNumber, title, comments, created, modified) VALUES 
		('".$POST['itemId']."', '".$res[0]['id']."', '".$POST['rating']."', '".$POST['title']."', '".$POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
		mysqli_query($this->dbConnect, $insertRating);	
	}
}
?>