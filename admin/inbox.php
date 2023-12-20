<?php include('inc/header.php'); 

$Getid = $obj->Inbox($adminid);

?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>INBOX</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inbox</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30"> </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Profile name</th>
                          <th>E-mail</th>
                          <th>Phone</th>
                          <th>County</th>
                          <th>Qualification/Year</th>
                          <th>Image</th>
                          <th>Created Date</th>
                          	<th>Block / Unblock</th>

                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($Getid as $recieverData) { 
                              
                              
                              
                               foreach($recieverData as $users) {
                                   $userid = $users['to_user'];
                                   $Getuserdta= $obj->GetUserById($userid)
                                   
                          ?>
                        <tr>
                          <td><a href="user-details.php?id=<?=$Getuserdta['id'];?>"><?=$Getuserdta['ProfileName'];?></a></td>
                          <td><?=$Getuserdta['Email'];?></td>
                          <td><?=$Getuserdta['Phone'];?></td>
                          <td><?=$Getuserdta['Country'];?></td>
                          <td><?=$Getuserdta['Qualifications'];?>/<?=$Getuserdta['Year'];?></td>
                           <td><img src="assets/img/profile/<?=$Getuserdta['ProfilePic'];?>" style="width: 42px;height: 42px;border-radius: 30px;"></td>
                          <td><?=$Getuserdta['Created_at'];?></td>   
                          	<td>
				    <?php  $status =  $Getuserdta['Status']; 
					if($status == 1){	
				?>
				   
				    <a class="btn btn-primary" href="inc/process.php?UserBlock=<?php echo $Getuserdta['id'];?>">Block</a>
				    <a class="" href="chat-with-user?stid=0&lgn=<?=$adminid;?>&dis_id=<?=$Getuserdta['id'];?>&type=adminchat">
 				        <button class="chat-btn" style="background-color: #00C853;color: #fff;border: 0;border-radius: 5px;padding: 8px;margin: 0;height: 38px;">
				            <svg style="width:24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				                <path fill="currentColor" d="M12,3C17.5,3 22,6.58 22,11C22,15.42 17.5,19 12,19C10.76,19 9.57,18.82 8.47,18.5C5.55,21 2,21 2,21C4.33,18.67 4.7,17.1 4.75,16.5C3.05,15.07 2,13.13 2,11C2,6.58 6.5,3 12,3Z" />
				            </svg>
				        </button>
				    </a>
					<?php } elseif($status == 0){	?>
				  <a class="btn btn-primary" href="inc/process.php?UserUnblock=<?php echo $Getuserdta['id'];?>">Unblock</a>
				  <a class="" href="chat-with-user?stid=0&lgn=<?=$adminid;?>&dis_id=<?=$Getuserdta['id'];?>&type=adminchat">
				      <button class="chat-btn" style="background-color: #00C853;color: #fff;border: 0;border-radius: 5px;padding: 8px;margin: 0;height: 38px;">
				            <svg style="width:24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				                 <path fill="currentColor" d="M12,3C17.5,3 22,6.58 22,11C22,15.42 17.5,19 12,19C10.76,19 9.57,18.82 8.47,18.5C5.55,21 2,21 2,21C4.33,18.67 4.7,17.1 4.75,16.5C3.05,15.07 2,13.13 2,11C2,6.58 6.5,3 12,3Z" />
				            </svg>
				      </button>
				   </a>
	                <?php }else{} ?>
				</td>
                           
                        </tr>
                       <?php } }?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>

<?php include('inc/footer.php'); ?>