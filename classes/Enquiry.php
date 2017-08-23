<?php
class Enquiry{

	private $email;
	private $firstName;
	private $lastName;
	private $message;
	private $id;


	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id= $id;
	}


	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email= $email;
	}

	public function getFirstName(){
		return $this->firstName;
	}
	public function setFirstName($firstName){
		$this->firstName= $firstName;
	}

public function getLastName(){
		return $this->lastName;
	}
	public function setLastName($lastName){
		$this->lastName= $lastName;
	}
public function getMessage(){
		return $this->message;
	}
	public function setMessage($message){
		$this->message= $message;
	}

	public function save(){
		$conn = mysqli_connect('localhost','root','','enquiry');

		if(empty($this->getId())){
			$query="insert into messages(first_name,last_name,email,message) 
		VALUES('". $this->getFirstName()."',
		'" . $this->getLastName()."',
		'" . $this->getEmail()."',
		'" . $this->getMessage()."')";

		}else{
			$query = "update messages set 

			email = '".$this->getEmail()."',
			first_name = '". $this->getFirstName()."',
			last_name =  '" . $this->getLastName()."',
			message = '" . $this->getMessage()."'
			where id= '".$this->getId()."'
			";
		}
		
		return mysqli_query($conn,$query);
	}

	public function findById($id){
		$conn = mysqli_connect('localhost','root','','enquiry');

		$query="select * from messages where id = '".$id."'";
		$result=mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$enquiry = new self();
		$enquiry->setId($row['id']);
		$enquiry->setFirstName($row['first_name']);
		$enquiry->setLastName($row['last_name']);
		$enquiry->setEmail($row['email']);
		$enquiry->setMessage($row['message']);
		return $enquiry;

	}

	public function delete(){
		$conn = mysqli_connect('localhost','root','','enquiry');

		$query="delete from messages where id = '".$this->getId()."'";

		return mysqli_query($conn,$query);
		
	}

}