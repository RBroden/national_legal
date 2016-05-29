function fixCards(){
    //alert('hi');
	$('.card-row').each(function(event){
		var largest_card = 0;
        var largest_h4 = 0;
		$(this).find('.card-block').each(function(event){
            $(this).css('height', 'auto');
            var height = $(this).outerHeight();
            if(height > largest_card) largest_card = height;
        });
        $(this).find('h4').each(function(event){
            $(this).css('height', 'auto');
            var height = $(this).outerHeight();
            if(height > largest_h4) largest_h4 = height;
        });
		$(this).find('.card-block').css('height', largest_card + 20);
        $(this).find('h4').css('height', largest_h4);
	});
}

$( document ).ready(function(){ /* to make sure the script runs after page load */

	$('.item').each(function(event){

		var max_length = 3000;

		//if($(this).html().length > max_length){
         //alert($(this).html().length);
			var short_content 	= $(this).html().substr(0,max_length);
			//var last_space = short_content.lastIndexOf(" ");
			//short_content = short_content.substr(0,last_space);
			//var long_content	= $(this).html().substr(max_length);

			var link = $(this).closest('.card').find('.showContent').attr('href');

			$(this).html(short_content+'<br><br>'+
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

		//}

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
  $scope.faq_sections = [
	  {
		  title : 'Potential Clients',
		  faqs : [
			  {
				  id : 'pc1',
				  question : 'What services does your firm offer?',
				  getAnswer : function(){
					  return 'v2/js/includes/faq_answers/'+this.id+'.html';
				  }
			  },
			  {
				  id : 'pc2',
				  question : 'How much does it cost for a consultation?',
				  getAnswer : function(){
					  return 'v2/js/includes/faq_answers/'+this.id+'.html';
				  }
			  },
			  {
				  id : 'pc3',
				  question : 'What type of debt does your firm manage?',
				  getAnswer : function(){
					  return 'v2/js/includes/faq_answers/'+this.id+'.html';
				  }
			  },
			  {
				  id : 'pc4',
				  question : 'What is Debt Resolution Legal Services?',
				  getAnswer : function(){
					  return 'v2/js/includes/faq_answers/'+this.id+'.html';
				  }
			  },
			  {
				  id : 'pc5',
				  question : 'What is Credit Correction Legal Services?',
				  getAnswer : function(){
					  return 'v2/js/includes/faq_answers/'+this.id+'.html';
				  }
			  },
			  {
				  id : 'pc6',
				  question : 'What happens to my credit if I choose Debt Resolution?',
				  getAnswer : function(){
					  return 'v2/js/includes/faq_answers/'+this.id+'.html';
				  }
			  }
		  ]
	  },
      {
          title : 'Active Clients',
          faqs : [
              {
                  id : 'ac1',
                  question : 'I have completed my application for Debt Resolution Legal Services.  What happens next?',
                  getAnswer : function(){
                      return 'v2/js/includes/faq_answers/'+this.id+'.html';
                  }
              },
              {
                  id : 'ac2',
                  question : 'What should I do if I feel overwhelmed, unsure or stressed during the Debt Resolution process?',
                  getAnswer : function(){
                      return 'v2/js/includes/faq_answers/'+this.id+'.html';
                  }
              },
              {
                  id : 'ac3',
                  question : 'Who manages my case?',
                  getAnswer : function(){
                      return 'v2/js/includes/faq_answers/'+this.id+'.html';
                  }
              },
              {
                  id : 'ac4',
                  question : 'When will my debts be resolved?',
                  getAnswer : function(){
                      return 'v2/js/includes/faq_answers/'+this.id+'.html';
                  }
              },
              {
                  id : 'ac5',
                  question : 'What should I do with the letters the creditors send me?',
                  getAnswer : function(){
                      return 'v2/js/includes/faq_answers/'+this.id+'.html';
                  }
              }
          ]
      }
  ];
});

siteApp.directive('faq_content', function(){
	return {
		restrict : 'E',
		templateUrl : 'v2/js/includes/faq_content.html'
	}
});

siteApp.directive('faq', function(){
	return {
		restrict : 'A',
		templateUrl : 'v2/js/includes/faq_template.html'
	};
});

siteApp.controller('paCtrl', function ($scope) {
  $scope.content = 7;
});

siteApp.controller('homeCtrl', function ($scope) {
	$scope.nlHeader = "Our Commitment";
	$scope.nlText = "At National Legal Center, we believe that diversity, in terms of people, perspectives and experiences – can create more innovative solutions and greater contributions from everyone. As our workforce grows to reflect the greater diversity of the world in which we live, our efforts to value differences and build a culture of inclusion become increasingly essential to our success and that of our clients."
	$scope.checked = true;
});
