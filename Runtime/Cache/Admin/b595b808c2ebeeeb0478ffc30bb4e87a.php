<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>欢迎登录qq宝贝后台管理系统</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/admin/css/style.css">
</head>
<body>
<!-- 头部 -->
<header class="page_header clearfix">
	<h1 class="float_l header_title">qq宝贝后台管理系统</h1>
	<div class="float_r">
		<span>超级管理员：admin</span>
		<a href="javascript:0;" class="btn btn-danger login_exit"><span class="glyphicon glyphicon-off"></span> 退出</a>
	</div>
</header>
<!-- 主体 -->
<div class="page_main">
	<!-- 侧边栏 -->
	<aside class="side_nav">
		<dl>
			<dt><span class="glyphicon glyphicon-picture"></span> 客片管理<i></i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Photo/addCase');?>" href="javascript:void(0)">添加客片</a></li>
					<li><a _href="<?php echo U('caseList');?>" href="javascript:void(0)">客片列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl>
			<dt><span class="glyphicon glyphicon-picture"></span> 首页广告位管理<i></i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Photo/topBanner');?>" href="javascript:void(0)">首屏顶部</a></li>
					<li><a _href="<?php echo U('Photo/newBanner');?>" href="javascript:void(0)">最新活动</a></li>
					<li><a _href="<?php echo U('Photo/infantBanner');?>" href="javascript:void(0)">婴儿作品</a></li>
					<li><a _href="<?php echo U('Photo/babayBanner');?>" href="javascript:void(0)">宝宝作品</a></li>
					<li><a _href="<?php echo U('Photo/childrenBanner');?>" href="javascript:void(0)">儿童作品</a></li>
					<li><a _href="<?php echo U('Photo/familyBanner');?>" href="javascript:void(0)">亲子作品</a></li>
					<li><a _href="<?php echo U('Photo/teamBanner');?>" href="javascript:void(0)">我们的团队</a></li>
					<li><a _href="<?php echo U('Photo/venueBanner');?>" href="javascript:void(0)">场馆主题</a></li>
				</ul>
			</dd>
		</dl>
	</aside>
	<section class="article_main">
		<!-- tab选项卡 -->
		<header class="main_top_nav">
			<ul class="main_top_nav_list clearfix">
				<li class="main_top_nav_item active">
					<span title="我的桌面" data-href="<?php echo U('welcome');?>">我的桌面</span>
					<em></em>
				</li>
			</ul>
		</header>

		<!-- 窗体 -->
		<div class="iframe_box">
			<!-- iframe_item -->
			<div class="show_iframe index_iframe clearfix">
				<div style="display:none" class="loading"></div>
				<iframe scrolling="yes" frameborder="0" src="<?php echo U('welcome');?>" class="iframe_item"></iframe>
			</div>
			<!-- more... -->
		</div>
	</section>
</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(function(){
	// 折叠
	$('.side_nav dt').click(function(){
		$(this).next('dd').toggle();
	});

	// 创建新的 iframe链接窗体
	$('.side_nav dl a').on('click', function(){
		let bool_ = true;	// 条件判断，是否存在 iframe
		// 获取点击链接、名称
		let $url = $(this).attr('_href');
		let $tab_name = $(this).text();

		// 获取所有iframe
		let $array_ = $('.iframe_box .iframe_item ');
		for(let i=0; i<$array_.length; i++) {
			let SRC_active = $($array_[i]).attr('src');
			if(SRC_active === $url) {
				console.log('此处已经跳出循环了！');
				bool_ = false
				break;
			}
		}
		// 是否终止【不添加新的iframe、不添加tab选项】
		if(bool_ === true){
			let addIframe_con = `<div class="show_iframe clearfix">
									<div style="display:none" class="loading"></div>
									<iframe scrolling="yes" frameborder="0" src="`+ $url +`" class="iframe_item"></iframe>
								</div>`;
			$('.show_iframe').hide().parent().append(addIframe_con);
			// 此处插入tab
			let addTab_dom = `<li class="main_top_nav_item active">
								<span title="`+ $tab_name +`" data-href="`+  $url +`">`+ $tab_name +`</span>
								<i></i>
								<em></em>
							</li>`;
			$('.main_top_nav_item ').removeClass('active').parent().append(addTab_dom);
		}
		
	});

	// 事件委托，实现动态添加的tab切换
	$('.main_top_nav_list').on('click', 'li.main_top_nav_item', function(event){	// on(事件，目标元素，执行函数)
		// 每次点击获取所有iframe
		let $array_ = $('.iframe_box .show_iframe');
		let $tab = $('.main_top_nav_list').children('li');
		let $index = $(event.currentTarget).index();  // 获取索引
		
		$tab.removeClass('active');	 // 去除所有tab元素的active类
		$(event.currentTarget).addClass('active');  // 为当前选择的tab添加active
		$array_.hide();	 // 隐藏掉所有iframe
		$array_[$index].style.display = 'block';  // 显示对应 iframe
		
		//  删除
		let $target = event.target;	 // 获取事件源
		($target.localName === 'i')?(
			$array_[$index].remove(),
			$tab[$index].remove(),
			$($tab[$index-1]).addClass('active'),
			$array_[($index-1)].style.display = 'block'
		):('');
	});
});
</script>
</body>
</html>