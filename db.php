<?php
class DB {
	
	private $serverInfo = [
        'host'=>'localhost',
        'userName'=>'root',
        'password'=>'',
        'dbName'=>'jb_shop',
        'charSet'=>'utf8'
    ];
   
    
	private $conn;
	
	public function __construct(){
       
    }
    
	private function connect(){
        $this->conn = new PDO("mysql:host=".$this->serverInfo["host"].";dbname=".
        $this->serverInfo["dbName"].";charset=".
        $this->serverInfo["charSet"]."", 
            $this->serverInfo["userName"], 
            $this->serverInfo["password"]);
        return $this->conn;
    }

	private function close($conn){
        // return $conn->close();
    }

    public function Query($sql){
        $sql = str_replace([';','--'],['',''],$sql);
        $conn = $this->connect();
        $result = $conn->prepare($sql);
        $result->execute();
        $returnArray = [];
        while ($row = $result->fetch()){
            $returnArray[] = $row;
        }
        $this->close($conn);

        return $returnArray;
    }

    public function execute($sql){
        
    }
}

?>