@extends('public.layout.main')

@section('extracss')
<!-- aqui añadimos mas css para esta vista en concreto, si fuera necesario-->
@endsection

@section('content')
	<div class="main-area">

	<!-- main carousel -->
	<div id="main-carousel" class="carousel slide fullh">
	<!-- data-ride="carousel" data-interval="10000" data-keyboard="true" -->

	<!-- Wrapper for slides -->
	<div class="carousel-inner fullh" role="listbox">
	<?php $i=0; ?>
	@foreach($html->result as $key => $cat)
		<div class="fullh item @if($i==0) active @endif ">
			<div class="results-col fullh">
				<div class="row fullh">
				@if($key!='ranking_'.$key)
					@foreach($cat as $namegrup => $grup)
					@if(count($grup)!=0)
						<div class="col-xs-2  text-left vertical-margin">
							<label class="hidden">{{$key}} - GRUP {{$namegrup}}</label>
							<ul class="list-unstyled partidos-ul">
								
								<li class="hidden">
									<div class="row partido">
										<div class="col-xs-1 text-right"><strong>Dia</strong></div>
										<div class="col-xs-2 text-center"><strong>Hora</strong></div>
										<div class="col-xs-1 text-center"><strong>Camp</strong></div>
										<div class="col-xs-6 text-center ">
										</div>
									</div>
									
								</li>
							
							
							</ul>
							
							<ul class="list-unstyled partidos-ul">
								@foreach($grup as $match)
								<li class="hidden">
								<div class="row partido" data-match="{{$match->id}}">
									<div class="col-xs-1 text-right"><span class="dia">{{$match->dia}}</span></div>
									<div class="col-xs-2 text-center"><span class="hora">{{$match->hora}}</span></div>
									<div class="col-xs-1 text-center"><span class="camp">{{$match->campo}}</span></div>
									<div class="col-xs-3 text-center ">
										<div class="team-name1 white-shadow equipo1_name" >
											{{$match->equipo1_name}}
										</div>
									</div>
									<div class="col-xs-1 text-center points1">
											{{$match->points1}}

									</div>
									<div class="col-xs-1 text-center points2">
											{{$match->points2}}
									</div>
									<div class="col-xs-3 text-center ">
										<div class="team-name1 white-shadow equipo2_name" >
											{{$match->equipo2_name}}
										</div>
									</div>

								</div>
									
								</li>
							
								@endforeach	
							</ul>
						</div>
					@endif
					@endforeach
				@else
				
				@endif
					
				</div>
			</div>
		</div>

	<?php $i++;?>
	@endforeach			


						
	
		

		</div>
	</div><!-- END main carousel -->
	<div class="row">
		<div class="col-xs-4 text-left">
			<img class="" height="100px" style="margin-bottom: 10px;" src="{{url('')}}/packages/images/footer1.png" />
		</div>
		<div class="col-xs-4 text-center">
			<img class="" height="100px" style="margin-bottom: 10px;" src="{{url('')}}/packages/images/footer2.png" />
		</div>
		<div class="col-xs-4 text-right">
			<img class="" height="80px" style="margin-bottom: 10px;" src="{{url('')}}/packages/images/footer3.png" />
		</div>
	</div>

</div>

@endsection

@section('extrajs')
<!-- aqui añadimos mas JS para esta vista en concreto, si fuera necesario-->
<script type="text/javascript">
		jQuery(document).ready(function(){
			persiana();
			var $carousel = jQuery('#main-carousel');
			$carousel.carousel({ interval:  10000 , keyboard:true });
			$carousel.bind('slid.bs.carousel', function (e) {
					persiana();
			});

		});

		function persiana(){
			getPoints();
			jQuery('.carousel-inner .item .partidos-ul > li').attr('class','hidden');
			jQuery.each(jQuery('.carousel-inner .item.active .partidos-ul > li'), function(i, el){
			//jQuery('#round-and-category-name').text(jQuery('.carousel-inner .item.active .round-and-category-name').html());
				setTimeout(function(){
					jQuery(el).removeClass('hidden').addClass('animated fadeInDown');
				},( i * 50 ));
			});
			
			jQuery.each(jQuery('.carousel-inner .item.active label'), function(i, el){
				setTimeout(function(){
					jQuery(el).removeClass('hidden').addClass('animated fadeInDown');
				},( i * 50 ));
			});

		}

		function getPoints(){
		
			jQuery.each(jQuery('.carousel-inner .item.active .partidos-ul .partido'), function (i, el){
				
				var match = jQuery(el).data('match');
				params = { match:match}
				jQuery.ajax({
				  method: "GET",
				  url: "/ws/live",
				  data: params
				}).done(function( msg ) {
					if(msg.SUCCESS){
						var match = msg.VALUE;
						$.each( msg.VALUE,function(param,val){
							jQuery(el).find('.'+param).html(val);
						});

					}else{
						//console.log('error');
					}
			  });
			});
		}
	</script>


@endsection
