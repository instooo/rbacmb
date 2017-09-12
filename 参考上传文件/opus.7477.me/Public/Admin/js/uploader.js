(function($) {
	$(function() {
		 // 打点、计数，用于计算文件发送速度
		 var timeMark  = 0;
		 var frequency = -1;
		 uploader = WebUploader.create({
			pick: {
				id: '#picker-up',				
				multiple: false			
			},
			formData: {},
			compress: false,
			auto: true,		 
			fileVal: 'sourceFile',      // 设置文件上传域的name
			disableGlobalDnd: true,     // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
			accept: {
				title: '源文件支持格式',
				extensions: 'gif,jpg,jpeg,bmp,png,mp4,swf,flv'
			},
			swf: '/Public/Admin/webuploader/Uploader.swf',
			server: '/upload/uploadFile_do',
			threads: 1,
			fileNumLimit: 1,
			fileSizeLimit: 1.5 * 1024 * 1024,           // 300 M
			fileSingleSizeLimit: 1.5 * 1024 * 1024,     // 300 M
			duplicate: false
		});
		// 文件加入队列报错时触发
		uploader.on('error', function(code) {
			var errMsg = '';
			switch (code) {
				case 'Q_EXCEED_NUM_LIMIT':
					errMsg = "源文件只能上传一份";
					break;
				case 'Q_EXCEED_SIZE_LIMIT':
					errMsg = "源文件大小超出限制（300M）";
					break;
				case 'Q_TYPE_DENIED':			
					errMsg = "源文件格式只支持gif,jpg,jpeg,bmp,png,mp4,swf,flv格式";
					break;
				case 'F_DUPLICATE':
					errMsg = "源文件已经在上传当中，请勿重复添加";
					break;
				case 'F_EXCEED_SIZE':
					errMsg = "源文件大小超出限制（300M）";
			}
			$("[data-tag='vectorDiagram']").hide();
			$("[data-name='vectorDiagram']").html("<i></i>" + errMsg).show();
			return false;
		});	
		function addSourceFile(file){		
			$('.upload-progress').append(
				'<div class="progress clearfix" id="' + file[0]['id'] +  '">' +
					'<div class="file-name fl">' +
						'<span class="source-file-name">' +
							file[0]['name'] +
						'</span>' +
						'<span class="source-file-size">(' +
							WebUploader.formatSize(file[0]['size'], '0', ['B', 'KB', 'MB']) +
						')</span>' +
					'</div>' +
					'<div class="upload-status fl">' +
						'<div class="progress-line fl">' +
							'<p class="progress-bar" style="width: 0%"></p>' +
						'</div>' +
						'<span class="progress-percent"> 0%</span>' +
						'<span class="progress-speed"> (0B/s)</span>' +
					'</div>' +
					'<i class="off-progress fr"></i>' +
				'</div>'
			);
			var $li = $('#' + file[0]['id']);
			// 取消上传
			$li.on('click', '.off-progress', function() {
				$li.find('.upload-status').addClass('failed').html(
					'<i></i><span class="status-content">删除成功</span>'
				);
				uploader.cancelFile(file);
				uploader.removeFile(file, true);
				// 移除上传文本框
				$li.fadeOut(3000, function(){
					$(this).remove();
				});
				// 清除input文本
				$("input[name='download_src']").val('');
			});

		}
		// 文件加入队列时触发
		uploader.on('filesQueued', function(file) {
			
			// 打点，开始上传
			timeMark = new Date().getTime();
			uploader.upload();
			addSourceFile(file);
		});	
		
		// 文件上传过程当中触发
		uploader.on('uploadProgress', function(file, percentage) {
			var $li = $('#' + file.id);
			// 文件上传速度计算
			if(++frequency % 30 == 0 || (frequency <= 40 && frequency % 10 == 0)){
				var timeCur = new Date().getTime();
				var speed   = parseInt((file.size) * percentage / ((timeCur - timeMark) / 1000));
				$li.find('.progress-speed').text('(' + WebUploader.formatSize(speed, '1', ['B', 'KB', 'MB'] ) + '/s)');
			}
			// 进度条延迟展示，异步获取statusText
			setTimeout(function(){
				// 文件上传被拒绝
				if (file.statusText == 'abort') {
					// 比如服务器出现问题
					// 提示错误信息
					$li.find('.upload-status').addClass('failed').html(
						'<i></i><span class="status-content">服务器异常，上传中断，请稍后重试</span>'
					);
					// 移除上传文件
					uploader.cancelFile(file);
					uploader.removeFile(file, true);
					// 移除上传文本框
					$li.fadeOut(3000, function(){
						$(this).remove();
					});
				} else {
					$li.find('.progress-percent').text(parseInt(percentage * 100) + '%');
					$li.find('.progress-bar').css('width', percentage * 100 + '%');
				}
			}, 10);
			// 上传过程当中删除图片
			$li.on('click', '.off-progress', function() {
				$li.find('.upload-status').addClass('failed').html(
					'<i></i><span class="status-content">删除成功</span>'
				);
				uploader.cancelFile(file);
				uploader.removeFile(file, true);
				// 移除上传文本框
				$li.fadeOut(3000, function(){
					$(this).remove();
				});
				// 清除input文本
				$("input[name='download_src']").val('');
			});
		});	
		 // 文件上传成功后触发
		uploader.on('uploadSuccess', function(file, response) {		
			var $li = $('#' + file.id);
			if (response.status == false) {       // 服务器验证失败
				// 提示错误信息
				$li.find('.upload-status').addClass('failed').html(
					'<i></i><span class="status-content">' + response.content + '</span>'
				);
				// 移除上传文件
				uploader.removeFile(file, true);
				// 移除上传文本框
				$li.fadeOut(3000, function(){
					$(this).remove();
				});
				// 清除input文本
				$("input[name='download_src']").val('');
			} else {                // 服务器验证成功
				// 提示上传成功信息
				$li.find('.upload-status').addClass('success').html(
					'<i></i><span class="status-content">上传成功</span>'
				);
				var ywjName = response.content;
				var info = response.info;
				$("input[name='download_src']").val(ywjName);
				$("input[name='title']").val(info.name);
				$("input[name='size1']").val(info.size1);
				$("input[name='size2']").val(info.size2);
				$("input[name='game']").val(info.game);
				// 上传成功之后点击删除图片
				$li.on('click', '.off-progress', function(){
					$.ajax({
						type : "POST",
						url  : "/upload/deleteFile",
						data : {"ywjName": ywjName},
						dataType : 'json',
						success  : function(res) {
							if (res.status == true) {   // 删除成功
								$li.find('.success').html(
									'<i></i><span class="status-content">删除成功</span>'
								);
								// 移除上传文件
								uploader.removeFile(file, true);
								// 移除上传文本框
								$li.fadeOut(3000, function(){
									$(this).remove();
								});
								// 清除input文本
								$("input[name='download_src']").val('');
							}
						}
					});
				});
			}
		});
		// 不管成功或者失败，文件上传完成时触发
		uploader.on('uploadComplete', function(file){
			// 重置打点+计数
			timeMark  = new Date().getTime();
			frequency = -1;
		});
		
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
            $("[data-name='keywords']").hide();
            $("[data-name='des']").hide();
			$("[data-name='game']").hide();
			$("[data-name='cate']").hide();
			$("[data-name='size']").hide();
            $("[data-name='cps_url']").hide();
            $("[data-name='vectorDiagram']").hide();
            $("[data-name='preview']").hide();
            $("[data-tag='title']").show();
            $("[data-tag='keywords']").show();
			$("[data-tag='des']").show();
			$("[data-tag='game']").show();
			$("[data-tag='cps_url']").show();
			$("[data-tag='size']").show();
            $("[data-tag='vectorDiagram']").show();
            $("[data-tag='preview']").show();
        }
        $("[name='title'],[name='keywords'],[name='des'],[name='cid'],[name='game'],[name='size'],[name='cps_url']").on('focus', function(){
			 hideNotice();
        });
        $("#picker-up, #picker-down").on('click', function(){
            hideNotice();
        });

		$('.auto-key').on("click",function(){
			var title = $.trim($("input[name='title']").val());
			var size1   = $.trim($("input[name='size1']").val());
			var size2   = $.trim($("input[name='size2']").val());
			var size=size1+"*"+size2;

			var cid   = $("input[name='cid']").attr("data-id");
			var game = $.trim($("input[name='game']").val());
			var cps_url = $.trim($("input[name='cps_url']").val());
			if (title==''||size1==''||size2==''||cid==0||game==''||cps_url==''){
				layer.alert('填写完：标题、尺寸、分类、游戏、落地页地址。才能自动生成关键词');
				return false;
			}
			$.ajax({
				type : 'post',
				url  : '/upload/keyword',
				data : {
					title:title,
					size:size,
					cid:cid,
					game:game,
					cps_url:cps_url
				},
				success: function(res){
					$("textarea[name='keywords']").val(res);
				}
			});

		});

		 // 提交审核矢量图信息
        $("#sub-examine").on("click", function(){
            var title = $.trim($("input[name='title']").val());
            if (!title) {
                $("[data-tag='title']").hide();
                $("[data-name='title']").html("<i></i>标题不能为空").show();
                return;
            }
            var keywords  = $.trim($("textarea[name='keywords']").val());			
            if (!keywords) {
                $("[data-tag='keywords']").hide();
                $("[data-name='keywords']").html("<i></i>标签最少6组").show();
                return;
            }
			var des  = $.trim($("textarea[name='des']").val());
			
			var size1   = $.trim($("input[name='size1']").val());
			var size2   = $.trim($("input[name='size2']").val());			
            if (!size1 || !size2) {
				$("[data-tag='size']").hide();
                $("[data-name='size']").html("<i></i>请输入正确尺寸").show();
                return;
            }
			var size=size1+"*"+size2;
            var cid   = $("input[name='cid']").attr("data-id");
            if (cid == 0) {
                $("[data-name='cate']").html("<i></i>请选择分类").show();
                return;
            }
			var chanid   = $("input[name='chanid']").attr("data-id");
			if (chanid == 0) {
				$("[data-name='channel']").html("<i></i>请选择媒体").show();
				return;
			}
		    var game = $.trim($("input[name='game']").val());
            if (!game) {
                $("[data-tag='game']").hide();
                $("[data-name='game']").html("<i></i>游戏不能为空").show();
                return;
            }
			var cps_url = $.trim($("input[name='cps_url']").val());
            if (!cps_url) {
                $("[data-tag='cps_url']").hide();
                $("[data-name='cps_url']").html("<i></i>落地页地址不能为空").show();
                return;
            }
            var down  = $("input[name='download_src']").val();
            if (!down) {
                $("[data-tag='vectorDiagram']").hide();
                $("[data-name='vectorDiagram']").html("<i></i>源文件上传失败，请重新上传").show();
                return;
            }
            var pre   = $("input[name='detail_preview_src']").val();
            if (!pre) {
                $("[data-tag='preview']").hide();
                $("[data-name='preview']").html("<i></i>预览图上传失败，请重新上传").show();
                return;
            }			
            $.ajax({
                type : 'post',
				dataType:'json',
                url  : '/upload/saveOpusInfo',
                data : 'title=' + title + '&keywords=' + keywords + '&des=' + des+ '&size=' + size + '&cid=' + cid +'&chanid=' + chanid+ '&game=' + game+ '&cps_url=' + cps_url + '&down=' + down + '&pre=' + pre,
                success: function(res){
                    if (res.status == false) {
                        switch (res.content) {
                            case 1:
                                $("[data-tag='title']").hide();
                                $("[data-name='title']").html("<i></i>标题格式不正确").show();
                                break;
                            case 2:
								$("[data-tag='cps_url']").hide();
								$("[data-name='cps_url']").html("<i></i>落地页地址不正确").show();
								break;
                            case 3:
                                $("[data-tag='keywords']").hide();
                                $("[data-name='keywords']").html("<i></i>标签最少6组不重复").show();
                                break;
                            case 4:
                                $("[data-name='cate']").html("<i></i>请选择分类").show();
                                break;
                            case 5:
                                $("[data-tag='vectorDiagram']").hide();
                                $("[data-name='vectorDiagram']").html("<i></i>源文件上传失败，请重新上传").show();
                                break;
                            case 6:
                                $("[data-tag='preview']").hide();
                                $("[data-name='preview']").html("<i></i>预览图上传失败，请重新上传").show();
                                break;
							case 7:
								$("[data-tag='des']").hide();
								$("[data-name='des']").html("<i></i>描述太长了，请简短一些").show();
								break;
                            case 8:
                                $("[data-name='submit']").html("<i></i>提交审核失败").show();
                                break;

                        }
                    } else {
                        // 跳转上传成功页面
                        window.location.href = '/upload/saveSuccess';
                    }
                }
            });
        });
		
		
		 // 提交审核矢量图信息
        $("#sub-edit").on("click", function(){
			var mid = $.trim($("input[name='mid']").val());
            var title = $.trim($("input[name='title']").val());
            if (!title) {
                $("[data-tag='title']").hide();
                $("[data-name='title']").html("<i></i>标题不能为空").show();
                return;
            }
            var keywords  = $.trim($("textarea[name='keywords']").val());			
            if (!keywords) {
                $("[data-tag='keywords']").hide();
                $("[data-name='keywords']").html("<i></i>标签最少6组").show();
                return;
            }
			var des  = $.trim($("textarea[name='des']").val());
			
			var size1   = $.trim($("input[name='size1']").val());
			var size2   = $.trim($("input[name='size2']").val());			
            if (!size1 || !size2) {
				$("[data-tag='size']").hide();
                $("[data-name='size']").html("<i></i>请输入正确尺寸").show();
                return;
            }
			var size=size1+"*"+size2;
            var cid   = $("input[name='cid']").attr("data-id");
            if (cid == 0) {
                $("[data-name='cate']").html("<i></i>请选择分类").show();
                return;
            }
			var chanid   = $("input[name='chanid']").attr("data-id");
			if (chanid == 0) {
				$("[data-name='channel']").html("<i></i>请选择媒体").show();
				return;
			}
		    var game = $.trim($("input[name='game']").val());
            if (!game) {
                $("[data-tag='game']").hide();
                $("[data-name='game']").html("<i></i>游戏不能为空").show();
                return;
            }
			var cps_url = $.trim($("input[name='cps_url']").val());
            if (!cps_url) {
                $("[data-tag='cps_url']").hide();
                $("[data-name='cps_url']").html("<i></i>落地页地址不能为空").show();
                return;
            }
            var down  = $("input[name='download_src']").val();            
            var pre   = $("input[name='detail_preview_src']").val();            		
            $.ajax({
                type : 'post',
				dataType:'json',
                url  : '/upload/editOpusInfo',
                data : 'mid='+mid+'&title=' + title + '&keywords=' + keywords + '&des=' + des+ '&size=' + size + '&cid=' + cid +'&chanid=' + chanid+ '&game=' + game+ '&cps_url=' + cps_url + '&down=' + down + '&pre=' + pre,
                success: function(res){
                    if (res.status == false) {
                        switch (res.content) {
							case 1:
								$("[data-tag='title']").hide();
								$("[data-name='title']").html("<i></i>标题格式不正确").show();
								break;
							case 2:
								$("[data-tag='cps_url']").hide();
								$("[data-name='cps_url']").html("<i></i>落地页地址不正确").show();
								break;
							case 3:
								$("[data-tag='keywords']").hide();
								$("[data-name='keywords']").html("<i></i>标签最少6组不重复").show();
								break;
							case 4:
								$("[data-name='cate']").html("<i></i>请选择分类").show();
								break;
							case 5:
								$("[data-tag='vectorDiagram']").hide();
								$("[data-name='vectorDiagram']").html("<i></i>源文件上传失败，请重新上传").show();
								break;
							case 6:
								$("[data-tag='preview']").hide();
								$("[data-name='preview']").html("<i></i>预览图上传失败，请重新上传").show();
								break;
							case 7:
								$("[data-tag='des']").hide();
								$("[data-name='des']").html("<i></i>描述太长了，请简短一些").show();
								break;
							case 8:
								$("[data-name='submit']").html("<i></i>提交审核失败").show();
								break;
                        }
                    } else {
                        // 跳转上传成功页面
                        window.location.href = '/upload/saveSuccess';
                    }
                }
            });
        });
	});
})(jQuery);
