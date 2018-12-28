<?php require_once("includes.php"); ?>
<?php 

	class Database{
		//all database connection methods goes here
		public $connection;
		protected $table_name = "";
		protected $query = "";
		protected $result;

		public function connect_to_db(){
			return $this -> connection  =  mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

		}
		public function __construct(){
			$this -> connect_to_db();
		}
		public function close_db(){
			return mysqli_close($this -> connection);
		}

		public function find_all(){
			$table = $this -> get_table();
			$this -> query = "SELECT * FROM $table";
			$this -> result = mysqli_query($this -> connection, $this -> query);
			if ($this -> confirm_query($this -> result)) {
				#everything is good
				return $this -> result;
			}else{
				die("Database connection failed." . mysqli_error($this -> connection));
			}
		}
		public function find_by_sql($ref, $value){
			$table = $this -> get_table();
			$this -> query = "SELECT * FROM $table WHERE $ref = '{$value}' LIMIT 1";
			$this -> result = mysqli_query($this -> connection, $this -> query);
			if ($this -> confirm_query($this -> result)) {
				#everything is good
				return $this -> result;
			}else{
				die("Database connection failed." . mysqli_error($this -> connection));
			}
		}

		public function find_by_id($id=""){
			//this uses the find by sql method
			$table = $this -> get_table();
			$this -> result = $this -> find_by_sql("id", $id);
			if ($this -> confirm_query($this -> result)) {
				return $this -> result;
			}else{
				die("Database connection failed. " . mysqli_error($thsi -> connection));
			}
		}

		public function escape_string($string){
			// escape single quotes
			return mysqli_real_escape_string($this -> connection, $string);
		}

		public function last_inserted_row($result){
			return mysqli_insert_id($result);
		}

		public function set_table($table){
			return $this -> table_name = $table;
		}

		public function get_table(){
			return $this -> set_table($this -> table_name);
		}

		public function set_result(){
			return $this -> result; 
		}

		public function get_result(){
			return $this -> set_result();
		}

		public function confirm_query($result){
			if (!$result) {
				return false;
			}else{
				return true;
			}
		}
		
	}

?>
<?php 
	$database = new Database();
?>