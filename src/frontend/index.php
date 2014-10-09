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
	            <a href="index.php" class="three columns alpha logo-container">
	                <img src="assets/images/2014/landing/logo.png" alt="">
	            </a>
	            <ul class="thirteen columns omega">
	                <li><a class="scrollable" href="#sponsors"      >Sponsors</a></li>
	                <li><a class="scrollable" href="#speakers"      >Oradores</a></li>
	                <li><a class="scrollable" href="#edicion2013"   >Ver Video</a></li>
	                <li><a class="scrollable" href="#organizadores" >Organiza</a></li>
	                
	                <li><a class="color-green" href="./v2013">v2013</a></li>
	                <li><a class="color-green" href="./v2012">v2012</a></li>
	                <li><a class="" href="eng.php">[en]</a></li>
	                
	            </ul>
	        </div>
	    </div>

	    <div class="header-video">
	    	
	    	
	        <img src="assets/images/2014.jpg" class="header-video--media" data-video-src="97064014" data-teaser-source="assets/images/techmeetup" data-provider="Vimeo" data-video-width="500" data-video-height="281">
	        
	                    
	        <div class="container clearfix">
	            <div class="header-event sixteen columns">
	                
	                <div class="header-place eleven columns alpha">
	                    <span class="header-date">14 y 15 de Noviembre 2014</span>
	                    <span class="header-divider">/</span>
	                    <span class="header-venue">Torre de las Telecomunicaciones de ANTEL</span>
	                </div>
	                
	                <div class="header-button five columns omega" >
	                    <a href="http://vimeo.com/97064014" target="_blank">
	                    	<img src="/assets/images/2014/landing/compra_ahora.png" alt="">
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>

	</header>




	<div class="container container-with-margin">
	    <div class="sixteen columns">
	        <section class="section-intro">
	            <h1 class="sixteen columns alpha omega">Nuestros objetivos:</h1>
	        </section>
	    </div>

	    
	    <div class="one-third column">
	        <h3 class="color-blue">Potenciar comunidades locales.</h3>
	        <p>La conferencia busca ser el día de reunión de todas las <a href="http://meetup.uy" target="_blank">comunidades de tecnología</a> de Uruguay, donde sus integrantes podrán intercambiar ideas y conocimiento para llevar sus comunidades al siguiente nivel.</p>
	    </div>
	    
	    <div class="one-third column">
	        <h3 class="color-blue">Impulsar a los estudiantes de IT.</h3>
	        <p>Creemos firmemente en que los ambientes descontracturados son el futuro de la educación.</p>
	    </div>
	    <div class="one-third column">
	        <h3 class="color-blue">Actualización profesional y Networking.</h3>
	        <p>No te podés perder la oportunidad de compartir junto con expertos este espacio de discusión y camaradería.</p>
	    </div>
	</div><!-- container -->


	
	<div class="blue-wrapper" id="speaker-list">
	    
	    <div class="container container-with-margins">
	        
	        <section class="sixteen columns speaker-list clearfix">
	            <h1>Speakers</h1>
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
                <?php if ($speaker['linkedin'] != '') { ?>
                <div class="handle linkedin">
                	<a href="<?= $speaker['linkedin'];?>" target="_blank">
                		<img src="/assets/images/2014/landing/speakers/handle_linkedin.png" alt="">	
                	</a>
                </div>
                <?php } ?>
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

		        <h1>Comprá tu Entrada</h1>
		        <p>Reservá tu lugar en la TechMeetup 2014 ahora!</p>
		        
				<br>

				<div style="width:100%; text-align:left;height:300px" >
					
					<iframe style="position: relative!important;" src="//eventbrite.com/tickets-external?eid=12222121695&ref=etckt" 
						frameborder="0" 
						height="247" 
						width="100%" 
						vspace="0" 
						hspace="0" 
						marginheight="5" 
						marginwidth="5" 
						scrolling="auto" 
						allowtransparency="true" >
					</iframe>

				</div>

				<div style="font-size:15px; padding:5px 0 5px; margin:2px; width:100%; text-align:center;" >
					<a style="color:black; text-decoration:none;" target="_blank" href="http://bit.ly/techmeetup14-beca">Si sos estudiante y querés solicitar una beca hace click <strong>aquí</strong></a> 
				</div>

				<br>

		    </section>
		</div>
	</div>




	<div class="container container-with-margin" id="sponsors">
	    <section class="sixteen columns sponsors clearfix">

	        <h1 >Sponsors</h1>
	        <p>TechMeetupUY es posible gracias a nuestros increíbles sponsors. Estamos muy agradecidos a cada una de las empresas que han apoyado y ayudado a hacer esta conferencia posible. Únete a nosotros y potencia la comunidad IT de Uruguay.</p>
	            <h2><a id="sponsors-pdf" href="docs/tech.meetup.uy.sponsors.v2014.pdf" target="_blank">Descarga el documento con los paquetes de apoyo</a></h2>
	            <p>Estamos abiertos a otras formas de apoyo, envíanos tu idea a <a href="mailto:info@meetup.uy">info@meetup.uy</a></p>

	        <h1>Apoyan</h1>

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
                <a href="<?= $sponsor['url'];?>?ref=techmeetup.uy" target="_blank">
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

        	

        	<h1>Apoyan en la Comunicación</h1>

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
                <a href="<?= $apoya['url'];?>?ref=techmeetup.uy" target="_blank">
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




	<div class="blue-wrapper" id="speakers">
	    <div class="container container-with-margins">
	        <section class="sixteen columns speakers clearfix">
	            <h1>Oradores</h1>
	            <h2>Tenés algo interesante que contar?</h2>
	        </section>

            <section class="sixteen columns speakers clearfix">
            	<a class="btn btn-white" href="https://docs.google.com/a/centra.com.uy/spreadsheet/viewform?usp=drive_web&formkey=dFppcTdWNXczZFQtRXJMWnYyeHNqLUE6MA#gid=24" target="_blank">Inscribite</a>
            	<br/><br/><br/>
            </section>

	        <section class="speakers-description clearfix">

	            <div class="one-third column">
	                <h3 class="color-white">Formato de las charlas</h3>
	                <p>Nuestras charlas consisten en exposiciones de 30 minutos, mas una sesión de preguntas de la audiencia de entre 5 y 10 minutos.</p>
	                <p>Presentamos charlas que, sin redundar demasiado en algún punto particular como para volverse pesadas, sean buenas introducciones o historias sobre una tecnología o metodología, que inspiren al participante a interesarse y profundizar en el tema por sí mismo.</p>
	                <p>Creemos en que una charla debe ser un impulso, una invitación a aprender, y buscamos que las charlas sean vehículos de aprendizaje tanto para el participante como para el expositor.</p>
	            </div>
	            
	            <div class="one-third column">
	                <h3 class="color-white">Público objetivo</h3>
	                <p>Tenemos un público muy amplio: profesionales de la industria TI, estudiantes de diverso origen, entusiastas del software y cultura.</p>
	                <p>Buscamos charlas que sean disfrutadas por la mayor parte de nuestra audiencia, incluso cuando el tema propuesto no caiga directamente bajo las áreas de interés típicas.</p>
	                <p>También buscamos la actualización del participante, y que el venir sea valedero año a año, lejos de ser algo repetitivo.</p>
	                <p>Junto a los oradores, desde la organización buscamos un balance para la conferencia tomada en su conjunto, y lograr cumplir los objetivos de los participantes.</p>
	            </div>
	            <div class="one-third column">
	                <h3 class="color-white">Presentando tus ideas</h3>
	                <p>Si ya tenés una charla preparada, o una idea muy formada de qué charla te gustaría exponer, hacenos llegar tu propuesta en formato de una descripción corta.</p>
	                <p>Si tenés una idea de qué te gustaría presentar, pero aún no sabés qué formato darle a la charla, ¡te podemos ayudar a darle forma! Escribinos una propuesta, sea directamente en el formulario o bien por correo a charlas@meetup.uy, y te daremos una mano para lograr una buena e interesante charla.</p>
	                <p>Muchos de nuestros oradores se estrenaron como tales en ediciones anteriores de Tech Meetup. <i>Uno de nuestros objetivos es formar oradores locales</i>. Si tenés una idea para la charla pero te cuesta preparar tu primer charla, ¡envianos la propuesta y te ayudaremos a crearla!</p>
	            </div>



            </section>

	    </div>
	</div>




	<div class="blue-wrapper wrapper-2013" id="edicion2013">

	    <div class="container container-with-margin">

	        <section class="sixteen columns anterior clearfix">

	            <h1 id="speakers">Lo que pasó en <a href="http://tech.meetup.uy/v2013/" target="_blank">2013 <span>ver</span></a></h1>

	            <p>La edición anterior fué un éxito rotundo, nos acompañaron más de <strong>320 personas</strong> provenientes de diferentes rubros relacionados con Tecnología. Tuvimos un track con 
	            <strong>10 charlas</strong>, ejecutadas por <strong>11 excelentes oradores</strong>. En paralelo al track principal, las diferentes comunidades realizaron <strong>6 workshops</strong> que fueron un éxito en asistencia. Por último y no menos importantes nos apoyaron <strong>28 empresas</strong> a las cuales les debemos la realización de esta conferencia.</p>

	            <h3>Te lo vas a perder?</h3>

	            <a href="http://vimeo.com/97064014" target="_blank" class="btn btn-yellow video-trigger" >Ver video</a>
	            
	            <div class="header-video-2013">
	                <img _src="assets/images/2013.jpg" class="header-video--media-2013" data-video-src="97064014" data-teaser-source_="assets/images/2013" data-provider="Vimeo" data-video-width="500" data-video-height="281">
	            </div>
	            

	        </section>
	    </div>
	</div>




	<div class="container container-with-margin" id="organiza">
	    <section class="sixteen columns organizers clearfix">

	    	<h1 id="organizadores">Organiza</h1>
	    	
	    	<div class="center clearfix">
		    	
		    	<div class="one-third column organizer alpha">
    	    		<img src="assets/images/2014/landing/organizers/diego_sapriza.jpg" alt="Diego Sapriza">
    				<h4>Diego Sapriza</h4>
    				<a href="http://twitter.com/AV4TAr" target="_blank">@AV4TAr</a>
				</div>
				
				<div class="one-third column organizer">
		    		<img src="assets/images/2014/landing/organizers/gustavo_armagno.jpg" alt="Gustavo Armagno">
					<h4>Gustavo Armagno</h4>
					<a href="http://twitter.com/GustavoArmagno" target="_blank">@GustavoArmagno</a>
				</div>
				
				<div class="one-third column organizer omega">
		    		<img src="assets/images/2014/landing/organizers/nacho_nin.jpg" alt="Ignacio Nin">
					<h4>Ignacio Nin</h4>
					<a href="http://twitter.com/nachexnachex" target="_blank">@nachexnachex</a>
				</div>

				<div class="clear"></div>
				
				<div class="one-third column organizer alpha">
		    		<img src="assets/images/2014/landing/organizers/martinc.jpg" alt="Martín Cabrera">
					<h4>Martín Cabrera</h4>
					<a href="http://twitter.com/murtun" target="_blank">@murtun</a>
				</div>

				<div class="one-third column organizer">
		    		<img src="assets/images/2014/landing/organizers/martin_loy.jpg" alt="Martín Loy">
					<h4>Martín Loy</h4>
					<a href="http://twitter.com/martinloy" target="_blank">@martinloy</a>
				</div>

				<div class="one-third column organizer omega">
		    		<img src="assets/images/2014/landing/organizers/nicolasb.jpg" alt="Nicolás Bianchi">
					<h4>Nicolás Bianchi</h4>
					<a href="http://twitter.com/nicobf" target="_blank">@nicobf</a>
				</div>

			</div>

		</section>
	</div>




	<div class="footer-wrapper">
		<footer>
			<div class="container">
		        <section class="sixteen columns footer clearfix">
		        	
	                <div class="seven columns alpha omega">
		        		<h4>Información General</h4>
		        		<p><a href="mailto:info@meetup.uy">info@meetup.uy</a></p>
		        		
		        		<h4>Organización</h4>
		        		<p><a href="mailto:organizacion@meetup.uy">organizacion@meetup.uy</a></p>

		        		<h4>Comunicación</h4>
		        		<p><a href="mailto:comunicacion@meetup.uy">comunicacion@meetup.uy</a></p>
		        		
		        		<h4>Teléfono</h4>
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
		        		<a href="index.php">
		        			<img src="assets/images/2014/landing/logo-footer.png" alt="">
		        		</a>
		        		<p>“Un día de actualización profesional y Networking de la más alta calidad.”</p>
		        		<a href="codigo_de_conducta.php" class="code-of-conduct btn btn-blue">Código de Conducta</a>
		        		<a STYLE="VISIBILITY:HIDDEN" class="hostedby" href="http://servergrove.com/" target="_blank">
		        			<p><small>Hosted by</small></p>
		        			<img src="assets/images/2014/landing/sg230x35_g.png" alt="Hosted by ServerGrove">
		        		</a>
		        		<div class="made-with-love">hecho con <span class="heart">&#9829;</span> por <a target="_blank" href="http://twitter.com/trikanna">@trikanna</a></div>
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
