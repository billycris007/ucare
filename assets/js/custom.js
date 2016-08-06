;(function($){
	$.custom = {
		init:function(){
			this.removePurpose();
			this.editPurpose();
		},

		removePurpose:function(){
			$(".remove_purpose").unbind('click').click(function(){
				var D = $.custom._evalData($(this).attr('data'));
				var ans = confirm("Are you sure you want to delete this data?");
					if(ans){
						$.ajax({
							type:"POST",
							url:base_url+'purpose/removePurpose',
							data: "id=" + D.id+"&e=1",
							dataType: 'json',
							beforeSend: function(jqxhr, settings){
							},
							success: function(d){
								if(d.e == 0){
									alert('Data Successfully deleted.');
									window.location = base_url+'purpose';
								}else{
									alert('Error unable to process request.');
								}
							}
						});
					}
			});
		},

		editPurpose:function(){
			$('.edit_purpose').unbind('click').click(function(){
				var D = $.custom._evalData($(this).attr('data'));
				$.ajax({
					type:"POST",
					url:base_url+'purpose/updatePurpose',
					data: "id=" + D.id,
					dataType: 'json',
					beforeSend: function(jqxhr, settings){
					},
					success: function(d){
						console.log(d);
						if(d.e == 0){
							$('.page_wrapper').html('');
							$('.page_wrapper').append(d.d);
						}else{
							alert('Error unable to process request.');
						}
					}
				});
			});
		},

		_evalData: function(D){
			return eval('('+D+')');
		},
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.custom.init(); });