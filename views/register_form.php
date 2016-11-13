<form action="register.php" method="post">
    <fieldset>
         <div class="form-group">
            <input class="form-control" name="first_name" placeholder="First Name" type="text"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="last_name" placeholder="Last Name" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
          <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        </div>
        
        <div class="form-group">
            <button class="btn btn-default btn-lg btn-block" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Sign Up
            </button>
        </div>
    </fieldset>
</form>
<div style="text-align:center; font-size:15px">
    or <a href="login.php">Log in</a> using an existing account
</div>
