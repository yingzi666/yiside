<?php /*a:1:{s:60:"/Users/zhangboshuai/www/yiside/app/admin/view/good/form.html";i:1603244680;}*/ ?>








<form class="layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off"><div class="layui-input-inline"><select class="layui-select my_category" name="subscribe"><?php foreach($category as $k=>$v): if($k.'' == input('subscribe')): ?><option selected value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['name']); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v['name']); ?></option><?php endif; ?><?php endforeach; ?></select><select class="layui-select my_category" name="subscribe"><?php foreach([''=>'-- 全部 --','0'=>'显示未关注的粉丝','1'=>'显示已关注的粉丝'] as $k=>$v): if($k.'' == input('subscribe')): ?><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php endif; ?><?php endforeach; ?></select><select class="layui-select my_category" name="subscribe"><?php foreach([''=>'-- 全部 --','0'=>'显示未关注的粉丝','1'=>'显示已关注的粉丝'] as $k=>$v): if($k.'' == input('subscribe')): ?><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php endif; ?><?php endforeach; ?></select></div></form><script type="text/javascript">
    $(document).ready(function(){
      $(".my_category").change(function(){
            pid = $(this).val();
        var obj = $(this);
           $.ajax({
               url: "<?php echo url('admin/good/get_data'); ?>",
               type: 'GET',
               dataType: 'json',
               data: {pid: pid},
           })
           .done(function(res) {
                var str='';
                 $.each(res, function(index, value) {
                    str+=" <option value="+value.id+">"+value.name+"</option>";
                });
                
               obj.next().html(str);

           })
           .fail(function() {
               console.log("error");
           })
           .always(function() {
               console.log("complete");
           });
            
      });
    });
</script>
