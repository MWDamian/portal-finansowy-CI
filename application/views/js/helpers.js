



function toUpperLevel(button){
	$(button).closest('[data-level]').slideUp('fast',function(){
		currentLevel = $(this).data('level');
		upperLevel = parseInt(currentLevel)-1;
		$(button).closest('[data-level="'+upperLevel+'"]').children().not('[data-level]').slideDown('fast');
	})
}



function spinnerPrepend (){
	$('.container').prepend(''+
		'<div class="spinnerContainer" style="display:none;">'+
		'	<div class="spinner">'+
		' 		<div class="rect1"></div>'+
		' 		<div class="rect2"></div>'+
		'  		<div class="rect3"></div>'+
		'  		<div class="rect4"></div>'+
		'  		<div class="rect5"></div>'+
		'	</div>'+
		'</div>'+
	'').find('.spinnerContainer').fadeIn('fast')
}

function spinnerRemove(){
	$('.container').find('.spinnerContainer').fadeOut('fast',function(){ $(this).remove(); });	
}