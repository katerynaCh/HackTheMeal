<form action="password_recovery.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="new_password" placeholder="New Password" type="password"/>
        </div>
          <div class="form-group">
            <input class="form-control" name="repeat_new_password" placeholder="Confirm New Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default btn-lg btn-block" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Change Password
            </button>
        </div>
    </fieldset>
</form>
