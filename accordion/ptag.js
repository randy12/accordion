

$(document).ready(function(){
	
	/**Ajax call for repopulation*/
	$.ajax({ url: 'repopulate.php',
			success:function(datatype){
			if((datatype!=null) || (datatype!=" "))
			{	//alert(datatype);
				$.each($.parseJSON(datatype), function() {
				$("#area").append('<div class="names" id="'+this.Name+'"/>');
				$("#"+this.Name).text(this.Name);
				$cancel=$('<input type="button" value="cancel" class="cancel"/>');
				$("#area").append($cancel);
				$($cancel).attr("id",this.Name);
				var x=this.X; var y=this.Y;
				var $hoverdiv = $('<div class="object1 '+this.Name+'"/>');    /**$hoverdiv is the tag over the photo on mouseover*/
				$("#image").append($hoverdiv);
				$("."+this.Name).css("left",x).css("top",y).css("opacity","0");
				//alert(this.ID + " " + this.Name);
				/**Cancel click*/
				$($cancel).click(function(){
				var i = $(this).attr('id');
				var removename=$('#'+i).text();
				$.ajax({
				type:'post',
				url:"dbentrycan.php",
				data:{'name3':removename},
				success:function(datatype){
				alert(datatype);
				}
				});
				$('#'+i).remove();
				$(this).remove();
				}); 
				});	
			}
		} 
	});
	$("#tag").draggable({cursor: "crosshair", containment: "#im"});
	$("#tag").hide();
	var lastposx;
	var lastposy;
	var name;
	var $cancel=$('<input type="button" value="cancel"/>');
	$("img").click(function(e){ $("#textname").val="";
		var offset = $("img").offset();     
        var x=e.clientX - offset.left;
        var y=e.clientY - offset.top;									/**ClientX is the position of the click event from the top-left corner of the window*/
		var height=$("#im").height();									/**offset gives the position of the image window wrt the doc from the top-left corner*/
		var width=$("#im").width();
		$("#tag").css("left",e.clientX-50).css("top",e.clientY-60).hide(); 
		if((x-50>0 && y-50>0)&&(x+50<width && y+60<height))
		{
			$("#tag").css("left",e.clientX-77).css("top",e.clientY-60).show();	
			lastposx=e.clientX;
			lastposy=e.clientY;				
		}
		else{
			$("#tag").hide();
		}
		});
		
		/**On submit*/	
		var $newdiv2 = $('<div class="names"/>');		
		$(":submit").click(function(e){	
				 //$("#tag").css("left",lastposx-50).css("top",lastposy-60).hide();				
				name=$("#textname").val();
				if(name!="")
				{
				var tagspos=$('#tag').offset();
				var $newdiv = $('<div class="object1 '+name+'"/>');    /**$newdiv is the tag over the photo on mouseover*/
				$("#image").append($newdiv);
				$("."+name).css("left",tagspos.left).css("top",tagspos.top).css("opacity","0");
				$("#area").append('<div class="names" id="'+name+'"/>');
				$("#"+name).text(name);
				$(".names").css("height", "30px").css("width", "100px").css("border", "1px solid #ccc");
				$cancel=$('<input type="button" value="cancel" class="cancel"/>');
				$("#area").append($cancel);
				$($cancel).attr("id",name);
				$("#textname").val = "";
				/**Ajax call for db entry*/
				ajaxcall=$.ajax({
				type:'post',
				url:"dbentry.php",
				data:{'name2':name,'xcord':tagspos.left,'ycord':tagspos.top},
				success:function(datatype){
				alert(datatype);
				}
				});
			}
				/**Cancel click*/
			$($cancel).click(function(){
			var i = $(this).attr('id');
			var removename=$('#'+i).text();
			ajaxcall=$.ajax({
			type:'post',
			url:"dbentrycan.php",
			data:{'name3':removename},
			success:function(datatype){
			alert(datatype);
			}
			});
			$('#'+i).remove();
			$(this).remove();
			}); 
			
		});
		/**On mouseover*/
		$(document).on("mouseenter", "#area .names", function(){
			var id = $(this).attr('id');
			$("."+id).text(id);
			$("."+id).css("opacity","0.5");
		}).on("mouseleave", "#area .names", function(){
			var a = $(this).attr('id');
			$("."+a).css("opacity","0");
		});
		
		
	});