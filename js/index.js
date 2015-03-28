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

    }
  });
}

$('.login-button').click(function() {
  openLoginModal();
});
