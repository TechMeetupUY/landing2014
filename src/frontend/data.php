<?php

function filter_sponsor_type($sponsors, $type) {
    return array_filter($sponsors, function ($sponsor) {
        return $sponsor['type'] == $type;
    });
}

function shuffle_by_type($sponsors) {
    $green = filter_sponsor_type($sponsors, 'green');
    $blue = filter_sponsor_type($sponsors, 'blue');

    shuffle($green);
    shuffle($blue);

    return array_merge($green, $blue);

}
    
$default_tracking = 'utm_source=tech.meetup.uy&utm_medium=web&utm_campaign=landing2014';

$sponsors =  array(
    array(
        'alt' => 'CASE',
        'url' => 'http://case-inc.com',
        'img' => 'case.png',
        'type' => 'green'
    ),
    array(
        'alt' => 'Moove-it',
        'url' => 'http://moove-it.com',
        'img' => 'moove-it.png',
        'type' => 'green'
    ),
    array(
        'alt' => 'Mercaro Libre',
        'url' => 'http://www.mercadolibre.com.uy',
        'img' => 'mercadolibre.png',
        'type' => 'green'
    ),
    array(
        'alt' => 'Codigo del sur',
        'url' => 'http://www.codigodelsur.com',
        'img' => 'codigo-del-sur.png',
        'type' => 'green'
    ),
    array(
        'alt' => 'Netsuite',
        'url' => 'http://www.netsuite.com/',
        'img' => 'netsuite.png',
        'type' => 'green'
    ),
    array(
        'alt' => 'Guruhub',
        'url' => 'http://guruhub.com.uy',
        'img' => 'guruhub.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Grupo Jordan',
        'url' => '#',
        'img' => 'grupo-jordan.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'wyeworks',
        'url' => 'http://www.wyeworks.com',
        'img' => 'wyeworks.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'tryolabs',
        'url' => 'http://www.tryolabs.com/',
        'img' => 'tryolabs.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'PedidosYa',
        'url' => 'http://www.pedidosya.com.uy/',
        'img' => 'pedidosya.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'NEON ROOTS',
        'url' => 'http://www.neonroots.com/',
        'img' => 'neon-roots.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Rootstrap',
        'url' => 'http://rootstrap.it/',
        'img' => 'rootstrap.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Abstracta',
        'url' => 'http://www.abstracta.com.uy/',
        'img' => 'abstracta.png',
        'type' => 'blue'
    ),

    array(
        'alt' => 'InfUY',
        'url' => 'http://www.infuy.com/',
        'img' => 'infuy.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'kleer',
        'url' => 'http://www.kleer.la/',
        'img' => 'kleer.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'onetree',
        'url' => 'http://www.onetree.com/',
        'img' => 'onetree.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Pyxis',
        'url' => 'http://www.pyxisportal.com/',
        'img' => 'pyxis.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'aqua it',
        'url' => 'http://www.aquait.biz/',
        'img' => 'aquait.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Intraway Corporation',
        'url' => 'http://www.intraway.com/',
        'img' => 'intraway.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Vivid Cortex',
        'url' => 'https://vividcortex.com/',
        'img' => 'vivid.png',
        'type' => 'blue',
        'tracking' => 'utm_source=conf&utm_medium=tm'
    ),
    array(
        'alt' => 'Percona',
        'url' => 'http://www.percona.com',
        'img' => 'percona.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'El Pais',
        'url' => 'http://www.elpais.com.uy/',
        'img' => 'elpais.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Antel',
        'url' => 'http://www.antel.com.uy',
        'img' => 'antel.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'ANII',
        'url' => 'http://www.anii.org.uy/web/',
        'img' => 'anii.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Pepsi',
        'url' => '#',
        'img' => 'pepsi.png',
        'type' => 'blue'
    ),
    array(
        'alt' => 'Zillertal',
        'url' => '#',
        'img' => 'zillertal.png',
        'type' => 'blue'
    )
);  



