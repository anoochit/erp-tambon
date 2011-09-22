jQuery.fn.tapper = function(options) {

	options = options || {};
	var settings = {
		content: '.tapper_content p',
		speed: 500
	}

	if (options)
		$.extend(settings, options);

	var self = this;

	var first = jQuery(this).find('li > a:eq(0)').attr('href');
	jQuery(this).find(settings.content).load(first);
	jQuery(this).find('li:eq(0)').addClass('hilight');

	jQuery(this).find('li > a').click(function(e) {

		var destiny = $(this).attr('href');
		var current = this;

		jQuery.ajax({
			type: 'GET',
			url: destiny,
			error: function() {
				jQuery(self).find(settings.content).html('Cannot load');
			},
			success: function(str) {
				jQuery(self).find(settings.content).hide().html(str).animate({ opacity: 'show' }, settings.speed);
				jQuery(current).parent().addClass('hilight').siblings().removeClass('hilight');
			}
		});

		return false;
	});

}