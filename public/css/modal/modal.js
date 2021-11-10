$(document).ready(function () {

	var id = '#dialog';

	//Get the screen height and width
	var maskHeight = $(document).height();
	var maskWidth = $(window).width();

	//Set heigth and width to mask to fill up the whole screen
	$('#mask_intro,#mask_home,#mask_confirm').css({
		'width': maskWidth,
		'height': maskHeight
	});

	//transition effect		
	$('#mask_intro').fadeIn(200);
	$('#mask_intro').fadeTo(200, 0.2);

	$('#mask_home').fadeIn(200);
	$('#mask_home').fadeTo(200, 0.2);


	//Get the window height and width
	var winH = $(window).height();
	var winW = $(window).width();

	//Set the popup window to center
	$(id).css('top', winH / 2 - $(id).height() / 2);
	$(id).css('left', winW / 2 - $(id).width() / 2);

	$('#confirm-submit').css('top', winH / 2 - $('#confirm-submit').height() / 2);
	$('#confirm-submit').css('left', winW / 2 - $('#confirm-submit').width() / 2);

	//transition effect
	$(id).fadeIn(100);

	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();

		$('#mask_intro').hide();
		$('#mask_home').hide();
		$('#mask_confirm').hide();
		$('.window').hide();
		$('#clip').attr("src", $("#clip").attr("src"));
	});

	//if mask is clicked

	$('#mask_home').click(function () {
		$(this).hide();
		$('.window').hide();
		$('#clip').attr("src", $("#clip").attr("src"));
	});
	
	

});