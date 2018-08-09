@extends('layouts.front')

@section('content')


<div class="servicios">
	<section class="cajas-servicios">
		<article class="introduccion-servicios">
			<h2>Gastroenterología</h2>
			<p>Brindamos atención especializada y de excelencia para cada una de sus enfermedades digestivas, con un alto nivel de experiencia, calidez humana, ética y respeto. Explicando de forma clara y fácil su enfermedad, así como, las opciones diagnósticas y terapéuticas disponibles para su caso en particular, resolviendo todas sus dudas y teniendo como objetivo principal en todo momento, la resolución completa de su padecimiento cuando esto sea posible.</p>
		</article>
		<div class="cerrar-servicios">x</div>
		@foreach ($cards as $c)
			<a href="{{$c->slug}}">
			<div class="caja-servicios @if($c->list_title == $main->list_title) servicio-actual @endif">
				<div class="texto-caja-servicio">
					<p>{{ $c->list_title }}</p>
				</div>
				<figure>
					<img src="{{ asset($c->image) }}" alt="{{ $c->title }}">
				</figure>
			</div>
			</a>
		@endforeach



	</section>
	<section class="texto-servicios">
		<article>
			<figure><img src="{{ asset($main->image) }}" alt="{{ $main->title }}"></figure>
			<div class="texto-servicio">
				<h1>{{$main->title}}</h1>
				{!! $main->body !!}
			</div>
		</article>
		<div class="btn-servicios">Más servicios</div>
	</section>
</div>

@endsection
