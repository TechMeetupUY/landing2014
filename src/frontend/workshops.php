<?php
/*
	array(
		'img' => '',
		'titulo' => '',
		'descripcion' => '',
		'trainers' => '',
		'reqs' => ''
	),
*/
$workshops = array(
	array(
		'img' => 'mobile_testing.png',
		'titulo' => 'Los nuevos desafíos en Mobile Testing',
		'descripcion' => 'Probar aplicaciones móviles presenta desafíos extras asociados a la diversidad de dispositivos, sistemas operativos y las exigencias de los diversos usuarios. Asegurar que la aplicación funcione en los dispositivos que el mercado utiliza, sea performante, segura, usable, etc., son las inquietudes e incertidumbres que percibimos.

¿Cuales son los nuevos desafíos? ¿Qué necesitamos aprender en estas plataformas?
¿Qué herramientas hay disponibles? ¿Qué pasa con la usabilidad, cómo la probamos?
Estas y otras preguntas son las que estaremos en este workshop mostrando cómo las abordamos en Abstracta, compartiendo nuestras experiencias e investigación al respecto.',
		'trainers' => 'by Abstracta',
		'reqs' => 'Un smart device cualquiera.'
	),
	array(
		'img' => 'ios.png',
		'titulo' => 'iOS Hands On!',
		'descripcion' => '¿Tenés ganas de aprender a crear aplicaciones iOS? ¿Estás recién arrancando? 
Este es el momento!
No es necesario que sepas de Objective-C ni que conozcas cómo funciona el Xcode. 
En el workshop iremos paso a paso, no sólo para aprender, sino también para 
terminar creando tu primer app.',
		'trainers' => 'Nicolás Alliaume, Diego Mazzone by <a href="http://www.meetup.com/applemvd/">AppleMVD meetup</a>',
		'reqs' => 'Es necesario traer una Mac, o juntarse con un compañero que tenga una, con el Xcode Instalado (versión 5.1.1 o superior). No es necesario tener conocimientos de Objective-C o C, pero sí de programación orientada a objetos.'
	),
	array(
		'img' => 'arduino.png',
		'titulo' => 'Introducción a Arduino.',
		'descripcion' => 'Taller de introducción al Arduino donde los participantes aprenderán a trabajar con la placa Arduino, conocer el IDE y ejecutar ejemplos básicos usando diferente hardware. 

		Además los participantes (con la ayuda de los docentes) deberán programar un juego usando la placa Arduino. Realizaremos una competencia final usando el juego desarrollado por los participantes.',
		'trainers' => 'by <a href="http://www.mvdrobotics.com/">MVDRobotics</a>',
		'reqs' => 'Nosotros nos encargamos! :) '
	),
	array(
		'img' => 'nodejs.png',
		'titulo' => 'NodeJS para principiantes.',
		'descripcion' => 'Veremos:
		<ul>
<li>Nodejs, npm, console y debugger, una vista rápida.</li>
<li>Línea de comandos con Nodejs, E/S sincrónica, asincrónica, EventLoop. </li>
<li>Nodejs API y uso de módulos. Uso de Http cliente/servidor.</li>
<li>Crear un servidor con API en JSON.</li></ul>',
		'trainers' => 'Martin Prunell, Pablo Ricco, Luis Cal y Pablo de Juan by <a href="http://www.meetup.com/mvd-js/">MVDjs meetup</a></li>',
		'reqs' => '<ul><li>Nociones elementales de programación y de JavaScript. El taller será de enfoque netamente práctico orientado a principiantes en NodeJS.
		<li>Se utilizará un programa de NodeJS para el taller y se requiere equipo propio, Linux, Mac o Windows. El material adicional se entregará en el taller.</li></ul>'
	),
	array(
		'img' => 'dev_toolbox.png',
		'titulo' => 'The Modern Developer Toolbox',
		'descripcion' => 'En los últimos años ha habido un tremendo progreso e innovación en herramientas y aplicaciones disponibles para que el desarrollador web mejore la calidad, eficiencia y velocidad de sus aplicaciones. Es difícil estar al tanto de todas estas actualizaciones.

En esta charla introduciremos y exploraremos las herramientas que marcan una real diferencia en las siguientes áreas:

<ul><li>Desarrollo, testeo y debugging con Vagrant, Ansible, y Docker.</li>
<li>Monitoreo y logging con Logstash, Kibana, Redis, y Elasticsearch</li>
<li>Deployment con Capistrano, Capifony y similares</li></ul>

Todas estas herramientas, además de consejos y trucos aprendidos a lo largo de años de experiencia harán de esta charla muy interesante para desarrolladores de diversos niveles.',
		'trainers' => '<a href="https://twitter.com/pgodel">Pablo Godel</a> by <a href="http://phpmvd.uy">PHPmvd meetup</a>',
		'reqs' => ''
	),
	array(
		'img' => 'golang.png',
		'titulo' => 'Programación concurrente en GO',
		'descripcion' => '... próximamente ...',
		'trainers' => '<a href="http://fernandoipar.com/">Fernando Ipar</a>',
		'reqs' => ''
	),
	array(
		'img' => 'scala.png',
		'titulo' => 'Scala',
		'descripcion' => 'Introducción a las herramientas específicas que usaremos para resolver dos ejercicios realistas.

Los ejercicios son tareas específicas con múltiples modos de solución; extracción de información de un archivo de texto no estructurado y extracción de información de archivos csv con información financiera. ',
		'trainers' => '<a href="https://twitter.com/fedesilva">Federico Silva</a> by <a href="http://www.meetup.com/Scala-Meetup-MVD/">Scala Meetup</a>',
		'reqs' => '<ul><li>Java >= 1.6 (jdk)</li>
<li>Editor de texto y IDE </li>
<li>sbt</li>
</ul>
Instrucciones se publicarán en la web una semana antes.

Se asumen conocimientos generales de programación en un lenguaje como Java o Ruby.',
	),
	array(
		'img' => 'openstack.png',
		'titulo' => 'OpenStack',
		'descripcion' => 'OpenStack es el proyecto más activo de los últimos años en el mundo del Open Source. Las empresas más grandes del planeta han puesto sus ojos en el. Todos los días aparecen nuevas funcionalidades y líneas de código. 
		<br>Ésta charla es una presentación de OpenStack, qué es, para que se puede usar y qué camino tomar para entrar al mundo del cloud computing basado en Open Source.',
		'trainers' => '<a href="https://twitter.com/DiegoWoitasen">Diego Woitasen</a> by <a href="http://www.meetup.com/DevOps-MVD/">DevOps Meetup</a>',
		'reqs' => '',
	),
	array(
		'img' => 'mysql.png',
		'titulo' => 'Big Data Analytics: cálculos al estilo map-reduce en MySQL con Shard Query.',
		'descripcion' => '',
		'trainers' => 'Agustín Gallego, <a href="http://fernandoipar.com/">Fernando Ipar</a> by <a href="http://www.meetup.com/The-Montevideo-MySQL-Meetup-Group/">Mysql Meetup</a>',
		'reqs' => ''
	),
	array(
		'img' => 'agile.png',
		'titulo' => 'Agile Inception',
		'descripcion' => 'La descripción canónica de Scrum (tal como se describe en <a href="http://scrumguides.org/">http://scrumguides.org/</a>) da por sentado que existe un backlog inicial con el alcance preliminar del proyecto, que va refinándose a medida que pasan los sprints. 

Lo que Scrum en particular no aclara en detalle es cómo se define el proyecto antes de iniciarlo. Sin embargo, la comunidad Scrum utiliza frecuentemente una técnica de alineamiento de visión de proyecto conocida como Agile Inception. 

En este breve taller realizaremos un ejercicio acelerado sobre un proyecto ficticio, recorriendo las diez actividades de Inception: 
¿Porqué estamos aquí?
Elevator Pitch
Caja de Producto
Lo que no
Comunidad del Proyecto
La solución
¿Qué nos quita el sueño?
Tamaño
Prioridades
¿Cuánto cuesta? 

El objetivo principal del taller es que los participantes tengan la experiencia suficiente como para facilitar uno de estos talleres en sus propios proyectos.
',
		'trainers' => '',
		'reqs' => ''
	),
);
?>
