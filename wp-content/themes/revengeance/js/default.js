$ = jQuery;
$(function(){
	var duchesses = $('.duchesse-wrap');
	var arrows = $('.arrow');

	arrows.on('click', arrow_click);
	$('.vote').click(vote_click);

	function arrow_click(e){
		e.preventDefault();
		if(duchesses.is(':animated')) return;

		var cur_duchesse = duchesses.filter(':visible');
		var $this = $(this);
		var duchesse_to_show = get_duchesse_to_show.call($this, cur_duchesse);
		cur_duchesse.fadeOut();
		duchesse_to_show.fadeIn();
	}

	function get_duchesse_to_show(cur) {
		var $cur = $(cur);
		var next_duchesse;

		if(this.hasClass('next')) {
			next_duchesse = $cur.next('.duchesse-wrap');
			if(next_duchesse.length < 1) next_duchesse = duchesses.first();
		}
		else if(this.hasClass('prev')) {
			next_duchesse = $cur.prev('.duchesse-wrap');
			if(next_duchesse.length < 1) next_duchesse = duchesses.last();
		}

		return next_duchesse
	}

	function vote_click(e){
		var button = $(this);
		if(button.hasClass('voted'))
		{
			return;
		}
		data = {
			action:'spAjaxSubmit',
			poll:1,
			answer:button.attr('data-answer')
		};
		$.post('/wp-admin/admin-ajax.php', data, function(){
			$('.vote-limit').show();
			button.html('Merci!  <div class="vote-limit">1 vote/jour</div>').addClass('voted');
		})
	}
	
})