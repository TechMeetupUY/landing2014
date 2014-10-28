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
	                <li><a class="scrollable" href="#workshops"     >Workshops</a></li>
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
      <section class="section-intro clearfix">
        <h1 class="center">&iquest;Preparado para la tercera edici&oacute;n?</h1>
      </section>

       <div class="sixteen columns">
         <h4>Se viene una nueva edici&oacute;n de la TechMeetup, y tenemos todo listo para mostrarte c&oacute;mo nuevamente <span class="color-blue">crecimos este a&ntilde;o</span>.</h4>
         <h3><span class="color-blue">Viernes 14: Workshops</span>&nbsp;Tras el &eacute;xito de los workshops en la <b>v2013</b>, queremos dedicarle un d&iacute;a entero a esta modalidad de trabajo, para brindarte <span class="color-blue">mas cantidad y dedicaci&oacute;n</span>.</h3>
         <h3><span class="color-blue">S&aacute;bado 15: Charlas</span>&nbsp;Nuestro tradicional track de charlas, siempre buscando la <span class="color-blue">excelente calidad</span> que conoc&eacute;s</h3>.
       </div>
    
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
	            <h1 id="speakers">Oradores</h1>
	        </section>

            <?php 
            foreach ($speakers as $speaker):
                if(!is_file('./assets/images/2014/landing/speakers/'.$speaker['picture'])){
                	$speaker['picture'] = 'default.jpg';
            	}
            ?>


            <div class="four columns speaker <?= $css ?>">
                <?php if($speaker['twitter'] != ''){ ?>
                <div class="handle twitter">
                	<a href="https://twitter.com/<?= $speaker['twitter'];?>" target="_blank">
                		<img src="/assets/images/2014/landing/speakers/handle_twitter.png" alt="">	
                	</a>
                </div>
                <?php } ?>
                <?php if ($speaker['linkedin'] != '') { ?>
                <div class="handle linkedin">
                	<a href="<?= $speaker['linkedin'];?>" target="_blank">
                		<img src="/assets/images/2014/landing/speakers/handle_linkedin.png" alt="">	
                	</a>
                </div>
                <?php } ?>
                <img class="avatar" src="assets/images/2014/landing/speakers/<?= $speaker['picture'];?>">
                
                
                <div class="speaker-info">
                	<?php if($speaker['flag'] != ''){ ?>
                		<img src="/assets/images/2014/landing/speakers/flags/<?= $speaker['flag'];?>.png">
                	<?php } ?>
                	<?= $speaker['name'];?>
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

		        <h1 style="color: black;">Comprá tu Entrada</h1>
		        <h3 style="color: black;">Reservá tu lugar en la TechMeetup 2014 ahora!</h3>
		        
				<br>

				<div class="eight columns alpha buy-with">
					<a href="http://www.eventbrite.com/e/registro-techmeetup-12222121695?aff=eorg" target="_blank">
						<img src="/assets/images/2014/landing/btn-paypal.png" alt="">
					</a>
				</div>

				<div class="eight columns omega buy-with">
					<a href="http://bit.ly/1sQatvY" target="_blank">
						<img src="/assets/images/2014/landing/btn-redpagos.png" alt="">
					</a>
				</div>

				<div class="clearfix"></div>

				<div style="font-size:16px; padding: 20px 0; margin:30px 0 0 0; width:100%; text-align:center;" >
					<a style="color:black; text-decoration:none;" target="_blank" href="http://bit.ly/techmeetup14-beca"><h4 style="color:black;">Si sos estudiante y querés solicitar una beca hace click <strong>aquí</strong></h4></a> 
				</div>

		    </section>
		</div>
	</div>




	<div class="white-wrapper">
	<div class="container container-with-margin" id="workshops">
	    <section class="sixteen columns workshops clearfix">

	        <h1>Workshops</h1>
	        <h3>Estos son los workshops que se realizarán el Viernes 14 de noviembre. <br>Serán sesiones técnicas de <strong>2</strong> horas,<br/>donde verás lo último en cada una de las disciplinas.</h3>
			<h4>En breve te enterarás cómo podrás inscribirte. ¡SOLO <strong>30 cupos</strong> para cada workshop!</h4>

			<br>


<?php
$workshops = include('workshops.php');
$max = count($workshops);
$i = 0;
do{
?>
<div class="row">

				<div class="eight columns alpha">

					<div class="two columns alpha">
						<img src="/assets/images/2014/landing/workshops/<?=$workshops[$i]['img']; ?>" alt="">
					</div>

					<div class="six columns omega" >
						
						<h3><?=$workshops[$i]['titulo']; ?></h3>
						
						<div class="paragraph">
							<p>
								<?= nl2br($workshops[$i]['descripcion']); ?>
							</p>
							<?php if($workshops[$i]['reqs']!==''){ ?>
							<p><strong>Requisitos</strong></p>
							<p>
								<?=$workshops[$i]['reqs']?>
							</p>
							<?php } ?>
							<ul class="inline unstyled">
								<li><i class="fa fa-link"></i> <?=$workshops[$i]['trainers']; ?></li>
							</ul>
							
						</div>
						<!-- .paragraph end -->

					</div>

				</div>

				<?php if(isset($workshops[$i+1])){  ?>

				<div class="eight columns omega">
					
					<div class="two columns alpha">
						<img src="/assets/images/2014/landing/workshops/<?=$workshops[$i+1]['img']; ?>" alt="">
					</div>

					<div class="six columns omega">
						<h3><?=$workshops[$i+1]['titulo']; ?></h3>
						
						<div class="paragraph">
							<p>
								<?= nl2br($workshops[$i+1]['descripcion']); ?>
							</p>
							<?php if($workshops[$i]['reqs']!==''){ ?>
							<p><strong>Requisitos</strong></p>
							<p>
								<?=$workshops[$i+1]['reqs']?>
							</p>
							<?php } ?>
							<ul class="inline unstyled">
								<li><i class="fa fa-link"></i> <?=$workshops[$i+1]['trainers']; ?></li>
							</ul>

						</div>
						<!-- .paragraph end -->

					</div>
				</div>
				<?php } ?>
			</div>
<?php
	$i = $i+2;
} while ($i<$max);

# include(__DIR__.'/workshops-form.php');
?>


	    </section>
	</div>
	</div>




	<div class="container container-with-margin" id="sponsors">
	    <section class="sixteen columns sponsors clearfix">

	        <h1 >Sponsors</h1>
	        <p>TechMeetupUY es posible gracias a nuestros increíbles sponsors. Estamos muy agradecidos a cada una de las empresas que han apoyado y ayudado a hacer esta conferencia posible.</p>
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

	            <h1>Lo que pasó en <a href="http://tech.meetup.uy/v2013/" target="_blank">2013 <span>ver</span></a></h1>

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
		    	
		    	<div class="two columns organizer alpha"><!-- placeholder --></div>

		    	<div class="four columns organizer ">
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
