function openCreateBetModal() {
  vex.defaultOptions.className = 'vex-theme-os';
  var todayDateString;
  todayDateString = new Date().toJSON().slice(0, 10);
  vex.dialog.open({
    message: 'Create a Bet:',
    input: "<input name=\"bet\" type=\"text\" placeholder=" +
      "\"What is the Bet?\" required />\n<label for=\"date\">Date</label>\n " +
      "<input name=\"date\" type=\"date\" value=\"" + todayDateString + "\" " +
      "/>\n </div>\n <label for=\"time\">End Time</label>\n <input name=" +
      "\"time\" type=\"time\" value=\"00:00\" />\n <label for=\"choices\">" +
      "Choices</label>\n <input name=\"choices\" placeholder=" +
      "\"What are the choices (separated by commas)?\" type=\"text\">",
    callback: function(data) {
      if (data === false) {
        return console.log('Cancelled');
      }
      console.log('Date', data.date, 'Time', data.time);
    /*  $('.demo-result-custom-vex-dialog').show().html(
        "<h4>Result</h4>\n<p>\n Date: <b>" + data.date + "</b><br/>\n " +
        "Time: <input type=\"time\" value=\"" + data.time + "\" readonly />\n</p>");
*/
		$.post( "home.php?createBet", { question: data.bet, endstamp: data.date + " " + data.time, options: data.choices })
			.done(function( res ) {
				console.log("home.php?createBet result: " + res);
				window.location.href = "/findBet.html"; //TODO// MAKE IT PHP and open directly to questions created
			});
    }
  });
}


$('.create-bet-button').click(function() {
  openCreateBetModal();
});
