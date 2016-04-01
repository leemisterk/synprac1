
$(document).ready(function(){


	$('#new_book_cover_image').change(
	function(event){

	}
	);
	
	
	//test ajax
	
	$(".tabs").on("click", function(e){
			e.preventDefault();
			var tab = $(this).attr("id");
			var title = $(this).html();
			$("#container").html("loading…");
			$.get(tab, function(data){
				$("#title").html(title);
				$("#container").html(data);
			});
		});
});



//global namespace
var app={};

app.book= (function(){
	
})();
