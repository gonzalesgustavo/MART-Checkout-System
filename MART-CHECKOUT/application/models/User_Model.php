<?php
class User_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
   
	//get all users
	public function get_users(){
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
    //get data from users table
	public function get_user($banner_id){
        $query = $this->db->get_where('users', array('banner_id' => $banner_id));
        return $query->row_array();
	}
	
    //get data from users table
	public function get_user_name($banner_id){
        $query = $this->db->get_where('users', array('banner_id' => $banner_id));
        $result = $query->row_array();
		return $result['name'];
	}
	
    //insert data into users table
    public function insert_user($data){
        return $this->db->insert('users', $data);
    }
	
    //update data in users table
	public function update_user($data){
		return $this->db->replace('users', $data);
	}
	
    //delete data from users table
	public function delete_user($data){
		return $this->db->delete('users', $data);
		
	}
	
	//login user
    public function login_user($banner_id){
		
		$query = $this->db->get_where('users', array('banner_id' => $banner_id));   
        if($query->num_rows() == 1){			
            $userArray = array();
            foreach($query->result_array() as $row){
                $userArray[0] = $row['name'];
				$userArray[1] = $row['role'];
            }
            $userData = array(
				'user_id' => $banner_id,
                'user_name' => $userArray[0],
				'user_role' => $userArray[1],
                'logged_in'=> TRUE
            );
            return $userData;	
        } else {
            return false;
        }
    }

    //get enum roles from users table
    public function get_roles(){
		
		$row = $this->db->query("SHOW COLUMNS FROM users LIKE 'role' ")->row()->Type;
		$regex = "/'(.*?)'/";
		preg_match_all( $regex , $row, $enum_array );
		$enum_fields = $enum_array[1];
		foreach ($enum_fields as $key=>$value)
		{
			$enums[$value] = $value;
		}
		return $enums;
    }
	
	//get navigation based on current user role
    public function get_navigation($role){
		
		// "link name"=>"controller"
		
		if ($role == "Manager"){
			
			$nav_items['nav_items'] = array(
				'Employees'=>'employees', 
				'Students'=>'students',  
				'Equipment' => 'equipment', 
				'Reservations' => 'reservations'
			);
		} else if ($role == "Assistant") {
			$nav_items['nav_items'] = array(
				'Equipment' => 'equipment', 
				'Reservations' => 'reservations'
			);
		} else if ($role == "Student Employee") {
			$nav_items['nav_items'] = array(
				'Reservations' => 'reservations'
			);
		}
		return $nav_items;
    }
   
}

?>