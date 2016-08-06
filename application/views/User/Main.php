
<!-- Half Page Image Background Carousel Header -->
<header id="myCarousel" class="carousel slide"> 

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('https://i.ytimg.com/vi/DJkOmmHAV_I/maxresdefault.jpg');"></div>
            <div class="carousel-caption"> 
                <div class="carousel-text"><h4><strong>Show us how you care by: <br> DONATING</strong></h4></div>
            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('http://creativestockphoto.com/wp-content/uploads/2014/09/images-of-earthquake-disaster.jpg');"></div>
            <div class="carousel-caption">
                <div class="carousel-text"><h4><strong>Show us how you care by: <br> DONATING</strong></h4></div>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('http://3.bp.blogspot.com/_mkdzIbtzMEM/S7XDrAszZWI/AAAAAAAABpA/uBhkJmx6-fs/s1600/2012-103.jpg');"></div>
            <div class="carousel-caption">
                <div class="carousel-text"><h4><strong>Show us how you care by: <br> DONATING</strong></h4></div>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a> 
</header>
<!-- carousel --> 

<!-- list of purposes -->
<div class="container"><br>
<h2><strong>Latest Updates</strong></h2>
  <div class="row"> 
    <?php   
      $ctr = 0;
      foreach ($allPurpose as $list) {  
        if ( $ctr < 7) {
          $description = '';
          if(strlen($list->description) > 93){
            $description = substr($list->description, 0, 93); 
            echo '
              <div class="col-sm-3 col-lg-3 col-md-3">
                  <div class="thumbnail posts">
                      <img src="http://www.hindustantimes.com/Images/popup/2015/4/Quake3.jpg" class="img-responsive">
                      <div class="caption"> 
                          <h4><a href="'.base_url().'individual-post">'.$list->name.'</a>
                          </h4>
                          <p>'.$description.' <a href="'.base_url().''.str_replace(' ','-',strtolower($list->name)).'/'.str_replace(' ','-',strtolower($list->name)).'">Continue reading..</a>.</p>
                      </div> 
                  </div>
              </div>
            '; 
          } 
          $ctr += 1;
        }
      }
      if( $ctr == 7){
      echo' 
          <div class="col-sm-3 col-lg-3 col-md-3 text-center" style="background: #e7e7e7; padding: 50px; margin-top: .5%;">
              <h4>View more events.</h4>
              <p>There are way a lot more events that may need your valuable help. Click the button below to see more</p>
              <a class="btn btn-primary" target="_blank" href="'.base_url().'all-recent-posts">View More</a>
          </div> 
        ';
      }
    ?> 
  </div>  
</div>
<!-- list of purposes -->


<!-- quote -->
<section id="carousel">           
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
        <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
          <!-- Carousel indicators -->
                  <ol class="carousel-indicators">
            <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
            <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
            <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="3"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="4"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="5"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item">
              <img src="<?php echo base_url()?>style/image/qoute/Mother Teresa.jpg" class="profile-circle">
              <blockquote>
                <p>It's not how much we give but how much love we put into giving.<br>
                <small> Mother Teresa</small></p>
              </blockquote> 
            </div>
            <div class="item">
              <img src="<?php echo base_url()?>style/image/qoute/Anne Frank.jpg" class="profile-circle">
              <blockquote>
                <p>No one has ever become poor by giving.<br>
                <small> Anne Frank</small></p>
              </blockquote>
            </div>
            <div class="active item">
              <img src="<?php echo base_url()?>style/image/qoute/John Holmes.jpg" class="profile-circle">
              <blockquote>
                <p>There is no exercise better for the heart than reaching down and lifting people up.<br><small> John Holmes</small></p>
              </blockquote>
            </div>
              <div class="item">
                <img src="<?php echo base_url()?>style/image/qoute/Jack Landon.jpg" class="profile-circle">
                <blockquote>
                <p>A bone to the dog is not charity. Charity is the bone shared with the dog, when you are just as hungry as the dog.<br><small>Jack Landon</small></p>
              </blockquote>
            </div>
              <div class="item">
                <img src="<?php echo base_url()?>style/image/qoute/Maya Angelou.jpg" class="profile-circle">
                <blockquote>
                <p>When we give cheerfully and accept gratefully, everyone is blessed.<br><small> Maya Angelou</small></p>
              </blockquote>
            </div>
              <div class="item">
                <img src="<?php echo base_url()?>style/image/qoute/John Bunyan.jpg" class="profile-circle">
                <blockquote>
                <p>You have not lived today until you have done something for someone who can never repay you.<br><small> John Bunyan</small></p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>              
    </div>
  </div>
</section>
<!-- quote -->