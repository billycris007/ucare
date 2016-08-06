 <br> 
 <br>
 <br> 
 <!-- Page Content -->
<div class="container"> 
    <div class="row">  
        <div class="col-md-12"> 
            <div class="thumbnail" style="padding: 20px">
                 <div class="indiHeader"><img class="img-responsive" src="<?php echo base_url()?>assets/image/dummy.jpg" alt=""></div>
                <div class="caption-full">
                  <div class="row">
                    <div class="col-md-8">
                    <?php 
                      foreach ($purpose as $row) {
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
                          <p><a href=""><img src="<?php echo base_url()?>assets/image/icon-donate.png" class="img-responsive" width="80px"></a></p>
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

                  <img class="img-responsive" src="<?php echo base_url()?>assets/image/dummy.jpg" alt="" width="150px" height="150px">
                  <p>This product was great in terms of quality. I would definitely buy another!</p>
                  <hr>
                  

                  <img class="img-responsive" src="http://placehold.it/150x150" alt="">
                  <p>This product was great in terms of quality. I would definitely buy another!</p>
                  <hr>
                  

                  <img class="img-responsive" src="<?php echo base_url()?>assets/image/dummy.jpg" alt="" width="150px" height="150px">
                  <p>This product was great in terms of quality. I would definitely buy another!</p>
                  <hr>

                </div>
                <div class="col-md-4"> 
                  <div class="scrollable">
                  <?php  
                    $loop = ' 
                      <h3 class="text-center"><strong>Billy Bully - $10,000</strong></h3>
                      <p class="text-center">Hope this can help the needy.</p>
                      <p class="text-center">Hope this can help the needy.</p>
                      <hr>
                    ';
                    for ($i=0; $i < 20; $i++) { 
                      echo $loop;
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