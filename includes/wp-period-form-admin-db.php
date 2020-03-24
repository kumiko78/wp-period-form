<?php
class Period_Form_Admin_Db{
	private $table_name;

	public function __construct(){
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'period_form';

		$this->create_table();
	}

private function create_table(){
 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 $prepare = $wpdb->prepare("SHOW TABLES LIKE %s" , $this->table_name);
 $is_db_exists = $wpdb->get_var( $prepare );
 var_dump ( $is_db_exists );

		$query  = "";
		$query .= "CREATE TABLE ". $this->table_name . " (";
		$query .= "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
		$query .= "departure_date DATE NOT NULL,";
		$query .= "tour_name TINYTEXT NOT NULL,";
		$query .= "reserver_name TINYTEXT NOT NULL,";
		$query .= "age TINYINT NOT NULL,";
		$query .= "gender TINYTEXT NOT NULL,";
		$query .= "phone TINYTEXT NOT NULL";
		$query .= ");";

		/*dbDelta( $query ); */
	}
}
