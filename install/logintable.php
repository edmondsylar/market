<?php
class Logintable
{
	// Change the value only
	public $table = 'admin';	//Table Name
	public $email_field = 'admin_email';			// Email Field Name
	public $password_field = 'admin_password'; 	// Password Field Name

	// End of change part

	// Get user login table information
	function get_login_table_info()
	{
		$data['table'] = $this->table; 			
		$data['email_field'] = $this->email_field;		
		$data['password_field'] = $this->password_field;	
		return (object) $data;
	}

}

?>