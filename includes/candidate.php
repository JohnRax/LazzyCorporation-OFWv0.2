<?php 
          if (isset($_GET['page'])) 
          {
            $paging=$_GET['page'];
          }
          else
          {
             $paging=1;
          }
          if (isset($_GET['start'])) {
            
              $start=$_GET['start'];
          }
          else
          {
              $start=10;
          }
         
               require_once 'connection_ajax.php';
               $query="SELECT a.u_id, 
                             a.u_fname,
                             a.u_lname,
                             b.up_age,
                             b.up_picture,
                             a.u_gender,
                             DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                             b.up_address,
                             b.up_maritalstatus,
                             b.up_nationality,
                             b.up_category,
                             b.up_address,
                             b.up_education,
                             c.upi_skillsexp
                      FROM
                             user_details AS a 
                      JOIN user_personal_information AS b 
                        ON b.u_id = a.u_id 
                      JOIN user_professional_information AS c 
                        ON a.u_id = c.u_id where b.up_status=:status";
   
               if(!empty($_GET['address']))     
               {
                  $query.=" AND b.up_address='".$_GET['address']."'";
               }
               if(!empty($_GET['gender']))     
               {
                  $query.=" AND a.u_gender='".$_GET['gender']."'";
               }
               if(!empty($_GET['nationality']))     
               {
                  $query.=" AND b.up_nationality='".$_GET['nationality']."'";
               }
               if(!empty($_GET['marital']))     
               {
                    $query.=" AND b.up_maritalstatus='".$_GET['marital']."'";
               }
               if(!empty($_GET['education']))     
               {
                    $query.=" AND b.up_education='".$_GET['education']."'";
               }

               if(!empty($_GET['age']))
               {
                      $age = explode(",", $_GET['age']);
                      $query.=" AND b.up_age BETWEEN '".$age[0]."' AND '".$age[1]."'";

               }
               if(!empty($_GET['skill'])) 
               { 
                  $skills = implode(',', $_GET['skill']);
                  $array_skills = explode(',',  $skills);
                  foreach($array_skills as $val)
                    {
                        $arr = "'%{$val}%'";
                        $new_arr[] =" c.upi_skillsexp LIKE ".$arr;
                    }
                        $new_arr = implode(" OR ", $new_arr);
                                  $query.=" AND ".$new_arr;  
                }
                   
            
                
               $query.=" LIMIT ".$start.",". $paging.'0';
               $show_profile_stmt=$connection->prepare($query);
               $show_profile_stmt->execute(array(':status'=>'Approved'));
               // for debugging echo $query;


          ?>         
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
    
                 
        