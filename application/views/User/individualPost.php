 <br> 
 <br>
 <br> 
 <!-- Page Content -->
<div class="container"> 
    <div class="row">  
        <div class="col-md-12"> 
            <div class="thumbnail" style="padding: 20px">
                <img class="img-responsive" src="http://placehold.it/1330x500" alt="">
                <div class="caption-full">
                  <div class="row">
                    <div class="col-md-8">
                    <?php 
                      foreach ($purpose as $row) {
                        echo '
                           <h4 class="pull-right">'.date('F j, Y', strtotime($row->created_date)).' - Posted</h4>
                          <h4><a href="">'.$row->org_name.'</a></h4><br>
                          <p>'.$row->description.'</p> 
                        ';
                      }
                    ?> 
                    </div>
                    <div class="col-md-4">
                      <div class="row" style="padding: 30px">
                        <div class="col-md-6">
                          <h3 class="pull-right"><strong>Donate</strong></h3>
                        </div>
                        <div class="col-md-6">
                          <p><a href=""><img src="<?php echo base_url()?>assets/image/icon-donate.png" class="img-responsive" width="80px"></a></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <h3 class=" pull-right"><strong>Download</strong></h3>
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
</div>
<!-- /.container -->