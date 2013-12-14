function fileAction(f)
{
	for (var i = 0; i < f.length; i++) 
	{
		//获取文件名字
		var va=f[i].name;
		$.ajax({
		 	type:"post",
		 	url:'/myphoto/index.php/imageUpload/image',
		 	data:{"url":va},
		 	dataType:"text",
		 	success:function(text){
			$("#pho").append("<div class='randdiv'><img alt='' src=../../"+text+"></div>");

		 		}
		 			
			});
	};		
}