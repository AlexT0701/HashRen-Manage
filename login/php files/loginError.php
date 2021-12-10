<!DOCTYPE html>
<html lang="en">

<!-- <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen Login</title>
  <link rel="stylesheet" href="error.css">
</head>

<body>
  <main id="main-holder">
    <h1 id="login-header">HashRen Login</h1>

    <div id="login-error-msg-holder">
      <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
    </div>
	
	<form id="login-form" action="testin.php" method="post">
		<input type="text" placeholder="username" name="uname" id="username-field" class="login-form-field" placeholder="Username" required>
		<input type="password" placeholder="password" name="password" id="password-field" class="login-form-field" placeholder="Password" required>
		<input type="submit" name="submit" class="button" value="login" id="login-form-submit">
	</form>

  </main>
</body>

</html> -->
    
<div class="login">
  <h1>Hashren Login</h1>
  
  <div class="err">
  <p>Invalid Username</p>
  <p>and/or Password</p>
  </div>
  
  <!--<main id="main-holder">
    <div id="login-error-msg-holder">
      <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
    </div>
  </main> -->

  <link rel="stylesheet" href="del.css">
    <form id="login-form" action="testin.php" method="post">
      <input type="text" name="uname" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <input type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-large"></button>
    </form>
</div>