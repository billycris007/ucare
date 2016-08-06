;(function($){
	$.custom = {
		init:function(){
			this.removePurpose();
			this.editPurpose();
			this.removeOrganization();
			this.editOrganization();
		},

		removePurpose:function(){
			$(".remove_purpose").unbind('click').click(function(){
				var D = $.custom._evalData($(this).attr('data'));
				var ans = confirm("Are you sure you want to delete this data?");
					if(ans){
						$.ajax({
							type:"POST",
							url:base_url+'removepurpose',
							data: "id=" + D.id,
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
					url:base_url+'updatePurpose',
					data: "id=" + D.id+'&e=1',
					dataType: 'json',
					beforeSend: function(jqxhr, settings){
					},
					success: function(d){
						console.log(d);
						if(d.e == 0){

							$('#page_wrapper').remove();
							$('#content').append(d.d);
							$('.panel-heading').html('Edit Purpose');
							$('#e').val(0);
							$('#frm').attr('action','javascript:void(0)');
							$.custom.savePurpose(D.id);
						}else{
							alert('Error unable to process request.');
						}
					}
				});
			});
		},

		savePurpose:function(id){
			$('#frm').unbind('submit').submit(function(){
				$.ajax({
					type:"POST",
					url:base_url+'updatePurpose',
					data: $('#frm').serialize()+"&id=" + id,
					dataType: 'json',
					beforeSend: function(jqxhr, settings){
					},
					success: function(d){
						console.log(d);
						if(d.e == 0){
							alert('Data Successfully Updated.');
							window.location = base_url+'purpose';
						}else{
							alert('Error unable to process request.');
						}
					}
				});
			});
		},

		// ORganization
		removeOrganization:function(){
			$(".remove_org").unbind('click').click(function(){
				var D = $.custom._evalData($(this).attr('data'));
				console.log(D);
				var ans = confirm("Are you sure you want to delete this data?");
					if(ans){
						$.ajax({
							type:"POST",
							url:base_url+'removeOrganization',
							data: "id=" + D.id,
							dataType: 'json',
							beforeSend: function(jqxhr, settings){
							},
							success: function(d){
								if(d.e == 0){
									alert('Data Successfully deleted.');
									window.location = base_url+'organization';
								}else{
									alert('Error unable to process request.');
								}
							}
						});
					}
			});
		},


		editOrganization:function(){
			$('.edit_org').unbind('click').click(function(){
				var D = $.custom._evalData($(this).attr('data'));
				$.ajax({
					type:"POST",
					url:base_url+'updateOrganization',
					data: "id=" + D.id+'&e=1',
					dataType: 'json',
					beforeSend: function(jqxhr, settings){
					},
					success: function(d){
						console.log(d);
						if(d.e == 0){

							$('#page_wrapper').remove();
							$('#content').append(d.d);
							$('.panel-heading').html('Edit ORganization');
							$('#e').val(0);
							$('#frm').attr('action','javascript:void(0)');
							$.custom.saveOrganization(D.id);
						}else{
							alert('Error unable to process request.');
						}
					}
				});
			});
		},

		saveOrganization:function(id){
			$('#frm').unbind('submit').submit(function(){
				$.ajax({
					type:"POST",
					url:base_url+'updateOrganization',
					data: $('#frm').serialize()+"&id=" + id,
					dataType: 'json',
					beforeSend: function(jqxhr, settings){
					},
					success: function(d){
						console.log(d);
						if(d.e == 0){
							alert('Data Successfully Updated.');
							window.location = base_url+'organization';
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