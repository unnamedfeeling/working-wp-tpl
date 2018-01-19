(function( root, $, undefined ) {
	"use strict";

	var ajaxPost=function(target, type, container, func, quant, opts){
		// console.log(target);
		var q=(typeof quant!=='undefined') ? quant : 4,
			cont=document.getElementById(container),
			page = parseInt(cont.dataset.page),
			// total = parseInt(swimsuitsContainer.dataset.total),
			cat = (!isNaN(cont.dataset.cat))?parseInt(cont.dataset.cat):'',
			catid = (!isNaN($(target).get(0).dataset.cat))?parseInt($(target).get(0).dataset.cat):'',
			tagid = (!isNaN($(target).get(0).dataset.tagid))?parseInt($(target).get(0).dataset.tagid):'',
			tagslug = ($(target).get(0).dataset.tagslug!=='')?$(target).get(0).dataset.tagslug:'',
			// data={p: page, t: total, c: cat, pt: 'product'},
			data={p: page, c: ((cat!=='') ? cat : catid), pt: type, q: q, t: tagid},
			postcount=parseInt($('#'+container).find('.grid-item').length),
			excl=(typeof opts!=='undefined' && typeof opts.excl!=='undefined')?opts.excl : null;
		if (data.c=='') {
			delete data.c;
		}
		if (typeof excl !== 'undefined'&&excl !== ''&&excl !== null) {
			data.e=excl;
		}
		// console.log('load');
		// console.log(data);
		$.post({
			url: ajax_func.ajax_url,
			dataType: 'json',
			data: {
				action: func,
				params: data
			},
			beforeSend: function(){
				if(!$(target).hasClass('js-filterCat')&&!$(target).hasClass('js-filterTag')){
					$(target).attr('disabled', 'disabled').css('opacity', '0.7');
				}

			},
			success: function (data) {
				if($('#'+container).find('.noposts').length){
					$('#'+container).find('.noposts').remove();
				}
				$('#archiveMoreSwimsuits').fadeIn(500);
				var h=$swgrid.innerHeight(),
					content=$.parseHTML(data.content),
					c;
				if ($(content).find('.noposts').length) {
					$('#archiveMoreSwimsuits').fadeOut(300);
				}
				// console.log(data);
				// console.log(data.content);
				$('#'+container).css('opacity', '0.1');
				// var content=$.parseHTML(data.content.replace('/data-src/g', 'src'));
				postcount+=$(content).find('.grid-item').length;
				$swgrid.append($(content)).isotope('appended', $(content)).isotope('layout');
				setTimeout(function(){
					$swgrid.append($(content)).imagesLoaded(function(){
						// $swgrid.isotope('appended', $(content) ).isotope('layout');
						// console.log(new Date());
						$swgrid.isotope('layout');
					});
				}, 300);

				$('#'+container).css('opacity', '1');
				// swimsuitsContainer.dataset.page++;
				$('#'+container).get(0).dataset.page++;
				if (typeof data.pids!=='undefined') {
					// console.log(data.pids);
					// console.log($('#'+container).data('excl'));
					// console.log(container);
					var ex_ids=String(data.pids)+String($('#'+container).get(0).dataset.excl);
					// console.log(ex_ids);
					$('#'+container).removeAttr('data-excl');
					$('#'+container).attr('data-excl', ex_ids);
				}
				var totalposts=parseInt(data.total_posts);
				// console.log('totalposts:'+totalposts);
				// console.log('postcount:'+postcount);
				// console.log(parseInt(postcount)>(parseInt(totalposts)-1));
				if(!$(target).hasClass('js-filterCat')&&!$(target).hasClass('js-filterTag')){
					if(parseInt(postcount)>(parseInt(totalposts)-1)){
						$(target).addClass('hidden').fadeOut(300);
					} else {
						$(target).removeAttr('disabled').css('opacity', '1');
					}
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		});
	};
	$(document).on('click', '#mainMoreSwimsuits', function(event){
		var opts={excl:swimsuitsContainer.dataset.excl},
			quant=JSON.parse("[" + opts.excl + "]").length;
		// console.log(opts);
		ajaxPost('#mainMoreSwimsuits', 'product', 'swimsuitsContainer', 'generic_ajax_posts', quant, opts);
		event.preventDefault();
		// opts='';
	})
	$(document).on('click', '#archiveMoreSwimsuits', function(event){
		ajaxPost('#archiveMoreSwimsuits', 'product', 'swimsuitsContainer', 'generic_ajax_posts', 12);
		event.preventDefault();
	})
	$(document).on('click', '.js-filterCat', function(event){
		swimsuitsContainer.dataset.cat=event.target.dataset.catid;
		// $swgrid.isotope('remove', $('#swimsuitsContainer').find('.b-isotope-grid__item')).isotope('layout');
		$swgrid.isotope('remove', $('#swimsuitsContainer').find('.b-isotope-grid__item')).isotope('layout');
		ajaxPost(event.target, 'product', 'swimsuitsContainer', 'generic_ajax_filterPosts', 12);
		swimsuitsContainer.dataset.page=0;
		if($('#swimsuitsContainer').parent().find('.hidden').length){
			$('#swimsuitsContainer').parent().find('.hidden').show(300).removeClass('hidden');
		}
		// console.log(event.target);
		event.preventDefault();
	})
	$(document).on('click', '.js-filterTag', function(event){
		swimsuitsContainer.dataset.tagid=event.target.dataset.tagid;
		// $swgrid.isotope('remove', $('#swimsuitsContainer').find('.b-isotope-grid__item')).isotope('layout');
		$swgrid.isotope('remove', $('#swimsuitsContainer').find('.b-isotope-grid__item')).isotope();
		ajaxPost(event.target, 'product', 'swimsuitsContainer', 'generic_ajax_filterPosts', 12);
		swimsuitsContainer.dataset.page=0;
		if($('#swimsuitsContainer').parent().find('.hidden').length){
			$('#swimsuitsContainer').parent().find('.hidden').show(300).removeClass('hidden');
		}
		// console.log(event.target);
		event.preventDefault();
	})

	$(function () {
		// DOM ready, take it away
	});

} ( this, jQuery ));
