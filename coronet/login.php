<?php
		include('dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
			$query = $conn->query("SELECT * FROM organizer WHERE username='$username' AND password='$password'");
			$row = $query->fetch();
			$num_row = $query->rowcount();
		if( $num_row > 0 ) { 
		  
	 if($row['access']=="Organizer")
     {
        $_SESSION['useraccess']="Organizer";
        $_SESSION['id']=$row['organizer_id'];
        
        ?>	<script>window.location = 'home.php';</script><?php
        	
     }
     else{
		
	 }

        
		}else{ 
			?>	<script>
              alert('Username and Password did not Match');
			  window.location = 'index.php';
			    </script><?php	
		}	
				
		?>
        