function openLoginModal() {
  vex.defaultOptions.className = 'vex-theme-os';
  vex.dialog.open({
    message: 'Enter your username and password:',
    input: "<input name=\"username\" type=\"text\" placeholder=\"Username\" " +
      "required />\n<input name=\"password\" type=\"password\" " +
      "placeholder=\"Password\" required />",
    buttons: [
      $.extend({}, vex.dialog.buttons.YES, {
        text: 'Login'
      }), $.extend({}, vex.dialog.buttons.NO, {
        text: 'Back'
      })
    ],
    callback: function(data) {
      if (data === false) {
        return console.log('Cancelled');
      }
      console.log('Username', data.username, 'Password', data.password);
		$.post( "login.php", { username: data.username, password: data.password})
			.done(function( res ) {
				console.log("login.php result: " + res);
				if (res == "true")
					window.location.href = "/home.html";
				else 
					alert("Invalid login credentials");
			});
    }
  });
}

function openRegisterModal() {
  vex.defaultOptions.className = 'vex-theme-os';
  vex.dialog.open({
    message: 'Enter a username and password:',
    input: "<input name=\"username\" type=\"text\" placeholder=\"Username\" " +
      "required />\n<input name=\"password\" type=\"password\" " +
      "placeholder=\"Password\" required />",
    buttons: [
      $.extend({}, vex.dialog.buttons.YES, {
        text: 'Register'
      }), $.extend({}, vex.dialog.buttons.NO, {
        text: 'Back'
      })
    ],
    callback: function(data) {
      if (data === false) {
        return console.log('Cancelled');
      }
      console.log('Username', data.username, 'Password', data.password);
		$.post( "login.php?register", { username: data.username, password: data.password})
			.done(function( res ) {
				console.log("login.php?register result: " + res);
				if (res == "true")
					window.location.href = "/home.html";
				else 
					alert("User already exists, choose a different username.");
			});
    }
  });
}

function openAboutModal() {
  vex.defaultOptions.className = 'vex-theme-os';
  vex.dialog.open({
    message: 'About is gonna go here'
  });

}

$('.login-button').click(function() {
  openLoginModal();
});

$('.register-button').click(function() {
  openRegisterModal();
});

$('.about-button').click(function() {
  openAboutModal();
});
