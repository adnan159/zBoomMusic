jQuery(document).ready(function(){
	var customMediaLibrary = window.wp.media({
			button: {
        		text: 'Select'
    		},
    		frame: 'select',
    		title: 'Select Images',
    		multiple: true,
		});

	jQuery('button.imageupload').click(function(){
		console.log('click');
		customMediaLibrary.open();
	});
	customMediaLibrary.on( 'select', function(event) {

    	var selectedImages = customMediaLibrary.state().get( 'selection' ).first().toJSON();
    	jQuery('input.showtext').val(selectedImages.url);
    	
	});



	

})