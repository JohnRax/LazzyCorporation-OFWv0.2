<br><br><br><br>
        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                     
          
                <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear"> 
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <!-- <ul class="sort-by-list">
                                <li class="active">
                                    <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                        Posted Date <i class="fa fa-sort-amount-asc"></i>                   
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                        Posted Date <i class="fa fa-sort-numeric-desc"></i>                     
                                    </a>
                                </li>
                            </ul >--><!--/ .sort-by-list-->

                        
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <!-- <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>  -->                         
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="col-md-12 clear"> 
                        <div id="list-type" class="proerty-th">                                                   
                                 

                                    <?php 
                                        
                                        if(isset($_POST['search']))
                                        {

                                              require_once 'includes/connection.php';
                                              $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status  order by j_id DESC";
                                              $show_job_stmt=$connection->prepare($show_job_query);
                                              $show_job_stmt->execute(array(':status'=>'Approved'));                        

                                                $sample="true";
                                              if(!empty($_POST['skills'])  && !empty($_POST['employertype']))
                                              {         
                                               
                                                  if( isset($_POST['skills']) && !empty($_POST['skills']) ) 
                                                    { 
                                                        $skills = implode(',', $_POST['skills']);
                                                    }
                                                     
                                                    
                                                    $array_skills = explode(',',  $skills);
                                                
                                                           
                                                    $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description  ";
                                                    foreach($array_skills as $val)
                                                    {
                                                        $arr = "'%{$val}%'";
                                                        $new_arr[] =" j_mainduties LIKE ".$arr;
                                                    }

                                                      $new_arr = implode(" OR ", $new_arr);
                                                      $show_job_query.=" where ".$new_arr;
                                                      $show_job_query.=" and j_status=:status and j_employertype=:employertype order by j_id DESC";

                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array( ':status'=>'Approved',
                                                                                ':employertype'=>$_POST['employertype'] ));

                                              }
                                              else if(!empty($_POST['country']) && !empty($_POST['employertype']))
                                              {
                                                    
                                                     $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status and j_country=:country and j_employertype=:employertype  order by j_id DESC";
                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array(':status'=>'Approved',':country'=>$_POST['country'],':employertype'=>$_POST['employertype']));
                                              }
                                              else if(!empty($_POST['country']) && !empty($_POST['skills']))
                                              {
                                                
                                                 if( isset($_POST['skills']) && !empty($_POST['skills']) ) 
                                                    { 
                                                        $skills = implode(',', $_POST['skills']);
                                                    }
                                                     
                                                    
                                                    $array_skills = explode(',',  $skills);
                                                
                                                           
                                                    $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description   ";
                                                    foreach($array_skills as $val)
                                                    {
                                                        $arr = "'%{$val}%'";
                                                        $new_arr[] =" j_mainduties LIKE ".$arr;
                                                    }

                                                      $new_arr = implode(" OR ", $new_arr);
                                                      $show_job_query.=" where ".$new_arr;
                                                      $show_job_query.=" and j_status=:status and j_country=:country order by j_id DESC";

                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array( ':status'=>'Approved',
                                                                                ':country'=>$_POST['country']));

                                              }
                                              else if(!empty($_POST['country']))
                                              {
                                                    
                                                    
                                                     $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status and j_country=:country  order by j_id DESC";
                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array(':status'=>'Approved',':country'=>$_POST['country']));
                                           
                                              }
                                              else if(!empty($_POST['employertype']))
                                              {
                                                
                                                     $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status and j_employertype=:employertype  order by j_id DESC";
                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array(':status'=>'Approved',':employertype'=>$_POST['employertype']));
                                              }
                                              else if(!empty($_POST['skills']))
                                              {

                                                        if( isset($_POST['skills']) && !empty($_POST['skills']) ) 
                                                        { 
                                                            $skills = implode(',', $_POST['skills']);
                                                        }
                                                         
                                                        
                                                        $array_skills = explode(',',  $skills);
                                                    
                                                               
                                                            $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description ";
                                                            foreach($array_skills as $val)
                                                            {
                                                                $arr = "'%{$val}%'";
                                                                $new_arr[] =" j_mainduties LIKE ".$arr;
                                                            }

                                                          $new_arr = implode(" OR ", $new_arr);
                                                          $show_job_query.=" where ".$new_arr;
                                                          $show_job_query.=" and j_status=:status  order by j_id DESC";

                                                         $show_job_stmt=$connection->prepare($show_job_query);
                                                         $show_job_stmt->execute(array('status'=>'Approved'));
                                              }                                            
                                               
                                            include "job.php";
                                            
                                        }
                                        else
                                        {
                                           
                                            $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status  order by j_id DESC";
                                             $show_job_stmt=$connection->prepare($show_job_query);
                                             $show_job_stmt->execute(array(':status'=>'Approved'));
                                            include "job.php";
                                        
                                        }  

                                    ?>                                     
                                         

                                   
                        </div>
                    </div>
                    
                    <!-- <div class="col-md-12"> 
                        <div class="pull-right">
                            <div class="pagination">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>                
                    </div> -->
                </div>  
                </div>              
            </div>
        </div>

        