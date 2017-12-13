          
                <div id="chckSize" class="row">
                    <div class="proerty-th">
						<table class="display table-condensed table dt-responsive responsive-display">
							<?php while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC)): 
								  $img = "assets/img/profilepicture/".$result['up_picture'];
								  $name = $result['u_fname'] . " ". $result['u_lname'];
								  $age = $result['up_age']; 
								  $address = $result['up_address']; 
								  $nationality = $result['up_nationality']; 
								  $skillsexp = $result['upi_skillsexp']; 
								  $dateposted = $result['up_dateposted']; 
								  ?>
								<tr>
									<td class='onHover col-md-4' title="Click to View Profile" onclick="window.open('print/profile.php?id=<?php echo $result['u_id'];  ?>')" class='propertyIMG'>
									 
                   <img  class="img-thumbnail" src="<?php echo $img;?>  " alt="" />
									</td>
									<td><a href="print/profile.php?id=<?php echo $result['u_id'];  ?>"></a>
										<div style="color: black">
                    					<div><h3><?php echo $name;?></h3></div>
										<div> <b>Age: </b><?php echo $age;?></div>
										<div><b>Address: </b><?php echo $address;?></div>
										<div><b>Nationality: </b><?php echo $nationality;?></div>
										<div><b >Job Expertises: </b><?php echo $skillsexp;?></div>
										<div><small><i>Posted: <?php echo $dateposted;?></i></small></div>
                    					</div>
                    
									</td>
								</tr>
							<?php endwhile; ?>
						</table>
        
                 
        