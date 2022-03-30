@extends('admin.layout.main')

@section('extracss')
<!-- aqui añadimos mas css para esta vista en concreto, si fuera necesario-->
@endsection

@section('content')
<br />
<div class="">
	
@foreach($html->result as $key => $cat)

		<div class="results-col ">
			<div class="row ">
			<div class="col-xs-12"><hr /></div>
		
			@foreach($cat as $namegrup => $grup)
			@if(count($grup)!=0)
				<div class="col-xs-6  text-center vertical-margin">
					<div class="well" style="margin-bottom:50px;">
						<label>{{$key}} - GRUP {{$namegrup}}</label>
						<ul class="list-unstyled partidos-ul" data-groupid="{{$namegrup}}">
							@foreach($grup as $match)
						
								<li id="{{$match->id}}">
									
									<div class="row" style="text-align: center;">
										<div class="col-xs-4">Dia: 
											<div class="form-group">
											    <input type="text" class="form-control" data-match="{{$match->id}}" name="dia" value="{{$match->dia}}" >
										  	</div>
									   </div>
										<div class="col-xs-4">Hora: 
											<div class="form-group">
											    <input type="text" class="form-control" data-match="{{$match->id}}" name="hora" value="{{$match->hora}}" >
										  	</div>
										</div>
										<div class="col-xs-4">Camp: 
											<div class="form-group">
											    <input type="text" class="form-control" data-match="{{$match->id}}" name="campo" value="{{$match->campo}}" >
										  	</div>
										</div>										
									</div>
									<div class="row" >
										<div class="col-xs-5 text-center">

											 <div class="form-group">
											    <input type="text" name="equipo1_name" data-match="{{$match->id}}" class="form-control" value="{{$match->equipo1_name}}" >
											  </div>
										
										</div>
										<div class="col-xs-1 text-center">
											<div class="form-group">
											    <input type="text" name="points1" data-match="{{$match->id}}" class="form-control" value="{{$match->points1}}" >
										   </div>
										
										
										</div>
										<div class="col-xs-1 text-center">
										  <div class="form-group">
											    <input type="text" name="points2" data-match="{{$match->id}}" class="form-control" value="{{$match->points2}}" >
										   </div>
										   
										</div>										
										<div class="col-xs-5 text-center">
										  
										   <div class="form-group">
											    <input type="text" name="equipo2_name" data-match="{{$match->id}}" class="form-control" value="{{$match->equipo2_name}}" >
										   </div>
										</div>
									</div>
								
								</li>
								<hr/>
						
							@endforeach	
						</ul>	
						<? $ranking = App\Ranking::where('categoria','=',$key)->where('grupo','=',$namegrup)->orderBy('orden','ASC')->get(); ?>
						@if(count($ranking)!=0)
						<label class="">RANKING {{$namegrup}}</label>
						<ul class="list-unstyled title-ul">
								
								<li class="">
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
							<li class="">
								<div class="row ranking" >
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="orden" value="{{$rank->orden}}" >
									  	</div>
							 		</div>
									 <div class="col-xs-2 text-center">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="equipo" value="{{$rank->equipo}}" >
									  	</div>
									 	
									 </div>
									 <div class="col-xs-1 text-right">
									 	
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="PJ" value="{{$rank->PJ}}" >
									  	</div>
									 	
									 </div>
									 <div class="col-xs-1 text-right"><span class="PG">
									 	
								 		<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="PG" value="{{$rank->PG}}" >
									  	</div>
								  	</div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="PE" value="{{$rank->PE}}" >
									  	</div>
									 </div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="PP" value="{{$rank->PP}}" >
									  	</div>
									 </div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="GF" value="{{$rank->GF}}" >
									  	</div>
									 </div>
									<div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="GC" value="{{$rank->GC}}" >
									  	</div>
									 </div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="PTS" value="{{$rank->PTS}}" >
									  	</div>
									 </div>
 									<div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="{{$rank->id}}" name="COEFICIENTE" value="{{$rank->COEFICIENTE}}" >
									  	</div>
									 </div>									 
								</div>
								
							</li>
						
							@endforeach	
						</ul>
						@endif	
						
					</div>
				</div>
			
			@endif
		
			@endforeach	
			
			</div>
		</div>
		
		
@endforeach			


</div>		


</div>
@endsection

@section('extrajs')
<!-- aqui añadimos mas JS para esta vista en concreto, si fuera necesario-->

<script>
$(function() {

	$('.partidos-ul input').on('change',function(){
		var match = $(this).attr('data-match');
		var name = $(this).attr('name');
		var value = $(this).val();
		console.log(match);
		console.log(name);
		
		$.get( "/ws/edit", { match:match, name: name,value:value } )
		  .done(function( data ) {
		   
  		});
			
	});
	
	$('.ranking-ul input').on('change',function(){
		var match = $(this).attr('data-ranking');
		var name = $(this).attr('name');
		var value = $(this).val();
		console.log(match);
		console.log(name);
		
		$.get( "/ws/editranking", { match:match, name: name,value:value } )
		  .done(function( data ) {
		   
  		});
			
	});

	$('input').on('click',function(){
		this.select();
	});

	//para brakets


});

</script>

@endsection
