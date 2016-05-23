function fixCards(){
	$('.card-row').each(function(event){
		var largest_card = 0;
		$(this).find('.card-block').each(function(event){
			var height = $(this).outerHeight();
			if(height > largest_card) largest_card = height;
		});
		$(this).find('.card-block').css('min-height', largest_card + 15);
	});
}

$( document ).ready(function(){ /* to make sure the script runs after page load */

	$('.item').each(function(event){

		var max_length = 450;

		if($(this).html().length > max_length){
         //alert($(this).html().length);
			var short_content 	= $(this).html().substr(0,max_length);
			var last_space = short_content.lastIndexOf(" ");
			short_content = short_content.substr(0,last_space);
			//var long_content	= $(this).html().substr(max_length);

			var link = $(this).closest('.card').find('.showContent').attr('href');

			$(this).html(short_content+'...<br>'+
						 '<a href="'+link+'" data-toggle="pill" class="read_more">Read More</a>');
						 //'<span class="more_text" style="display:none;">'+long_content+'</span>');

			$(this).find('a.read_more').click(function(event){

				event.preventDefault();
				window.scrollTo(0,0);
				$('#cardTable').hide();
				$('#cardContent').show();
				//$(this).closest('.card').css({backgroundColor: "#ffe", borderLeft: "5px solid #ccc" });
				//$(this).hide();
				//$(this).parents('.item').find('.more_text').show();

			});

		}

	});

	$('.showContent').click(function(event){
		window.scrollTo(0,0);
		$('#cardTable').hide();
		$('#cardContent').show();
	});

	$('#backLink').click(function(event){
		window.scrollTo(0,0);
		$('#cardTable').show();
		$('#cardContent').hide();
	});

	fixCards();

});

$( window ).resize(function() {
  fixCards();
});

var siteApp = angular.module('siteApp', []);

siteApp.controller('faqCtrl', function ($scope) {
  $scope.a = 5;
});

siteApp.controller('paCtrl', function ($scope) {
  $scope.content = 7;
});

siteApp.controller('homeCtrl', function ($scope) {
	$scope.nlHeader = "Our Commitment";
	$scope.nlText = "At National Legal Center, we believe that diversity, in terms of people, perspectives and experiences – can create more innovative solutions and greater contributions from everyone. As our workforce grows to reflect the greater diversity of the world in which we live, our efforts to value differences and build a culture of inclusion become increasingly essential to our success and that of our clients."
	$scope.checked = true;
});
