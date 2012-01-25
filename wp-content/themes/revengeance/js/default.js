$ = jQuery;
$(function(){
	var duchesses = $('.duchesse-wrap');
	var arrows = $('.arrow');

	arrows.on('click', arrow_click);

	function arrow_click(e){
		e.preventDefault();
		var cur_duchesse = duchesses.filter(':visible');
		var $this = $(this);
		var duchesse_to_show = get_duchesse_to_show.call($this, cur_duchesse);
		cur_duchesse.addClass('hidden')
		duchesse_to_show.removeClass('hidden');
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
})