<?php $__env->startSection('extracss'); ?>
<!-- aqui añadimos mas css para esta vista en concreto, si fuera necesario-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br />
<div class="">
	
<?php $__currentLoopData = $html->result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<div class="results-col ">
			<div class="row ">
			<div class="col-xs-12"><hr /></div>
		
			<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namegrup => $grup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if(count($grup)!=0): ?>
				<div class="col-xs-12  text-center vertical-margin">
					<div class="well" style="margin-bottom:50px;">
						<label><?php echo e($key); ?> - GRUP <?php echo e($namegrup); ?></label>
						<ul class="list-unstyled partidos-ul" data-groupid="<?php echo e($namegrup); ?>">
							<?php $__currentLoopData = $grup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
								<li id="<?php echo e($match->id); ?>">
									
									<div class="row" style="text-align: center;">
										<div class="col-xs-4">Dia: 
											<div class="form-group">
											    <input type="text" class="form-control" data-match="<?php echo e($match->id); ?>" name="dia" value="<?php echo e($match->dia); ?>" >
										  	</div>
									   </div>
										<div class="col-xs-4">Hora: 
											<div class="form-group">
											    <input type="text" class="form-control" data-match="<?php echo e($match->id); ?>" name="hora" value="<?php echo e($match->hora); ?>" >
										  	</div>
										</div>
										<div class="col-xs-4">Camp: 
											<div class="form-group">
											    <input type="text" class="form-control" data-match="<?php echo e($match->id); ?>" name="campo" value="<?php echo e($match->campo); ?>" >
										  	</div>
										</div>										
									</div>
									<div class="row" >
										<div class="col-xs-5 text-center">

											 <div class="form-group">
											    <input type="text" name="equipo1_name" data-match="<?php echo e($match->id); ?>" class="form-control" value="<?php echo e($match->equipo1_name); ?>" >
											  </div>
										
										</div>
										<div class="col-xs-1 text-center">
											<div class="form-group">
											    <input type="text" name="points1" data-match="<?php echo e($match->id); ?>" class="form-control" value="<?php echo e($match->points1); ?>" >
										   </div>
										
										
										</div>
										<div class="col-xs-1 text-center">
										  <div class="form-group">
											    <input type="text" name="points2" data-match="<?php echo e($match->id); ?>" class="form-control" value="<?php echo e($match->points2); ?>" >
										   </div>
										   
										</div>										
										<div class="col-xs-5 text-center">
										  
										   <div class="form-group">
											    <input type="text" name="equipo2_name" data-match="<?php echo e($match->id); ?>" class="form-control" value="<?php echo e($match->equipo2_name); ?>" >
										   </div>
										</div>
									</div>
								
								</li>
								<hr/>
						
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						</ul>	
						<?php $ranking = App\Ranking::where('categoria','=',$key)->where('grupo','=',$namegrup)->orderBy('orden','ASC')->get(); ?>
						<?php if($ranking): ?>
						<label class="">RANKING <?php echo e($namegrup); ?></label>
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
						<ul class="list-unstyled ranking-ul" data-categoria="<?php echo e($key); ?>" data-grupo="<?php echo e($namegrup); ?>">
							<?php $__currentLoopData = $ranking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="">
								<div class="row ranking" >
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="orden" value="<?php echo e($rank->orden); ?>" >
									  	</div>
							 		</div>
									 <div class="col-xs-2 text-center">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="equipo" value="<?php echo e($rank->equipo); ?>" >
									  	</div>
									 	
									 </div>
									 <div class="col-xs-1 text-right">
									 	
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="PJ" value="<?php echo e($rank->PJ); ?>" >
									  	</div>
									 	
									 </div>
									 <div class="col-xs-1 text-right"><span class="PG">
									 	
								 		<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="PG" value="<?php echo e($rank->PG); ?>" >
									  	</div>
								  	</div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="PE" value="<?php echo e($rank->PE); ?>" >
									  	</div>
									 </div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="PP" value="<?php echo e($rank->PP); ?>" >
									  	</div>
									 </div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="GF" value="<?php echo e($rank->GF); ?>" >
									  	</div>
									 </div>
									<div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="GC" value="<?php echo e($rank->GC); ?>" >
									  	</div>
									 </div>
									 <div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="PTS" value="<?php echo e($rank->PTS); ?>" >
									  	</div>
									 </div>
 									<div class="col-xs-1 text-right">
									 	<div class="form-group">
										    <input type="text" class="form-control" data-ranking="<?php echo e($rank->id); ?>" name="COEFICIENTE" value="<?php echo e($rank->COEFICIENTE); ?>" >
									  	</div>
									 </div>									 
								</div>
								
							</li>
						
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						</ul>
						<?php endif; ?>	
						
					</div>
				</div>
			
			<?php endif; ?>
		
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			
			</div>
		</div>
		
		
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			


</div>		


</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extrajs'); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>