function openCreateBetModal() {
  vex.defaultOptions.className = 'vex-theme-os';
  var todayDateString;
  todayDateString = new Date().toJSON().slice(0, 10);
  vex.dialog.open({
    message: 'Place a Bet:',
    input: "<label for=\"amount\">Amount</label>\n <input name=\"amount\" " +
      "type=\"text\" placeholder=\"How much are you betting?\" required />\n" +
      "<label for=\"choices\"> Select a choice</label>\n " +
		"<div id=\"curOptions\">" + 
      "</div>",

    callback: function(data) {
      if (data === false) {
        return console.log('Cancelled');
      }
      // CHANGE THISSSSSS
      console.log('Date', data.date, 'Time', data.time);
      return $('.demo-result-custom-vex-dialog').show().html(
        "<h4>Result</h4>\n<p>\n Date: <b>" + data.date + "</b><br/>\n " +
        "Time: <input type=\"time\" value=\"" + data.time + "\" readonly />\n</p>");
    }
  });
}


$('.place-bet-button').click(function() {
  openCreateBetModal();
});

/*
 *

      "<input type=\"radio\" name=\"bet\" value=\"first\" id=\"firstBet\">" +
      "<label for=\"firstBet\">First Bet</label>" +

		*/
