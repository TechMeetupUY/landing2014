<?php include('data.php'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>TechMeetup 2014</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css' />
    
    <link rel="stylesheet" href="assets/css/screen.css">
</head>
<body>

	<header>
        
	    <div class="container">
	        <div class="header-menu sixteen columns clearfix">
	            <a href="eng.php" class="three columns alpha logo-container">
	                <img src="assets/images/2014/landing/logo.png" alt="">
	            </a>
	            <ul class="thirteen columns omega">
	                <li><a class="scrollable" href="#sponsors"      >Sponsors</a></li>
	                <li><a class="scrollable" href="#speakers"      >Speakers</a></li>
	                <li><a class="scrollable" href="#edicion2013"   >Watch Video</a></li>
	                <li><a class="scrollable" href="#organizadores" >Organizers</a></li>
	                
	                <li><a class="color-green" href="./v2013">v2013</a></li>
	                <li><a class="color-green" href="./v2012">v2012</a></li>
	                <li><a class="" href="index.php">[es]</a></li>
	                
	            </ul>
	        </div>
	    </div>

	    <div class="header-video">
	    	
	    	
	        <img src="assets/images/2014.jpg" class="header-video--media" data-video-src="97064014" data-teaser-source="assets/images/techmeetup" data-provider="Vimeo" data-video-width="500" data-video-height="281">
	        
	                    
	        <div class="container clearfix">
	            <div class="header-event sixteen columns">
	                
	                <div class="header-place eleven columns alpha">
	                    <span class="header-date">November 14<sup style="font-size:50%">th</sup> &amp; 15<sup style="font-size:50%">th</sup></span>
	                    <span class="header-divider">/</span>
	                    <span class="header-venue">Torre de las Telecomunicaciones de ANTEL</span>
	                </div>
	                
	               
	            </div>
	        </div>
	    </div>

	</header>




	<div class="container container-with-margin">
      <section class="section-intro clearfix">
        <h1 class="center">Ready for thirds?</h1>
      </section>

       <div class="sixteen columns">
         <h4>A new edition of the meet-ups conference is coming, and we're ready to show you how <span class="color-blue">we've grown yet again this year</span>!</h4>
         <h3><span class="color-blue">Friday the 14th: Workshops</span>&nbsp;Following the success of the workshops at the <b>v2013 edition</b>, this time we're doing a full day -- so to bring you <span class="color-blue">more quality and more dedication</span>.</h3>
         <h3><span class="color-blue">Saturday the 15th: Talks track</span>&nbsp;Our standard talks track, always searching for <span class="color-blue">excellence in quality,</span> as you already know!</h3>
       </div>
	    <div class="sixteen columns">
	        <section class="section-intro">
	            <h1 class="sixteen columns alpha omega">Our objectives:</h1>
	        </section>
	    </div>

	    
	    <div class="one-third column">
	        <h3 class="color-blue">Empower local communities</h3>
	        <p>The conference seeks to be the meeting day for all Uruguay's tech communities, where its participants will be able to exchange ideas and knowledge to take their communities to the next level.</p>
	    </div>
	    
	    <div class="one-third column">
	        <h3 class="color-blue">Boost IT students<br/>&nbsp;</h3>
	        <p>We are firm believers that relaxed environments are the future of education.</p>
	    </div>
	    <div class="one-third column">
	        <h3 class="color-blue">Professional update and Networking</h3>
	        <p>Don't miss the opportunity of sharing along with experts this space of discussion and camaraderie.</p>
	    </div>
	</div><!-- container -->



	<div class="blue-wrapper" id="speaker-list">
	    
	    <div class="container container-with-margins">
	        
	        <section class="sixteen columns speaker-list clearfix">
	            <h1 id="speakers">Speakers</h1>
	        </section>

            <?php 
            foreach ($speakers as $speaker):
                if(!is_file('./assets/images/2014/landing/speakers/'.$speaker['picture'])){
                	$speaker['picture'] = 'default.jpg';
            	}
            ?>


            <div class="four columns speaker <?= $css ?>">
                
                <div class="handle twitter">
                	<a href="https://twitter.com/<?= $speaker['twitter'];?>" target="_blank">
                		<img src="/assets/images/2014/landing/speakers/handle_twitter.png" alt="">	
                	</a>
                </div>

                <div class="handle linkedin">
                	<a href="<?= $speaker['linkedin'];?>" target="_blank">
                		<img src="/assets/images/2014/landing/speakers/handle_linkedin.png" alt="">	
                	</a>
                </div>

                <img class="avatar" src="assets/images/2014/landing/speakers/<?= $speaker['picture'];?>">
                
                <div class="speaker-info">
                	<img src="/assets/images/2014/landing/speakers/flags/<?= $speaker['flag'];?>.png"><?= $speaker['name'];?>
                	<p><?= $speaker['title'];?></p>
                </div>
                
            </div>
            <?php
               
            endforeach;
            ?>


        </div>
        <br>
    </div>



	<div class="yellow-wrapper">
		<div class="container container-with-margin" id="compra">
		    <section class="sixteen columns compra clearfix">
				
		        <h1 style="color: black;">SOLD OUT!</h1>
		        <h3 style="color: black;">25U$S</h3>
		        
				

		    </section>
		</div>
	</div>



	<div class="white-wrapper">

		<div class="container container-with-margin" id="workshops" style="position: initial;">
		    <section class="sixteen columns workshops clearfix">

		        <h1>Schedule</h1>
		        <a id="sched-embed" data-sched-sidebar="no" href="http://techmeetupuy2014.sched.org/">View the TechMeetupUY mobile app</a><script type="text/javascript" src="http://techmeetupuy2014.sched.org/js/embed.js"></script>

			</section>
		</div>
		
	</div>



	<div class="container container-with-margin" id="sponsors">
	    <section class="sixteen columns sponsors clearfix">

	        <h1 >Sponsors</h1>
	        <p>techMeetupUY is possible thanks to our amazing sponsors. We are very grateful to each of the companies that have been supportive and helped to make this conference possible. Join us and improve Uruguay's IT community!</p>

			<a id="sponsors-pdf" href="docs/tech.meetup.uy.sponsorship.v2014.pdf" target="_blank">
				<img src="assets/images/2014/landing/sponsors.png" alt="">
			</a>

			<div class="clear"></div>

	        <div class="center clearfix">
	            <h2>If you want to support the conference please contact us at <a href="mailto:info@meetup.uy">info@meetup.uy</a></h2>
	        </div>

	        <h1>Are supporting</h1>

	        <div class="center clearfix">
            <?php 
            $i = 1;
            foreach ($sponsors as $sponsor):
                if($i==1){
                    $css = 'alpha';
                } elseif ($i == 2){
                    $css = '';
                } else {
                    $css = 'omega';
                }
                if(!is_file('./assets/images/2014/landing/sponsors/'.$sponsor['img'])){
                    $sponsor['img'] = 'default.png';
                }
            ?>
            <div class="one-third column sponsor <?= $css ?>">
                <a href="<?= $sponsor['url'];?>?<?= isset($sponsor['tracking']) ? $sponsor['tracking'] : $default_tracking ?>" target="_blank">
                    <img src="assets/images/2014/landing/sponsors/<?= $sponsor['img'];?>" alt="<?= $sponsor['alt'];?>">
                </a>
                <div class="sponsor-type sponsor-type-<?= $sponsor['type'];?>">
                    <?= $sponsor['type'];?> sponsor
                </div>
            </div>
            <?php
                
                if($i == 3){
                    $i=0;
                }
                $i++;
            endforeach;
            ?>
        	</div>



        	<h1>Support in Communication</h1>

	        <div class="center clearfix">
            <?php 
            $i = 1;
            foreach ($apoyan as $apoya):
                if($i==1){
                    $css = 'alpha';
                } elseif ($i == 2){
                    $css = '';
                } elseif ($i == 3){
                    $css = '';
                } else {
                    $css = 'omega';
                }
                if(!is_file('./assets/images/2014/landing/apoya/'.$apoya['img'])){
                    $apoya['img'] = 'default.jpg';
                }
            ?>
            <div class="four columns apoya <?= $css ?>">
                <a href="<?= $apoya['url'];?>?<?= isset($apoya['tracking']) ? $apoya['tracking'] : $default_tracking ?>" target="_blank">
                    <img src="assets/images/2014/landing/apoya/<?= $apoya['img'];?>" alt="<?= $apoya['alt'];?>">
                </a>
                
            </div>
            <?php
                
                if($i == 4){
                    $i=0;
                }
                $i++;
            endforeach;
            ?>
        	</div>

        	<br><br>

	    </section>
	</div>




	<div class="blue-wrapper wrapper-2013" id="edicion2013">

	    <div class="container container-with-margin">

	        <section class="sixteen columns anterior clearfix">

	            <h1 id="speakers">What happened in <a href="http://tech.meetup.uy/v2013/" target="_blank">2013 <span>view</span></a></h1>

	            <p>Past edition was a smashing success; more than <strong>320 people</strong> joined us from many different tech-related environments. We had a track with <strong>10 talks</strong> executed by <br/><strong>11 excellent speakers</strong>. In parallel with the main track, the different communities carried on <strong>6 workshops</strong> with lots of success in assistance. Last but not least,<br/> <strong>28 companies</strong> supported us, to which we owe them the realization of this conference.</p>

	            <h3>ARE YOU GOING TO MISS IT?</h3>

	            <a href="http://vimeo.com/97064014" target="_blank" class="btn btn-yellow video-trigger" >Watch video</a>
	            
	            <div class="header-video-2013">
	                <img _src="assets/images/2013.jpg" class="header-video--media-2013" data-video-src="97064014" data-teaser-source_="assets/images/2013" data-provider="Vimeo" data-video-width="500" data-video-height="281">
	            </div>
	            

	        </section>
	    </div>
	</div>




	<div class="container container-with-margin" id="organiza">
	    <section class="sixteen columns organizers clearfix">

	    	<h1 id="organizadores">Organisers</h1>
	    	
	    	<div class="center clearfix">

	    		<div class="two columns organizer alpha"><!-- placeholder --></div>

    			<div class="four columns organizer">
    	    		<img src="assets/images/2014/landing/organizers/diego_sapriza.jpg" alt="Diego Sapriza">
    				<h4>Diego Sapriza</h4>
    				<a href="http://twitter.com/AV4TAr" target="_blank">@AV4TAr</a>
				</div>
				
				<div class="four columns organizer">
		    		<img src="assets/images/2014/landing/organizers/gustavo_armagno.jpg" alt="Gustavo Armagno">
					<h4>Gustavo Armagno</h4>
					<a href="http://twitter.com/GustavoArmagno" target="_blank">@GustavoArmagno</a>
				</div>
				
				<div class="four columns organizer omega">
		    		<img src="assets/images/2014/landing/organizers/nacho_nin.jpg" alt="Ignacio Nin">
					<h4>Ignacio Nin</h4>
					<a href="http://twitter.com/nachexnachex" target="_blank">@nachexnachex</a>
				</div>

				<div class="clear"></div>
				
				<br>
				
				<div class="four columns organizer alpha">
		    		<img src="assets/images/2014/landing/organizers/martinc.jpg" alt="Martín Cabrera">
					<h4>Martín Cabrera</h4>
					<a href="http://twitter.com/murtun" target="_blank">@murtun</a>
				</div>

				<div class="four columns organizer">
		    		<img src="assets/images/2014/landing/organizers/martin_loy.jpg" alt="Martín Loy">
					<h4>Martín Loy</h4>
					<a href="http://twitter.com/martinloy" target="_blank">@martinloy</a>
				</div>

				<div class="four columns organizer">
		    		<img src="assets/images/2014/landing/organizers/fabian.jpg" alt="Martín Loy">
					<h4>Fabián Fernandez</h4>
					<a href="http://twitter.com/fabifernandez23" target="_blank">@fabifernandez23</a>
				</div>

				<div class="four columns organizer omega">
		    		<img src="assets/images/2014/landing/organizers/nicolasb.jpg" alt="Nicolás Bianchi">
					<h4>Nicolás Bianchi</h4>
					<a href="http://twitter.com/nicobf" target="_blank">@nicobf</a>
				</div>

			</div>

    <div class="container container-with-margin" id="apoya-orga">
       <section class="sixteen columns organizers clearfix">

          <h1 id="apoyan-organizacion">Supporting organisers</h1>


		    	<div class="four columns organizer alpha">
    	    		<img src="assets/images/2014/landing/helpers/ismael.jpeg" alt="Ismael Ambrosi" style="width: 50%;">
    				<h4>Ismael Ambrosi</h4>
    				<a href="http://twitter.com/iambrosi" target="_blank">@iambrosi</a>
				</div>
				
				<div class="four columns organizer">
		    		<img src="assets/images/2014/landing/helpers/santiagocamelo.jpg" alt="Santiago Camelo" style="width: 50%;">
					<h4>Santiago Camelo</h4>
					<a href="http://twitter.com/trikanna" target="_blank">@trikanna</a>
				</div>

				<div class="four columns organizer">
		    		<img src="assets/images/2014/landing/helpers/federicofernandez.jpg" alt="Federico Fern&aacute;ndez" style="width: 50%;">
					<h4>Federico Fern&aacute;ndez</h4>
					<a href="http://twitter.com/mstekl" target="_blank">@fede524</a>
				</div>

				<div class="four columns organizer omega">
		    		<img src="assets/images/2014/landing/helpers/maximogomez.jpg" alt="" style="width: 50%;">
					<h4>M&aacute;ximo G&oacute;mez</h4>
					<a href="http://twitter.com/maximogomez" target="_blank">@maximogomez</a>
				</div>

				<div class="clear"></div>
				
				<br>
				
				<div class="four columns organizer omega">
		    		<img src="assets/images/2014/landing/helpers/diegomartinez.jpg" alt="Diego Mart&iacute;nez" style="width: 50%;">
					<h4>Diego Mart&iacute;nez</h4>
					<a href="http://twitter.com/DiMaNachoM" target="_blank">@DiMaNachom</a>
				</div>
				
				<div class="four columns organizer alpha">
		    		<img src="assets/images/2014/landing/helpers/mauriciostekl.jpg" alt="Mauricio Stekl" style="width: 50%;">
					<h4>Mauricio Stekl</h4>
					<a href="http://twitter.com/mstekl" target="_blank">@mstekl</a>
				</div>

			</div>
		</section>
	</div>




	<div class="footer-wrapper">
		<footer>
			<div class="container">
		        <section class="sixteen columns footer clearfix">
		        	
	                <div class="seven columns alpha omega">
		        		<h4>General Enquiries</h4>
		        		<p><a href="mailto:info@meetup.uy">info@meetup.uy</a></p>
		        		
		        		<h4>Organization</h4>
		        		<p><a href="mailto:organizacion@meetup.uy">organizacion@meetup.uy</a></p>

		        		<h4>Comunication</h4>
		        		<p><a href="mailto:comunicacion@meetup.uy">comunicacion@meetup.uy</a></p>
		        		
		        		<h4>Phone</h4>
		        		<p><a href="phone:+59827078003">+598 2 707 8003</a></p>

	                    <div class="social-icons">
	                        <ul>
	                            <li><a href="https://twitter.com/meetupuy"                            target="_blank"><i class="fa fa-twitter-square"></i>twitter</a></li>
	                            <li><a href="https://www.facebook.com/meetupuy"                       target="_blank"><i class="fa fa-facebook-square"></i>facebook</a></li>
	                            <li><a href="https://www.youtube.com/user/meetupuy"                   target="_blank"><i class="fa fa-youtube-square"></i>youtube</a></li>
	                            <li><a href="https://plus.google.com/u/0/115708920691702747812/posts" target="_blank"><i class="fa fa-google-plus-square"></i>google+</a></li>
	                        </ul>
	                    </div>

		        	</div>
		        	<div class="nine columns alpha omega">
		        		<a href="eng.php">
		        			<img src="assets/images/2014/landing/logo-footer.png" alt="">
		        		</a>
		        		<p>“A day of professional upgrade and networking of the highest quality.”</p>
		        		<a href="code_of_conduct.php" class="code-of-conduct btn btn-blue">Code of Conduct</a>
		        		<a STYLE="VISIBILITY:HIDDEN" class="hostedby" href="http://servergrove.com/" target="_blank">
		        			<p><small>Hosted by</small></p>
		        			<img src="assets/images/2014/landing/sg230x35_g.png" alt="Hosted by ServerGrove">
		        		</a>
		        		<div class="made-with-love">made with <span class="heart">&#9829;</span> by <a target="_blank" href="http://twitter.com/trikanna">@trikanna</a></div>
		        	</div>

	                <div class="clear"></div>

	                

		        </section>
		        
		    </div>
		    
	    </footer>
	    
	</div>


    <script src="assets/javascripts/jquery.min.js"></script>
    <script src="assets/javascripts/modernizr.js"></script>

    <script src="assets/javascripts/plugins.js"></script>
    <script src="assets/javascripts/script.js"></script>
    <script src="assets/javascripts/application.js"></script>

    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-34814216-1', 'meetup.uy');
	  ga('send', 'pageview');
	
	</script>

</body>
</html>
