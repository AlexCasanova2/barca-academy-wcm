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
				
					@foreach($cat as $namegrup => $grup)
					@if(count($grup)!=0)
					
						<div class="col-xs-3  text-left vertical-margin">
							<label class="hidden">{{$key}} - GRUP {{$namegrup}}</label>
							<ul class="list-unstyled title-ul">
								
								<li class="hidden">
									<div class="row ">
										<div class="col-xs-1 text-right"><strong>Dia</strong></div>
										<div class="col-xs-2 text-center"><strong>Hora</strong></div>
										<div class="col-xs-1 text-center"><strong>Camp</strong></div>
										<div class="col-xs-6 text-center ">
										</div>
									</div>
									
								</li>							
							
							</ul>
							<ul class="list-unstyled partidos-ul">
								@foreach($grup as $nameind => $match)
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
						
						
						<? $ranking = App\Ranking::where('categoria','=',$key)->where('grupo','=',$namegrup)->orderBy('orden','ASC')->get(); ?>
						<label class="hidden">RANKING {{$namegrup}}</label>
						<ul class="list-unstyled title-ul">
								
								<li class="hidden">
									<div class="row ">
										<div class="col-xs-1 text-right"></div>
										<div class="col-xs-2 text-center">Equip</div>
										 <div class="col-xs-1 text-right">PJ</div>
										 <div class="col-xs-1 text-right">PG</div>
										 <div class="col-xs-1 text-right">PE</div>
										 <div class="col-xs-1 text-right">PP</div>
										 <div class="col-xs-1 text-right">GF</div>
										 <div class="col-xs-1 text-right">GC</div>
										 <div class="col-xs-1 text-right">PTS</div>
										 <div class="col-xs-1 text-right">+/-</span></div>
									</div>
								</li>							
							
							</ul>
						<ul class="list-unstyled ranking-ul" data-categoria="{{$key}}" data-grupo="{{$namegrup}}">
							@foreach($ranking as $rank)
							<!--li class="hidden">
								<div class="row ranking" >
									 <div class="col-xs-1 text-right"><span class="orden">{{$rank->orden}}</span></div>
									 <div class="col-xs-2 text-center"><span class="equipo">{{$rank->equipo}}</span></div>
									 <div class="col-xs-1 text-right"><span class="PJ">{{$rank->PJ}}</span></div>
									 <div class="col-xs-1 text-right"><span class="PG">{{$rank->PG}}</span></div>
									 <div class="col-xs-1 text-right"><span class="PE">{{$rank->PE}}</span></div>
									 <div class="col-xs-1 text-right"><span class="PP">{{$rank->PP}}</span></div>
									 <div class="col-xs-1 text-right"><span class="GF">{{$rank->GF}}</span></div>
									 <div class="col-xs-1 text-right"><span class="GC">{{$rank->GC}}</span></div>
									 <div class="col-xs-1 text-right"><span class="PTS">{{$rank->PTS}}</span></div>
									 <div class="col-xs-1 text-right"><span class="COEFICIENTE">{{$rank->COEFICIENTE}}</span></div>
								</div>
								
							</li-->
						
							@endforeach	
						</ul>
						</div>
					@endif
					@endforeach
		
					
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
			getRanking();
			
			jQuery('.carousel-inner .item .partidos-ul > li').attr('class','hidden');
			jQuery.each(jQuery('.carousel-inner .item.active .partidos-ul > li'), function(i, el){
				setTimeout(function(){
					jQuery(el).removeClass('hidden').addClass('animated fadeInDown');
				},( i * 50 ));
			});
			
			jQuery.each(jQuery('.carousel-inner .item.active label'), function(i, el){
				setTimeout(function(){
					jQuery(el).removeClass('hidden').addClass('animated fadeInDown');
				},( i * 50 ));
			});
			
			jQuery.each(jQuery('.carousel-inner .item.active .ranking-ul > li'), function(i, el){
				setTimeout(function(){
					jQuery(el).removeClass('hidden').addClass('animated fadeInDown');
				},( i * 50 ));
			});
				jQuery.each(jQuery('.carousel-inner .item.active .title-ul > li'), function(i, el){
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

		function getRanking(){
		

			
			jQuery.each(jQuery('.carousel-inner .item.active .ranking-ul'), function (i, el){
				
				var categoria = jQuery(el).data('categoria');
				var grupo = jQuery(el).data('grupo');
				
				//console.log(ranking);
				params = { categoria:categoria,grupo:grupo}
				jQuery.ajax({
				  method: "GET",
				  url: "/ws/wsranking",
				  data: params
				}).done(function( msg ) {
					if(msg.SUCCESS){
						var match = msg.VALUE;
						var html = '';
						$.each( msg.VALUE,function(param,val){
							html+='<li class="hidden">';
							html+='<div class="row ranking" >';
							html+='<div class="col-xs-1 text-right"><span class="orden">'+val.orden+'</span></div>';
							html+='<div class="col-xs-2 text-center"><span class="equipo">'+val.equipo+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="PJ">'+val.PJ+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="PG">'+val.PG+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="PE">'+val.PE+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="PP">'+val.PP+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="GF">'+val.GF+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="GC">'+val.GC+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="PTS">'+val.PTS+'</span></div>';
							html+= '<div class="col-xs-1 text-right"><span class="COEFICIENTE">'+val.COEFICIENTE+'</span></div>';						
							html+='</div>';
							html+='</li>';
						});
						jQuery(el).html(html);
						jQuery(el).find('li').removeClass('hidden').addClass('animated fadeInDown');
					}else{
						//console.log('error');
					}
			  });
			});
		}
	</script>


@endsection
