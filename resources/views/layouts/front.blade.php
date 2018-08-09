<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Gastro</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
	<header class="header-principal">
		<div class="wrapt wrapt-header">
			<div class="logo">
				<a href="{{ url('/') }}">
					<img src="{{ asset('img/logo-omar-alejo.png') }}" alt="">
				</a>
			</div>
			<div class="logo-blanco"><img src="{{ asset('img/logo-omar-alejo.svg') }}" alt=""></div>
			<section class="btn-menu">
				<div class="barrita"></div>
				<div class="barrita"></div>
				<div class="barrita"></div>
			</section>
			<nav>
				<ul>
					<li><a href="{{ url('/gastroenterologia/enfermedades-esofagicas') }}">Gastroenterología</a></li>
					<li><a href="{{ url('/cirugia-general-y-laparoscopica/extraccion-lipomas-quistes-sebaceos-ganglios') }}">Cirugía general y laparoscópica </a></li>
					<li><a href="{{ url('/endoscopia/endoscopia-superior') }}">Endoscopia gastrointestinal</a></li>
					<li><a href="{{ url('/omar-alejo') }}">Acerca de mi </a></li>
					<li><a href="{{ url('/blog') }}">Blog</a></li>
					<li><a href="{{ url('/contacto') }}">Agenda tu cita</a></li>
				</ul>
			</nav>
			<div class="contacto-header">
				<span class=""><p>Torre Animas, despacho 302, Xalapa, Ver. Tel. (228) 688 8121</p></span>
				<span class=""><p>Hospital Star Médica, cónsul. 601, Veracruz, Ver. Tel. (229) 688 5121</p></span>

			</div>
		</div>
	</header>
<div class="contenedor-circulo">

		<section class="circulos">
		</section>
</div>

@yield('content')

<footer>
	<div class="wrapt-footer">
		<section>
			<h4>Ubicación</h4>
			<article>
				<h5>Torre Ánimas</h5>
				<p>Despacho 302, Xalapa, Ver.</p>
				<p>Tel. (228) 688 8121</p>
			</article>
			<article>
				<h5>HOSPITAL STAR MÉDICA</h5>
				<p>Consultorio 601, Veracruz, Ver.</p>
				<p>Tel. (229) 688 5121</p>
				<p>Cel. (228) 123 5705</p>
			</article>
			<strong>Atención a pacientes particulares y de cualquier aseguradora.</strong>
		</section>
		<section>
			<h4>Contacto</h4>
			<p>Email: <span>contacto@gastro.com</span></p>
			<br>
			<h3>Horarios</h3>
			<p>Lunes a viernes de 9:00 a 14:00 y de 17:00 a 21:00 hrs.</p>
			<p>Sábados de 9:00 a 12:00 hrs. </p>
			<p>Urgencias las 24 horas</p>
		</section>
	</div>
</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="js/script.js"></script>

</body>
</html>
