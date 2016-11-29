if ($(".allform").length > 0) {
    var add_submit = $(".allform").Validform({
        tiptype: function (msg, o, cssctl) {
            if (!o.obj.is("form")) {//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
                var objtip = o.obj.parents(".wrap").find(".Validform_checktip");
                cssctl(objtip, o.type);
                if (o.type == 1) {
                    msg = '<i class="fa fa-spinner fa-spin"></i>' + msg;
                } else if (o.type == 2) {
                    msg = '<i class="fa fa-check"></i>';
                } else {
                    msg = '<i class="fa fa-exclamation-circle"></i>' + msg;
                }
                objtip.html(msg);
            }
        }
    })
}
/*上面已经完成实时表单的验证*/
/*submit的class已经写好了，你直接用check阻止请求*/
