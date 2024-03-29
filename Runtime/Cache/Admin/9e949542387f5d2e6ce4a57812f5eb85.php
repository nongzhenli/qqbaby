<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>我的桌面</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/admin/css/iframe.css">
</head>
<body>
<header class="iframe_header">
	<nav class="iframe_top_nav clearfix">
		<span class="glyphicon glyphicon-home"></span>
		首页 <span class="c-gray en"> &gt;</span>
		客片管理<span class="c-gray en"> &gt;</span>
		客片列表
		<a href="javascript:location.replace(location.href);" class="btn btn-success float_r" title="刷新"><span class="glyphicon glyphicon-refresh"></span></a>
	</nav>
</header>
<div class="iframe_main">
	<!-- 搜索框 -->
	<div class="iframe_main_search"></div>

	<!-- 客片列表 -->
	<div class="iframe_main_list">
		<div class="hd_box">
			<button type="button" id="del_case_btn" class="btn btn-danger" data-toggle="modal" data-target=".top_box"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<button type="button" id="add_case_btn" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 添加客片</button>
			<span class="float_r">共有数据：1 条</span>
		</div>
		<div class="bd_box">
			<table class="table_data table table-bordered">
				<thead class="table_hd">
					<tr class="table_row">
						<th class="table_item th_input"><input type="checkbox" ></th>
						<th class="table_item th_id">ID</th>
						<th class="table_item th_titel">标题</th>
						<th class="table_item th_srcImg">缩略图</th>
						<th class="table_item th_category">所属分类</th>
						<th class="table_item th_update">更新时间</th>
						<th class="table_item th_status">状态</th>
						<th class="table_item th_control">操作</th>
					</tr>
				</thead>
				<tbody>
					<!-- 此处遍历 -->
					<tr class="table_row">
						<td class="table_item"><input type="checkbox" name="caseName" value="06" /></td>
						<td class="table_item">06</td>
						<td class="table_item">勇闯天涯</td>
						<td class="table_item">img</td>
						<td class="table_item">亲子照</td>
						<td class="table_item">2017-9-4 18:30</td>
						<td class="table_item"><span class="btn btn-success" data-id="06">已启用</span></td>
						<td class="table_item td_control">
                            <span class="glyphicon glyphicon-eye-open" title="预览"></span>
							<span class="glyphicon glyphicon-edit" title="编辑"></span>
							<span class="glyphicon glyphicon-arrow-down" title="下架"></span>
							<span class="glyphicon glyphicon-trash" title="删除"></span>
						</td>
					</tr>
					<tr class="table_row">
						<td class="table_item"><input type="checkbox" name="caseName" value="07" /></td>
						<td class="table_item">07</td>
						<td class="table_item">天地一号</td>
						<td class="table_item">img</td>
						<td class="table_item">婴儿照</td>
						<td class="table_item">2017-9-4 13:00</td>
						<td class="table_item"><span class="btn btn-success" data-id="07">已启用</span></td>
						<td class="table_item td_control">
                            <span class="glyphicon glyphicon-eye-open" title="预览"></span>
							<span class="glyphicon glyphicon-edit" title="编辑"></span>
							<span class="glyphicon glyphicon-arrow-down" title="下架"></span>
							<span class="glyphicon glyphicon-trash" title="删除"></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- 操作提示框 -->
<div class="modal fade top_box" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">信息</h4>
			</div>
			<div class="tip_box"><span class="glyphicon glyphicon-question-sign"></span>确定删除吗？</div>
			<div class="modal-footer text_c">
				<button type="button" class="btn btn-primary">确定</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(function(){
    // 全选、反选择
    // # 此处有一个坑，假如使用 attr()时，并不能动态的去通过更改属性去操控是否显示！
    // # 解决办法，使用prop()替换attr()。总结：
    // # 对于HTML元素本身就带有的固有属性，在处理时，使用prop方法。
    // # 对于HTML元素我们自己自定义的DOM属性，在处理时，使用attr方法。
    $('.th_input > input').on('click', function(){
        (this.checked)?(
            $("input[name='caseName']").prop('checked', true)
        ):(
            $("input[name='caseName']").prop('checked', false)
        )
    });
    // 获取所有被选中的input
    $('#del_case_btn').on('click', function(){
        let input_val = []; // 存放选中input的val值
        let $array_input = $("input[name='caseName']:checked");

        for(let i=0; i<$array_input.length; i++) {
            input_val.push($array_input[i].getAttribute('value'));
        }
        console.log("获取所有被选中的input", input_val);
        // # 此时获取数组后，弹窗确定则通过ajax传递
    });
});
</script>
</body>
</html>