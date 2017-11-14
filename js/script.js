$(function(){
	$('.menu').bind({
	'mouseover':function(){
		var body=$(this).attr('data-body');
		var color=$(this).attr('data-color');
		$('#title').text(body).css('color',color);
	},
	
	'click':function(event){
		event.preventDefault();
		var data=$(this).attr('href');
		if($('.modal-window').length==0){
			
		$('<div>').attr('id','jquery-overlay').fadeIn('slow').appendTo('body');
		var modal = $('<div>').addClass('modal-window').appendTo('body');
		}else{
		var modal = $('.modal-window');
		}
		$('<a>').attr('href','#').addClass('modal-close-btn').html('&times;')
		.click(function(event){
			event.preventDefault();
			$('.modal-window').remove();
			$('#jquery-overlay').remove();
		}).appendTo(modal);
	}
	});
	$('.mouseout').bind({
		
		'mouseout':function(){
			$('#title').text('Welcome to hell').css('color','red');
		},
	});
	
});
