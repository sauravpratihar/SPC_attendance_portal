 <?php



class crud{
	private $host="localhost";
	private $user="root";
	private $db="spc";
	private $pass="saorav08";
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


	public function data($batch, $dt, $stime, $etime ){
		$sql = "";

		$q = $this->conn->prepare($sql);

		// $q->execute(array(':name'=>$name));
		$q->execute();
		$d = $q->rowCount();
 		return $d;

	}



	
	


}

?>