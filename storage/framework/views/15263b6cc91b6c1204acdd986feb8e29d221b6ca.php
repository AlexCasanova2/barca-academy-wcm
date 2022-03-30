<?php $__env->startSection('extracss'); ?>
<!-- aqui añadimos mas css para esta vista en concreto, si fuera necesario-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br />
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-warning text-center">
				<p><a target="_blank" href="/live">Go live</a></p>
			</div>	
		</div>
	</div>
	
	<div class="row">
	<?php $__currentLoopData = $html->cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-xs-6">
		<div class="alert alert-success text-center">
			<p><a href="/admin/<?php echo e(strtolower($cat)); ?>"><?php echo e($cat); ?></a></p>
		</div>		
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
				
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-warning text-center">
				<p><a target="_blank" href="/livefinal">Go live finals</a></p>
			</div>	
		</div>
	</div>			
	<div class="row">
	<?php $__currentLoopData = $html->cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-xs-6">
		<div class="alert alert-success text-center">
			<p><a href="/admin/finals/<?php echo e(strtolower($cat)); ?>"><?php echo e($cat); ?> Finals</a></p>
		</div>		
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	
	<div class="row">
		<div class="col-xs-12">
			<label>Tots els Partits</label>
			<br/><br/>
				<table class="table" id="table">
					<thead>
						<tr>
							<th>Dia</th>
							<th>Hora</th>
							<th>Camp</th>
							<th>Cat</th>
							<th>Grup</th>
							<th>Equip1</th>
							<th>Equip2</th>
							<th class="col-xs-2"></th>
			
						</tr>
					</thead>
					<tbody>
						<!-- ajax loaded content -->
					</tbody>
				</table>
		</div>
	</div>
	
</div>		


</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extrajs'); ?>
<!-- aqui añadimos mas JS para esta vista en concreto, si fuera necesario-->
<script src="<?php echo e(url('')); ?>/packages/js/datatables.min.js"></script>

<script>

(function() {

	
		
	table = jQuery('#table').DataTable({
	"processing": true,
    	"serverSide": true,
    	"ajax": {
        "url": "/admin/ajax/datatable/",
        
    }
	});
	
	$('input').on('change',function(){
		var name = $(this).attr('name');
		var value = $(this).val();
		console.log(match);
		console.log(name);
		
		$.get( "/ws/edit", { match:match, name: name,value:value } )
		  .done(function( data ) {
		   
  		});
			
	});	
		
		
})();

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>