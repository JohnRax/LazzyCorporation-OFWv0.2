<?php 
require_once 'includes/connection.php';
$show_profile_query="SELECT 
  a.u_id,
  CONCAT(
    UCASE(LEFT(u_fname, 1)),
    LCASE(SUBSTRING(u_fname, 2))
  )AS u_fname ,
  CONCAT(
    UCASE(LEFT(u_lname, 1)),
    LCASE(SUBSTRING(u_lname, 2))
  ) AS u_lname,
 
  b.up_age,
  b.up_picture,
  b.up_address,
  b.up_nationality,
  DATE_FORMAT(b.up_dateposted, '%M %d, %Y') AS up_dateposted,
  b.up_category,
  b.up_address,
  c.upi_skillsexp 
FROM
  user_details AS a 
  JOIN user_personal_information AS b 
    ON b.u_id = a.u_id 
  JOIN user_professional_information AS c 
   ON a.u_id = c.u_id where  b.up_status=:status GROUP BY b.u_id 
ORDER BY rand() LIMIT 10";
$show_profile_stmt=$connection->prepare($show_profile_query);
$show_profile_stmt->execute(array(':status'=>'Approved'));
   ?>
 <style type="text/css">
  table {
    table-layout: fixed;
    word-wrap: break-word;
  }
  
  .onHover{
  cursor: pointer;  
  }
  </style>
  

<!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Recent Submit Resume</h2>
                        <p>List of Awesome Oversea Workers here at <strong>LAZZY WORKS</strong> .</p>
                    </div>
                </div>

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
                  <td class='onHover col-md-4' title="Click to View Profile" onclick="window.open('includes/candidate-page.php?id=<?php echo $result['u_id'];  ?>')" class='propertyIMG'>
                   
                   <img  class="img-thumbnail" src="<?php echo $img;?>  " alt="" />
                  </td>
                  <td><a href="includes/candidate-page.php?id=<?php echo $result['u_id'];  ?>">
                    <div style="color: black">
                    <div><h3><?php echo $name;?></h3></div>
                    <div> <b>Age: </b><?php echo $age;?></div>
                    <div><b>Address: </b><?php echo $address;?></div>
                    <div><b>Nationality: </b><?php echo $nationality;?></div>
                    <div><b >Job Expertises: </b><?php echo $skillsexp;?></div>
                     <div><small><i>Posted: <?php echo $dateposted;?></i></small></div>
                    </div>
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
                      <div class="box-tree more-proerty text-center">
                          <div class="more-entry overflow">
                              <h5><a >CAN'T FIND CANDIDATE?  </a></h5>
                              <button onclick="location.href='index-employer.php?source=searchhelper'" class="btn border-btn more-black" value="All properties">See more Candidate</button>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>