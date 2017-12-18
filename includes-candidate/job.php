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
          require_once '../includes/connection_ajax.php';
          $query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status";          
         
          
          if(!empty($_GET['country']))     
          {
              $query.=" AND j_country='".$_GET['country']."'";
          }
            if(!empty($_GET['employertype']))     
          {
              $query.=" AND j_employertype='".$_GET['employertype']."'";
          } 
          if(!empty($_GET['skill'])) 
          { 
                  $skills = implode(',', $_GET['skill']);
                  $array_skills = explode(',',  $skills);
                  foreach($array_skills as $val)
                    {
                        $arr = "'%{$val}%'";
                        $new_arr[] =" j_mainduties LIKE ".$arr;
                    }
                        $new_arr = implode(" OR ", $new_arr);
                                  $query.=" AND ".$new_arr;  
          }
         
          $query.=" LIMIT ".$start.",". $paging.'0';
          $show_job_stmt=$connection->prepare($query);
          $show_job_stmt->execute(array(':status'=>'Approved'));
       


?>
      <div id="chckSize" class="row">
                    <div class="proerty-th">
            <table class="display table-condensed table dt-responsive responsive-display">
              <?php while($result1 = $show_job_stmt->fetch(PDO::FETCH_ASSOC)): 
                  $img1 = "assets/img/profilepicture/".$result1['j_logo'];
                  $jobtitle=$result1['j_jobtitle'];
                  $employertype=$result1['j_employertype'];
                  $location=$result1['j_country'];
                  $jobcategory=$result1['j_category'];
                  $posted=$result1['j_dateposted'];
                  ?>
                <tr>
                  <td class='onHover col-md-4' title="Click to View Profile" onclick="window.open('print/job.php?id=<?php echo $result1['j_id'];  ?>')" class='propertyIMG'>
                   
                   <img  class="img-thumbnail" src="<?php echo $img1;?>  " alt="" />
                  </td>
                  <td><a href="print/job.php?id=<?php echo $result1['j_id'];  ?>"></a>
                    <div style="color: black">
                    <div><h3><?php echo $jobtitle;?></h3></div>
                    <div><b>Employer Type: </b><?php echo $employertype;?></div>
                    <div><b>Location: </b><?php echo $location;?></div>
                    <div><b >Job Category: </b><?php echo $jobcategory;?></div>
                    <div><small><i>Posted: <?php echo $posted;?></i></small></div>
                    </div>
                    
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
                      