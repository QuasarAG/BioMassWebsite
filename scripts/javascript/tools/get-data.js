function callbackData(dataFromDb) 
{
	var dataHolder = JSON.parse(dataFromDb);
	return dataHolder;
}

function getData(urlPath, callback) 
{
	return $.ajax(
	{
		url: urlPath,
		success: function(data) 
		{
			callback(data);
		},
		error: function() 
		{ 
			alert("Request failure"); 
		}  
	});
}

