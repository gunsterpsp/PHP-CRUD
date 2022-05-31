<?php

    class Model {

        public $server = "localhost";
        public $username = "root";
        public $password = "";
        public $db = "dela_fuente_DB";
        public $conn;

        public function __construct()
        {
            try {
                $this->conn = new PDO("mysql:host=$this->server; dbname=$this->db", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $e->getMessage();
            }

        }

    }

    class Fetch extends Model{
        public function fetch(){

            $data = null;
            $stmt = $this->conn->prepare("SELECT * FROM records");
            $stmt->execute();
            $data = $stmt->fetchAll();
  
            return $data;
  
          }
    }

    class Insert extends Model{


        public function insert(){

            if(isset($_POST['submit'])){
                
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile'])) {
                
                    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile'])) {
                        
                 

                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $mobile = $_POST['mobile'];

                        $query = "INSERT INTO records (name, email, mobile) VALUES ('$name','$email','$mobile')";

                        if ($sql = $this->conn->exec($query)) {
                        echo "<script>swal('Success!', 'Record added', 'success');</script>";
                        echo "<script>setTimeout(function(){location.href = 'index.php'}, 1000);</script>";
                        
                        }

                     
                    
                    }else {

                        if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['mobile'])) {
                            echo "<div class='alert alert-danger' role='alert'>
                            - Name is required
                          </div>";

                            echo "<div class='alert alert-danger' role='alert'>
                            - An email is required<br />
                            </div>";

                             echo "<div class='alert alert-danger' role='alert'>
                            - Mobile No. is required<br />
                              </div>";

                              
                        }else {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $mobile = $_POST['mobile'];

                            if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
                                    echo "<div class='alert alert-danger' role='alert'>
                                - Name must be letter and space only.<br />
                                </div>";
                                    }  
                                    
                            
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "<div class='alert alert-danger' role='alert'>
                               - Email must be a valid email address<br />
                            </div>";
                                
                            }
                        
                            
                             if (!preg_match('/^[0-9\s]+$/', $mobile)) {
                                echo "<div class='alert alert-danger' role='alert'>
                                - Mobile No. must be number only<br />
                                </div>";
                            }   


                        }

                        
                       
                        // if (empty($_POST['name'])) {
                        //     echo "<div class='alert alert-danger' role='alert'>
                        //     - Name is required
                        //   </div>";
                        // }else {
                        //     $name = $_POST['name'];
                        //     if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
                        //        echo "<div class='alert alert-danger' role='alert'>
                        //    - Name must be letter and space only.<br />
                        //   </div>";
                        //     }    
                        // }

                        // if (empty($_POST['email'])) {
                        //     echo "<div class='alert alert-danger' role='alert'>
                        //    - An email is required<br />
                        //   </div>";
                        // }else {
                        //     $email = $_POST['email'];
                        //    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        //     echo "<div class='alert alert-danger' role='alert'>
                        //     Email must be a valid email address<br />
                        //    </div>";
                            
                        //    }
                        // }
                        // if (empty($_POST['mobile'])) {
                        //     echo "<div class='alert alert-danger' role='alert'>
                        //     - Mobile No. is required<br />
                        //    </div>";
                        
                        // }else {
                        //     $mobile = $_POST['mobile'];
                        //     if (!preg_match('/^[0-9\s]+$/', $mobile)) {
                        //        echo "<div class='alert alert-danger' role='alert'>
                        //    - Mobile No. must be number only<br />
                        //   </div>";
                        //     }   
                        // }
                       
                
                    }

                }

                
            }

        }


    }

    class Delete extends Model{
        public function delete(){

            if (isset($_POST['delete_id'])) {
                
                $delete_id = $_POST['delete_id'];

                $query = "DELETE FROM records WHERE id = '$delete_id' ";

                if ($sql = $this->conn->exec($query)) {
                    echo "<script>setTimeout(function(){location.href = 'index.php'}, 1000);</script>";
                    
                }
      
            }
      

        }
    }

    class Edit extends Model{

        public function edit($edit_id){

            $data = null;
            $stmt = $this->conn->prepare("SELECT * FROM records WHERE id = '$edit_id' ");
            $stmt->execute();
            $data = $stmt->fetch();

            return $data;
            
        }


    }

    class Update extends Model{

        public function update(){

            if(isset($_POST['update'])){
                
                if (isset($_POST['edit_name']) && isset($_POST['edit_email']) && isset($_POST['edit_mobile']) && isset($_POST['edit_id'])) {
                 
                    if (!empty($_POST['edit_name']) && !empty($_POST['edit_email']) && !empty($_POST['edit_mobile']) && !empty($_POST['edit_id'])) {
                    
                        $data['edit_id'] = $_POST['edit_id'];
                        $data['edit_name'] = $_POST['edit_name'];
                        $data['edit_email'] = $_POST['edit_email'];
                        $data['edit_mobile'] = $_POST['edit_mobile'];

                        $query = "UPDATE records SET name = '$data[edit_name]', email = '$data[edit_email]', mobile = '$data[edit_mobile]' WHERE id = '$data[edit_id]' ";
                        
                        if ($sql = $this->conn->exec($query)) {
                           echo "<script>swal('Good job!', 'You clicked the button!', 'success');</script>";
                           echo "<script>setTimeout(function(){location.href = 'index.php'}, 1500);</script>";
                        }

                    }else {
                        echo "<script>swal('Error!', 'Please fill out all fields.', 'warning');</script>";
                    }
            
                }
            }


        }

        
    }

    



?>




