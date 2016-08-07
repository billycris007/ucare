 <br> 
 <br>
 <br> 
 <!-- Page Content -->
<div class="container"> 
    <div class="row">  
        <div class="col-md-12"> 
            <div class="thumbnail" style="padding: 20px">
              <?php 
                foreach ($purpose as $row) {?>
                 <div style="margin: 0 auto; float: 0 none;"><img class="img-responsive indiHeader" src="<?php echo base_url().''.$row->purpose_image?>" alt=""></div>
                <div class="caption-full">
                  <div class="row">
                    <div class="col-md-8">
                    <?php
                        $purposeName = $row->name;
                        echo ' 
                          <h1><strong><a href="">'.$row->name.' - '.$row->org_name.'</a></strong> <br><p><small>'.date('F j, Y', strtotime($row->created_date)).'</small></p>
                          </h1>

                          <br>
                          <p>'.$row->description.'</p> 
                        ';
                      }
                    ?> 
                    </div>
                    <div class="col-md-4" style="padding: 30px;">
                      <div class="row">
                        <div class="col-md-6">
                          <h3><strong>Donate</strong></h3>
                        </div>
                        <div class="col-md-6">
                          <p><a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=ZH52X6NBZS7TA&lc=PH&item_name=<?php echo $purposeName." Donation"; ?>&item_number=mrumbz1&currency_code=PHP&bn=PP-DonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted"><img src="<?php echo base_url()?>assets/image/icon-donate.png" class="img-responsive" width="80px"></a></p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <h3><strong>Download</strong></h3>
                        </div>
                        <div class="col-md-6">
                          <p><a href=""><img src="http://static1.squarespace.com/static/560ea8d6e4b006415e838008/t/562e4c14e4b0fd53bab0d157/1445874712460/Google-Play-button.png" width="200px" class="img-responsive"></a></p>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div> 
            </div>  
        </div> 
    </div> 

     <div class="well">  

        <div class="row"> 
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-8"> 
                  <h3><strong>Recent Update</strong></h3>
                  <hr>
                  <?php
                    foreach ($update_datas as $update) {
                      foreach ($purpose as $row) {
                        if($row->purpose_id == $update->purpose_id){ 
                          echo '<img class="img-responsive" src="<?php echo base_url()?>assets/image/dummy.jpg" alt="" width="150px" height="150px">
                              <p style="word-break: break-all">'.$update->description.'</p>
                              <small>'.date('F j, Y', strtotime($update->posted_date)).'</small>
                              <hr>';
                        }
                      }
                    }
                  ?> 
                </div>
                <div class="col-md-4"> 
                  <div class="scrollable">
                  <?php  
                    foreach ($trans_datas as $trans) {
                      $name = ($trans->isUnknown)?$trans->firstname.' '.$trans->lastname:'Anonymous';
                      foreach ($purpose as $row) {
                        if($row->purpose_id == $trans->purpose_id){
                          echo  ' 
                              <h3 class="text-center"><strong>'.$name.' - '.$trans->amount.'</strong></h3>
                              <p class="text-center" style="word-break: break-all">'. $trans->message .'</p>
                              <hr>
                            ';
                        }
                      }
                      
                    }
                  ?>
                  </div>
                </div>
              </div>
            </div>
        </div> 

    </div>
</div>
<!-- /.container -->