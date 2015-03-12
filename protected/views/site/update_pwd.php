<div class="tab-content">
	<div class="tab-pane active" id="tab_0">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="fa fa-reorder"></i>修改登录密码</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="" method="post" class="form-horizontal" onSubmit="return false;" id="passwordfrom" >
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-2 control-label">当前密码</label>
							<div class="col-md-3">
								<div class="input-group">
									<input type="password" class="form-control" name="oldpassword" placeholder="当前密码">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">新密码</label>
							<div class="col-md-3">
								<div class="input-group">
									<input type="password" class="form-control" name="newpassword" placeholder="新密码">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">确认密码</label>
							<div class="col-md-3">
								<div class="input-group">
									<input type="password" class="form-control" name="newpassword2" placeholder="请再次填写密码">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<input type="hidden" name="confirm" value="true" />
						<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn blue" onclick="modifyPassword();" >确认修改</button>
						</div>
					</div>
				</form>
				<!-- END FORM--> 
			</div>
		</div>
	</div>
</div>

<script>
    function modifyPassword() {
        var PFM = $('#passwordfrom');
        $.post(PFM.attr('action'), PFM.serialize(), function(data){
			if(data.status == true) {
				BootstrapDialog.alert({title: '提示信息', message: data.info, buttonLabel:'确定'});
                setTimeout('window.location.reload()', 3000);
            } else {
				BootstrapDialog.alert({title: '提示信息', message: data.info + '<br/>' + data.error, buttonLabel:'确定'});
			}
          }, 'json');
        return false;
    }
</script>
