 <?php



class crud{
	private $host="localhost";
	private $user="root";
	private $db="spc";
	private $pass="";
	private $conn;
	
	
	public function __construct(){


		
		$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
	}
	// 
	// public function insertData(){
	
	public function tables(){
		$sql = "SELECT table_name FROM information_schema.tables WHERE table_type = 'base table' AND table_schema='spc'";

		$q = $this->conn->prepare($sql);

		$q->execute();
		$d = $q->fetchAll(PDO::FETCH_ASSOC);
 		return $d;

	}


	public function data($batch, $datetime,$date){
		$sql2 = "SELECT FirstName FROM $batch AS B WHERE '$datetime' <= (SELECT TimeStamp from $batch AS C WHERE B.id = C.id)AND '$date' >= (SELECT date(TimeStamp) from $batch AS C WHERE B.id = C.id)";
		// echo $sql2;
		$q2 = $this->conn->prepare($sql2);

		// $q->execute(array(':name'=>$name));
		$q2->execute();
		$d2 = $q2->fetchAll(PDO::FETCH_ASSOC);
 		return $d2;

	}


	// public function date($batch, $dt, $stime, $etime ){
	// 	$sql = "";

	// 	$q = $this->conn->prepare($sql);

	// 	// $q->execute(array(':name'=>$name));
	// 	$q->execute();
	// 	$d = $q->rowCount();
 // 		return $d;

	// }






	
	


}

?>