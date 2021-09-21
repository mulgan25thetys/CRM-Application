<?php 

	if ($suppresion) {
		echo $message."</br>";
		?>

		<a href="index"><button style="background-color: rgb(170,193,87); color: white;cursor: pointer;border: none;border-radius: 5px;box-shadow: 0 2px 5px rgba(0,0,0,0.5); padding: 10px 5px; width: 120px;">Home</button></a>
		<?php
		
	} else {
		 echo $form;
	}


 ?>
