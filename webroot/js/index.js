$(document).ready(function() {
	$("#box")
		.css({attribute1: 'value1', attribute2: 'value2'});
	
	setElements(100, 200, 44, "bugB", "☆", false);
	setElements(150, 300, 44, "bugC", "△", false);

	function setElements(y, x, count, className, text, isLink) {
		for(var i=0; i<count; ++i) {
			if(isLink) {
				$("<a>")
					.attr("href", "http://google.com/")
					.html(text)
					.addClass(className)
					.appendTo("#box");
			} else {
				$("<span>")
					.html(text)
					.addClass(className)
					.appendTo("#box");
			}
		}

		var radiusY = y, radiusX = x,
			length = $("." + className).size(),
			_length = 0,
			centerY = $(window).height() / 2, centerX = $(window).width() / 2;

		var interval = setInterval(function() {
			if(length == _length) {
				mover("." + className);
				clearInterval(interval);
				interval = null;
			}
		}, 100);

		$("." + className)
			.each(function(index) {
				var _a = index,
					_t = Math.sin(_a) * radiusY + centerY,
					_l = Math.cos(_a) * radiusX + centerX;

				$(this)
					.css({
						top: Math.random() * $(window).height() + "px",
						left: Math.random() * $(window).width() + "px"
					})
					.animate({top: _t + "px", left: _l - 30 + "px"}, 1500, "easeInOutBack", function() {
						_length++;
					});
			});
	}
	
	var mouseY, mouseX;
	$("html")
		.mousemove(function(e) {
			mouseY = e.pageY;
			mouseX = e.pageX;
		});

	function mover(selector) {
		var firstPointX = [],
			firstPointY = [];

		// offsetの保存
		$(selector).each(function(index) {
			var offset = $(this).offset();
			firstPointX[index] = offset.left;
			firstPointY[index] = offset.top;
		});
		
		var $this = $(selector);

		(function() {
			$this.each(function(index) {
				var elem = $(this),
					offset = elem.offset(),
					theta = Math.atan2(offset.top - mouseY, offset.left - mouseX),
					d = 3000 / Math.sqrt(Math.pow(mouseX - offset.left, 2) + Math.pow(mouseY - offset.top, 2)),
				
				left = parseInt(elem.css("left")) + d * Math.cos(theta) + (firstPointX[index] - offset.left) * 0.1 + "px",
				top = parseInt(elem.css("top")) + d * Math.sin(theta) + (firstPointY[index] - offset.top) * 0.1 + "px";

				elem.css({
					left: left,
					top: top
				});
			});
			
			setTimeout(arguments.callee, 30);
		})();
	}
});