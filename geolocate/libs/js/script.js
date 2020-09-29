$('#btnPlace').click(function() {
    $.ajax({
		url: "libs/php/getCountryInfo.php",
		type: 'POST',
		dataType: 'json',
		data: {
			country: $('#selPlace').val(),
		},
		success: function(result) {	
			
			console.log($('#selPlace').val());
			//$result = $geocoder->geocode($('#selPlace').val); 
			//^^thats what I want to do
			if (result["status"] == "OK") {
				
				$('#pContinent').html(result["continent"]);
				$('#pCapital').html(result["capital"]);
				$('#pCoordinates').html(result["coordinates"]);
                $('#pCurrency').html(result["currency"]);
				$('#pTimezone').html(result["timezone"]);
				$('#pError').html("");
                
               }
		
		},
		error: function(jqXHR, textStatus, errorThrown) {
			$('#pError').html(textStatus);		
		}
	}); 
});