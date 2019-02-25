$(document).ready(function(){
    $("#deletePicture").click(function(){
        alert('HERE--123');
    });
	
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};

	var sort = getUrlParameter('sort');
	console.log(sort);
//	
//	$("#savePicture").click(function(e){
//		e.preventDefault();
//			 
//		console.log($("#file").val());
//		
//		$( "#form" ).submit();
//		
//	});
});

