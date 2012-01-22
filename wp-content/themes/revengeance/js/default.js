$(function(){
	var duchesses = $('.duchesse-wrap');
	var arrows = $('.arrow');

	arrows.on('click', arrow_click);

	function arrow_click(e){
		e.preventDefault();
		var cur_duchesse = duchesses.filter(':visible') , $this = $(this);
		var duchesse_to_show = get_duchesse_to_show.apply($this, cur_duchesse);
		cur_duchesse.fadeOut();
		duchesse_to_show.fadeIn();
	}

	function get_duchesse_to_show(cur) {
		var $cur = $(cur), next_duchesse;

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