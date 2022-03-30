<?php $__env->startSection('extracss'); ?>
<!-- aqui añadimos mas css para esta vista en concreto, si fuera necesario-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="main-area">


	<div class="row">
		<div class="col-xs-4 text-left">
			<a  href="#main-carousel" role="button" data-slide="prev">
			<img class="" height="100px" style="margin-bottom: 10px;" src="<?php echo e(url('')); ?>/packages/images/footer1.png" />
			 </a>
		</div>
		<div class="col-xs-4 text-center">
			<img class="" height="100px" style="margin-bottom: 10px;" src="<?php echo e(url('')); ?>/packages/images/footer2.png" />
		</div>
		<div class="col-xs-4 text-right">
			<a  href="#main-carousel" role="button" data-slide="next">
			<img class="" height="80px" style="margin-bottom: 10px;" src="<?php echo e(url('')); ?>/packages/images/footer3.png" />
			</a>
		</div>
	</div>
	<br/><br/>
	<!-- main carousel -->
	<div id="main-carousel" class="carousel slide fullh">
	<!-- data-ride="carousel" data-interval="10000" data-keyboard="true" -->

	<!-- Wrapper for slides -->
	<div class="carousel-inner fullh" role="listbox">

	<?php $__currentLoopData = $html->resultfinal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $grup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
				
			<?php if($key%40==0 && $key>0): ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

			
					<?php if($key%40==0 || $key==0): ?>
					<div class="fullh item <?php if($key==0): ?> active <?php endif; ?> ">
						<div class="results-col fullh">
							<div class="row fullh">
					<?php endif; ?>		
					
						<div class="col-xs-3  text-left vertical-margin">
							<label class="hidden"><?php echo e($grup[0]->cat_name); ?> -  GRUP <?php echo e($grup[0]->grupo); ?></label>
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
								<?php $__currentLoopData = $grup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g => $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li class="hidden">
										<div class="row partido" data-match="<?php echo e($match->id); ?>">
											<div class="col-xs-1 text-right"><span class="dia"><?php echo e($match->dia); ?></span></div>
											<div class="col-xs-2 text-center"><span class="hora"><?php echo e($match->hora); ?></span></div>
											<div class="col-xs-1 text-center"><span class="camp"><?php echo e($match->campo); ?></span></div>
											<div class="col-xs-3 text-center ">
												<div class="team-name1 white-shadow equipo1_name" >
													<?php echo e($match->equipo1_name); ?>

												</div>
											</div>
											<div class="col-xs-1 text-center points1">
													<?php echo e($match->points1); ?>

		
											</div>
											<div class="col-xs-1 text-center points2">
													<?php echo e($match->points2); ?>

											</div>
											<div class="col-xs-3 text-center ">
												<div class="team-name1 white-shadow equipo2_name" >
													<?php echo e($match->equipo2_name); ?>

												</div>
											</div>
										</div>
									</li>	
									
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							</ul>
						
				
						<br/>
						</div>
		
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
				</div>
				</div>
			</div>
		</div>
	</div><!-- END main carousel -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extrajs'); ?>
<!-- aqui añadimos mas JS para esta vista en concreto, si fuera necesario-->
<script type="text/javascript">
		document.body.style.zoom = 0.25
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
						
						if(msg.VALUE.length!=0){
							jQuery(el).html(html);
							jQuery(el).find('li').removeClass('hidden').addClass('animated fadeInDown');
						}else{
							jQuery(el).html('');
						}
					}else{
						//console.log('error');
					}
			  });
			});
		}
	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>