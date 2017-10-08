<?php if(!empty($_SESSION["id"])): ?>
<form action="password.php" method="post">
    <div class="form-group">
        <input autocomplete="off" autofocus class="form-control" name="pw" placeholder="Current Password" type="password"/>
	</div>
	<br />
	<div class="form-group">
	    <input class="form-control" name="new_pw" placeholder="New Password" type="password"/>
	</div>
	<div class="form-group">
	    <input class="form-control" name="confirm" placeholder="Confirm New Password" type="password"/>
	</div>
	<div class="form-group">
	    <input class="submit" type="submit" value="Save"/>
	</div>
</form>
<?php endif ?>