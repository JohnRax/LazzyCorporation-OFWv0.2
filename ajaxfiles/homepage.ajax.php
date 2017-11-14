<?php 



 $show_job_query="SELECT * FROM job_description where j_status=:status";
 $show_job_stmt=$connection->prepare($show_job_query);
 $show_job_stmt->execute(['status'=>'Approved']);
 while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC))
 {         
	echo " <div class='col-sm-6 col-md-3 p0'>
	 <div class='box-two proerty-item'>
       <div class='item-thumb'>
            <a href='index.php?source=jobpage&id=".$result['j_id']."'><img src='assets/img/jobphoto/".$result['j_logo']."'></a>
              </div>
                 <div class='item-entry overflow'>
                    <h5><a href='index.php?source=jobpage&id=".$result['j_id']."'>".$result['j_jobtitle']."</a></h5>
                    <div class='dot-hr'></div>
                    
                    <span class='pull-left'><b>Employer Type : </b>".$result['j_employertype']." </span>
                    <br>
                    <h7><b>Location:</b> ".$result['j_country']."</h7>
                    <br>
                    <h7><b>Job Category:</b>".$result['j_mainduties']."</h7>
                    <br>
                    <span class='pull-left'><b>Posted:</b> ".$result['j_dateposted']."</span>
                    <br>
                    <br>
                    <div class='span9 btn-block no-padding'>
                        <button class='btn btn-large btn-block btn-primary full-width'  onclick='location.href='index.php?source=jobpage&id=".$result['j_id']."'  type='button'>View Full Post</button>
                    </div>
                </div>
			</div>
         </div>  ";

 	}
 ?>