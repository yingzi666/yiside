<?php /*a:2:{s:72:"/Users/zhangboshuai/www/yiside/app/admin/view/config/storage-alioss.html";i:1602740831;s:67:"/Users/zhangboshuai/www/yiside/app/admin/view/config/storage-0.html";i:1602740831;}*/ ?>
<form onsubmit="return false" data-auto="true" action="<?php echo request()->url(); ?>" method="post" class='layui-form layui-card' autocomplete="off"><div class="layui-card-body padding-top-20"><div class="color-text margin-left-40 margin-bottom-20 layui-code text-center layui-bg-gray" style="border-left-width:1px"><p class="margin-bottom-5 font-w7">文件将上传到阿里云 OSS 存储，需要配置 OSS 公开访问及跨域策略</p><p>需要配置跨域访问 CORS 规则，设置：来源 Origin 为 *，允许 Methods 为 POST，允许 Headers 为 *</p></div><div class="layui-form-item"><label class="layui-form-label label-required"><span class="color-green font-w7">链接类型</span><br><span class="nowrap color-desc">LinkType</span></label><div class="layui-input-block"><?php if(!sysconf('storage.link_type')): sysconf('storage.link_type','none'); ?><?php endif; foreach(['none'=>'简洁链接','full'=>'完整链接'] as $k=>$v): ?><label class="think-radio notselect"><?php if(sysconf('storage.link_type') == $k): ?><input checked type="radio" name="storage.link_type" value="<?php echo htmlentities($k); ?>" lay-ignore><?php echo htmlentities($v); else: ?><input type="radio" name="storage.link_type" value="<?php echo htmlentities($k); ?>" lay-ignore><?php echo htmlentities($v); ?><?php endif; ?></label><?php endforeach; ?><p class="help-block">类型为“简洁链接”时链接将只返回 hash 地址，而“完整链接”将携带参数保留文件名称</p></div></div><div class="layui-form-item"><label class="layui-form-label" for="storage.allow_exts"><span class="color-green font-w7">允许类型</span><br><span class="nowrap color-desc">AllowExts</span></label><div class="layui-input-block"><input id="storage.allow_exts" type="text" name="storage.allow_exts" required value="<?php echo sysconf('storage.allow_exts'); ?>" placeholder="请输入系统文件上传后缀" class="layui-input"><p class="help-block">设置系统允许上传文件的后缀，多个以英文逗号隔开如：png,jpg,rar,doc</p></div></div><div class="layui-form-item"><label class="layui-form-label label-required"><span class="color-green font-w7">访问协议</span><br><span class="nowrap color-desc">Protocol</span></label><div class="layui-input-block"><?php if(!sysconf('storage.alioss_http_protocol')): sysconf('storage.alioss_http_protocol','http'); ?><?php endif; foreach(['http'=>'HTTP','https'=>'HTTPS','auto'=>"AUTO"] as $protocol=>$remark): ?><label class="think-radio"><?php if(sysconf('storage.alioss_http_protocol') == $protocol): ?><input checked type="radio" name="storage.alioss_http_protocol" value="<?php echo htmlentities($protocol); ?>" lay-ignore><?php echo htmlentities($remark); else: ?><input type="radio" name="storage.alioss_http_protocol" value="<?php echo htmlentities($protocol); ?>" lay-ignore><?php echo htmlentities($remark); ?><?php endif; ?></label><?php endforeach; ?><p class="help-block">阿里云OSS存储访问协议，其中 HTTPS 需要配置证书才能使用（AUTO 为相对协议）</p></div></div><div class="layui-form-item"><label class="layui-form-label"><span class="color-green font-w7">存储区域</span><br><span class="nowrap color-desc label-required">Region</span></label><div class="layui-input-block"><select class="layui-select" name="storage.alioss_point" lay-search><?php foreach($points as $point => $title): if(sysconf('storage.alioss_point') == $point): ?><option selected value="<?php echo htmlentities($point); ?>"><?php echo htmlentities($title); ?>（ <?php echo htmlentities($point); ?> ）</option><?php else: ?><option value="<?php echo htmlentities($point); ?>"><?php echo htmlentities($title); ?>（ <?php echo htmlentities($point); ?> ）</option><?php endif; ?><?php endforeach; ?></select><p class="help-block">阿里云OSS存储空间所在区域，需要严格对应储存所在区域才能上传文件</p></div></div><div class="layui-form-item"><label class="layui-form-label" for="storage.alioss_bucket"><span class="color-green font-w7">空间名称</span><br><span class="nowrap color-desc">Bucket</span></label><div class="layui-input-block"><input id="storage.alioss_bucket" type="text" name="storage.alioss_bucket" required value="<?php echo sysconf('storage.alioss_bucket'); ?>" placeholder="请输入阿里云OSS存储 Bucket (空间名称)" class="layui-input"><p class="help-block">填写阿里云OSS存储空间名称，如：think-admin-oss（需要是全区唯一的值，不存在时会自动创建）</p></div></div><div class="layui-form-item"><label class="layui-form-label" for="storage.alioss_http_domain"><span class="color-green font-w7">访问域名</span><br><span class="nowrap color-desc">Domain</span></label><div class="layui-input-block"><input id="storage.alioss_http_domain" type="text" name="storage.alioss_http_domain" required value="<?php echo sysconf('storage.alioss_http_domain'); ?>" placeholder="请输入阿里云OSS存储 Domain (访问域名)" class="layui-input"><p class="help-block">填写阿里云OSS存储外部访问域名，如：static.thinkadmin.top</p></div></div><div class="layui-form-item"><label class="layui-form-label" for="storage.alioss_access_key"><span class="color-green font-w7">访问密钥</span><br><span class="nowrap color-desc">AccessKey</span></label><div class="layui-input-block"><input id="storage.alioss_access_key" type="text" name="storage.alioss_access_key" required value="<?php echo sysconf('storage.alioss_access_key'); ?>" placeholder="请输入阿里云OSS存储 AccessKey (访问密钥)" class="layui-input"><p class="help-block">可以在 [ 阿里云 > 个人中心 ] 设置并获取到访问密钥</p></div></div><div class="layui-form-item"><label class="layui-form-label" for="storage.alioss_secret_key"><span class="color-green font-w7">安全密钥</span><br><span class="nowrap color-desc">SecretKey</span></label><div class="layui-input-block"><input id="storage.alioss_secret_key" type="text" name="storage.alioss_secret_key" required value="<?php echo sysconf('storage.alioss_secret_key'); ?>" maxlength="43" placeholder="请输入阿里云OSS存储 SecretKey (安全密钥)" class="layui-input"><p class="help-block">可以在 [ 阿里云 > 个人中心 ] 设置并获取到安全密钥</p></div></div><div class="hr-line-dashed margin-left-40"></div><input type="hidden" name="storage.type" value="alioss"><div class="layui-form-item text-center padding-left-40"><button class="layui-btn" type="submit">保存配置</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消修改吗？" data-close>取消修改</button></div><script>form.render()</script></div></form>