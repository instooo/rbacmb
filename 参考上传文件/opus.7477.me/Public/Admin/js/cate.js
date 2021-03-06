(function($) {
	$(function() {
		 // 打点、计数，用于计算文件发送速度
		 var timeMark  = 0;
		 var frequency = -1;		 
		// 缩略图大小
		var thumbnailWidth  = 172;
		var thumbnailHeight = 131;
		// 上传缩略图
		thumbUploader = WebUploader.create({
			pick: {
				id: '#picker-down',				
				multiple: false		
			},
			formData: {},
			compress: false,
			auto: true,
			fileVal: 'previewFile',       // 设置文件上传域的name
			disableGlobalDnd: true,
			accept: {
				title: '预览图支持格式',
				extensions: 'jpg,jpeg,png,gif',
				mimeTypes: 'image/jpeg,image/png'
			},
			swf: '/Public/Admin/webuploader/Uploader.swf',
			server: '/upload/uploadImage_do',
			threads: 1,
			fileNumLimit: 1,
			fileSizeLimit: 2 * 1024 * 1024,         // 2 M
			fileSingleSizeLimit: 2 * 1024 * 1024    // 2 M
		});
		// 添加源文件
		function addPreviewFile(file) {
			// 生成缩略图
			$('.wait-upload').append(
				'<div class="preview-small imgWrap fl" id="preview_' + file[0]['id'] + '">' +
					'<i class="position-ab"></i>' +
					'<div class="preview-progress">' +
						'<p class="progress-line" style="width: 0%"></p>' +
						'<p class="word-notice">等待中' +
							'<span class="progress-percent"></span>' +
						'</p>' +
					'</div>' +
				'</div>'
			);
			var $li = $('#preview_' + file[0]['id']);
			// 生成缩略图
			thumbUploader.makeThumb(file, function(error, src) {
				if (error) {
					$li.text('不能预览');
				} else {
					$li.css('background', 'url(' + src + ') no-repeat center center');
				}
			}, thumbnailWidth, thumbnailHeight);
			// 取消上传
			$li.on('click', '.position-ab', function() {
				$li.find('.preview-progress').html(
					'<p class="progress-line" style="width: 100%"></p>' +
					'<p class="word-notice">删除成功</p>'
				);
				thumbUploader.cancelFile(file);
				thumbUploader.removeFile(file, true);
				// 移除上传文本框
				$li.fadeOut(3000, function(){
					$(this).remove();
				});
				// 清除input文本
				$("input[name='detail_preview_src']").val('');
			});
		}
		// 文件加入队列时触发
		thumbUploader.on('filesQueued', function(file) {			
			// 打点，开始上传
			timeMark = new Date().getTime();
			thumbUploader.upload();
			addPreviewFile(file);
		});
		// 文件加入队列报错时触发
		thumbUploader.on('error', function(code) {
			var errMsg = '';
			switch (code) {
				case 'Q_EXCEED_NUM_LIMIT':
					errMsg = "预览图只能上传一张";
					break;
				case 'Q_EXCEED_SIZE_LIMIT':
					errMsg = "预览图大小超出限制（2M）";
					break;
				case 'Q_TYPE_DENIED':
					errMsg = "预览图只支持jpg、png、gif格式";
					break;
				case 'F_DUPLICATE':
					errMsg = "预览图已经在上传当中，请勿重复添加";
					break;
				case 'F_EXCEED_SIZE':
					errMsg = "预览图大小超出限制（2M）";
			}
			$("[data-tag='preview']").hide();
			$("[data-name='preview']").html("<i></i>" + errMsg).show();			
		});
		
		// 文件上传过程当中触发
		thumbUploader.on('uploadProgress', function(file, percentage) {
			var $li = $('#preview_' + file.id);
			// 进度条延迟展示，异步获取statusText
			setTimeout(function(){
				// 文件上传被拒绝
				if (file.statusText == 'abort') {
					// 比如服务器出现问题
					// 提示错误信息
					$li.find('.preview-progress').html(
						'<p class="progress-line" style="width: 100%"></p>' +
						'<p class="word-notice">服务器异常，上传中断，请重新上传</p>'
					);
					// 移除上传文件
					thumbUploader.cancelFile(file);
					thumbUploader.removeFile(file, true);
					// 移除上传文本框
					$li.fadeOut(3000, function(){
						$(this).remove();
					});
					// 清除input文本
					$("input[name='detail_preview_src']").val('');
				} else {
					$li.find('.word-notice').html('上传中<span class="progress-percent"></span>');
					$li.find('.progress-percent').text(parseInt(percentage * 100) + '%');
					$li.find('.progress-line').css('width', percentage * 100 + '%');
				}
			}, 10);
			// 上传过程当中删除图片
			$li.on('click', '.position-ab', function() {
				$li.find('.preview-progress').html(
					'<p class="progress-line" style="width: 100%"></p>' +
					'<p class="word-notice">删除成功</p>'
				);
				thumbUploader.cancelFile(file);
				thumbUploader.removeFile(file, true);
				// 移除上传文本框
				$li.fadeOut(3000, function(){
					$(this).remove();
				});
				// 清除input文本
				$("input[name='detail_preview_src']").val('');
			});
		});

		// 文件上传成功后触发
		thumbUploader.on('uploadSuccess', function(file, response) {
			var $li = $('#preview_' + file.id);
			if (response.status == false) {       // 服务器验证失败
				// 提示错误信息
				$("[data-tag='preview']").hide();
				$("[data-name='preview']").html("<i></i>" + response.content).show();
				// 提示上传失败
				$li.find('.preview-progress').html(
					'<p class="progress-line" style="width: 100%"></p>' +
					'<p class="word-notice">上传失败</p>'
				);
				// 移除上传文件
				thumbUploader.removeFile(file, true);
				// 移除上传文本框
				$li.fadeOut(3000, function(){
					$(this).remove();
				});
				// 清除input文本
				$("input[name='detail_preview_src']").val('');
			} else {                // 服务器验证成功
				var yltName = response.content;
				$("input[name='detail_preview_src']").val(yltName);
				// 提示上传成功，延迟200ms防止抖动
				setTimeout(function(){
					$li.find('.preview-progress').html(
							'<p class="progress-line" style="width: 100%"></p>' +
							'<p class="word-notice">上传成功</p>'
					);
				}, 200);
				// 上传成功之后点击删除图片
				$li.on('click', '.position-ab', function(){
					$.ajax({
						type : "POST",
						url  : "/upload/deleteFile",
						data : {"yltName": yltName},
						dataType : 'json',
						success  : function(res) {
							if (res.status == true) {   // 删除成功
								$li.find('.preview-progress').html(
									'<p class="progress-line" style="width: 100%"></p>' +
									'<p class="word-notice">删除成功</p>'
								);
								// 移除上传文件
								thumbUploader.removeFile(file, true);
								// 移除上传文本框
								$li.fadeOut(3000, function(){
									$(this).remove();
								});
								// 清除input文本
								$("input[name='detail_preview_src']").val('');
							} else {    // 删除失败
								$("input[name='detail_preview_src']").val('');
								layer.alert(res.content);
							}
						}
					});
				});
			}
		});
		// 不管成功或者失败，文件上传完成时触发
		thumbUploader.on('uploadComplete', function(file){
			// 重置打点+计数
			timeMark  = new Date().getTime();
			frequency = -1;
		});
		
		// 点击隐藏错误提示
        function hideNotice(){
            $("[data-name='title']").hide();         
            $("[data-name='des']").hide();	
            $("[data-name='preview']").hide();
            $("[data-tag='title']").show();            
			$("[data-tag='des']").show();           
            $("[data-tag='preview']").show();
        }
        $("[name='title'],[name='des'],[name='cid']").on('focus', function(){
			 hideNotice();
        });
        $("#picker-down").on('click', function(){
            hideNotice();
        });	
		
		// 提交审核矢量图信息
        $("#sub-cate").on("click", function(){
            var title = $.trim($("input[name='title']").val());
            if (!title) {
                $("[data-tag='title']").hide();
                $("[data-name='title']").html("<i></i>标题不能为空").show();
                return;
            }
			var des  = $.trim($("textarea[name='des']").val());
            if (!des) {
                $("[data-tag='des']").hide();
                $("[data-name='des']").html("<i></i>请填写一句描述").show();
                return;
            }   
			 var pid   = $("input[name='pid']").attr("data-id");	
            var pre   = $("input[name='detail_preview_src']").val();
            if (!pre) {
                $("[data-tag='preview']").hide();
                $("[data-name='preview']").html("<i></i>预览图上传失败，请重新上传").show();
                return;
            }			
            $.ajax({
                type : 'post',
				dataType:'json',
                url  : '/cate/add',
                data : 'title=' + title + '&des=' + des+ '&pid=' + pid + '&pre=' + pre,
                success: function(res){
                    if (res.status == false) { 
						alert ("上传错误");
                    } else {
                        // 跳转上传成功页面
                        window.location.href = '/cate/catelist';
                    }
                }
            });
        });	
		
		// 提交审核矢量图信息
        $("#sub-cateedit").on("click", function(){
			var cid = $.trim($("input[name='cid']").val());
            var title = $.trim($("input[name='title']").val());
            if (!title) {
                $("[data-tag='title']").hide();
                $("[data-name='title']").html("<i></i>标题不能为空").show();
                return;
            }
			var des  = $.trim($("textarea[name='des']").val());
            if (!des) {
                $("[data-tag='des']").hide();
                $("[data-name='des']").html("<i></i>请填写一句描述").show();
                return;
            }   
			 var pid   = $("input[name='pid']").attr("data-id");	
            var pre   = $("input[name='detail_preview_src']").val();           
            $.ajax({
                type : 'post',
				dataType:'json',
                url  : '/cate/edit',
                data : 'title=' + title + '&des=' + des+ '&pid=' + pid+ '&cid=' + cid + '&pre=' + pre,
                success: function(res){
                    if (res.status == false) { 
						alert ("无修改项，上传错误");
                    } else {
                        // 跳转上传成功页面
                        window.location.href = '/cate/catelist';
                    }
                }
            });
        });	
		
	});
})(jQuery);
