$(function(){
	/* Function to replace number with currency format*/
	function numWithDot(x) {
	    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}
	/* Function to replace currency format to number not with dot */
	function numNotDot(x) {
	    return parseInt(x.toString().replace(/[^0-9]+/g, ''));
	}
	/*
	* Loan calculate process and auto update element with changes value
	*/
	function fnGetLoan(){
		/*
		* Some variable from configuration php 'js_config.php'
		* transmission_fees, principal, fee and calculate
		*/
		var transmission = 0;
		var interest_rate = loanConf['interest_rate'];
		var principal = numNotDot($('#jumlahpinjaman').text());
		var dueDate = numNotDot($('#lamahari').text());
		var fee = eval(loanConf['js_calculate']);
		var principalDueDate = principal + fee;
		/* Auto update text to tag element with ID below */
		$("#vPrincipal").text(accounting.formatMoney(principal, "Rp. ", 0, "."));
		$("#vFee").text(accounting.formatMoney(fee, "Rp. ", 0, "."));
		$("#vPrincipalDueDate").text(accounting.formatMoney(principalDueDate, "Rp. ", 0, "."));

	}
	/* Principal amount slider function */
	$('#principal_amount').slider({
		min : parseInt(loanConf['min_amount']),
		max : parseInt(loanConf['max_amount']),
		step : parseInt(loanConf['step_amount']),
		value : parseInt(loanConf['amount']),
		formatter: function(value) {
			$('#jumlahpinjaman').text(numWithDot(value));
			// call fnGetLoan function
			fnGetLoan();
			return lgAmount+' : ' + accounting.formatMoney(value, "Rp. ", 0, ".");
		}
	});
	// $('#principal_amount').show();
	/* due date slider function */
	$slider_due_date = $('#due_date');
	$slider_due_date.slider({
		min : parseInt(loanConf['min_tenor']),
		max : parseInt(loanConf['max_tenor']),
		step : parseInt(loanConf['step_tenor']),
		value : parseInt(loanConf['tenor']),
		formatter: function(value) {
			$('#lamahari').text(value);
			fnGetLoan();
			var due_date = Date.today().addDays(value - 1).toString(loanConf['format_tenor']);
			$("#vDueDate").text(due_date);
			return due_date;
		}
	});
	// $('#due_date').show();

	// Auto update principal and due date slider scroll if input change
	// $(document).on('change','[name="principal_amount"]',function(){
	// 	$number = $(this).val().replace(/[^0-9]+/g, '');
	// 	$('#principal_amount').slider('setValue', parseInt($number));
	// });
	// $(document).on('change','[name="due_date"]',function(){
	// 	$('#due_date').slider('setValue', parseInt($(this).val()));
	// });

	/*
	* For EC-API page
	*/
	function fnLoan(day){
		var principal = numNotDot(principal_amount);
		var dueDate = numNotDot(day);
		var fee = eval(calculate);
		var principalDueDate = principal + fee;
		$("#vPrincipal").text(accounting.formatMoney(principal, "Rp. ", 0, "."));
		$("#vFee").text(accounting.formatMoney(fee, "Rp. ", 0, "."));
		$("#vPrincipalDueDate").text(accounting.formatMoney(principalDueDate, "Rp. ", 0, "."));
		var due_date = Date.today().addDays(dueDate).toString(loanConf['format_tenor']);
		$("#vDueDate").text(due_date);
		$("[name='day']").val(day);
	}
	/* Run fnLoan function if input with name 'day_length' on event keyup or change */
	$(document).on('keyup change','[name="day_length"]',function(){
		$day = parseInt($(this).val());
		fnLoan($day);
	});
});