$apoyan =  array(
    array(
        'alt' => 'Universidad de Montevideo',
        'url' => 'http://www.um.edu.uy/',
        'img' => 'universidad_montevideo.jpg'
    ),
    array(
        'alt' => 'Universidad ORT',
        'url' => 'http://www.ort.edu.uy/',
        'img' => 'universidad_ort.jpg'
    ),
    array(
        'alt' => 'Universidad Católica del Uruguay',
        'url' => 'http://www.ucu.edu.uy/',
        'img' => 'universidad_catolica.jpg'
    ),
    array(
        'alt' => 'Montevideo Valley',
        'url' => 'http://montevideovalley.uy/',
        'img' => 'montevideo_valley.jpg'
    ),
    array(
        'alt' => 'Cuti',
        'url' => 'http://www.cuti.org.uy/',
        'img' => 'cuti.jpg'
    ),
    array(
        'alt' => 'Facultad de Ingeniería',
        'url' => 'http://www.fing.edu.uy/',
        'img' => 'facultad_ingenieria.jpg'
    ),
    array(
        'alt' => 'Empower U',
        'url' => 'http://www.empower.edu.uy/',
        'img' => 'empower_u.jpg'
    ),
    array(
        'alt' => 'Ministerio de Educación y Cultura',
        'url' => 'http://www.mec.gub.uy/',
        'img' => 'mec.jpg'
    ),
    array(
        'alt' => 'Universidad de la Empresa',
        'url' => 'http://ude.edu.uy/',
        'img' => 'ude.jpg'
    ),
    array(
        'alt' => 'Escuela de Sistemas y Tecnologías BIOS',
        'url' => 'http://www.biosportal.com/sistemas_tecnologias/',
        'img' => 'bios.jpg'
    )
);  





$speakers =  array(
    array(
    	'flag' 		=> 'uy',
    	'name' 		=> 'Alvaro Videla',
    	'title' 	=> 'Developer Advocate para RabbitMQ / Pivotal',
    	'picture'   => 'alvaro.jpg',
        'twitter' 	=> 'old_sound',
        'linkedin' 	=> 'https://www.linkedin.com/in/alvarovidela'
    ),

    array(
    	'flag' 		=> 'uy',
    	'name' 		=> 'Victoria Alonsoperez',
    	'title' 	=> 'Co-Founder IEETECH, co-Chair <a href="https://twitter.com/SGAC" target="_blank">@SGAC</a>, Electronic Engineer, Entrepreneur, Space Geek',
    	'picture'   => 'victoria.jpg',
        'twitter' 	=> 'vic_alonsoperez',
        'linkedin' 	=> 'http://uy.linkedin.com/pub/victoria-alonsoperez/18/91/a43'
    ),
    array(
    	'flag' 		=> 'uy',
    	'name' 		=> 'Guillermo Moncecchi',
    	'title' 	=> 'Investigador en Procesamiento de Lenguaje Natural y Machine Learning en la <a href="http://www.universidad.edu.uy/" target="_blank">UDELAR</a> y en <a href="https://twitter.com/pedeciba" target="_blank">@pedeciba</a>.',
    	'picture'   => 'guillermo.jpg',
        'twitter' 	=> 'gmonce',
        'linkedin' 	=> ''
    ),
    array(
    	'flag' 		=> 'uy',
    	'name' 		=> 'Diego Cibils',
    	'title' 	=> 'Fundador de <a href="http://konacloud.io/" target="_blank">KonaCloud</a>',
    	'picture'   => 'diego.jpg',
        'twitter' 	=> 'aspekt',
        'linkedin' 	=> 'http://www.linkedin.com/in/diegocibils'
    ),
     array(
        'flag'      => '',
        'name'      => 'Próximamente...',
        'title'     => 'más anuncios.',
        'picture'   => '',
        'twitter'   => '',
        'linkedin'  => ''
    ),

);  
