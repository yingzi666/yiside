<?php /*a:1:{s:60:"/Users/zhangboshuai/www/yiside/app/admin/view/auth/form.html";i:1602740831;}*/ ?>
<form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off"><div class="layui-card-body padding-left-40"><label class="layui-form-item relative block"><span class="color-green font-w7">访问权限名称</span><span class="color-desc margin-left-5">PermissionName</span><input type="text" name="title" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' required placeholder="请输入访问权限名称" class="layui-input"><span class="help-block">权限名称需要保持不重复，在给用户授权时需要根据名称选择！</span></label><label class="layui-form-item relative block"><span class="color-green font-w7">访问权限描述</span><span class="color-desc margin-left-5">PermissionDescription</span><textarea placeholder="请输入访问权限描述" class="layui-textarea" name="desc"><?php echo htmlentities((isset($vo['desc']) && ($vo['desc'] !== '')?$vo['desc']:"")); ?></textarea></label></div><div class="hr-line-dashed"></div><?php if(!(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty()))): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?><div class="layui-form-item text-center"><button class="layui-btn" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></form>