// Select multiple values for manipulation
$(function() {
	//If check_all checked then check all table rows
	$("#check_all").on("click", function () {
		if ($("input:checkbox").prop("checked")) {
			$("input:checkbox[name='user[]']").prop("checked", true);
		} else {
			$("input:checkbox[name='user[]']").prop("checked", false);
		}
	});

	// Check each table row checkbox
	$("input:checkbox[name='user[]']").on("change", function () {
		var total_check_boxes = $("input:checkbox[name='user[]']").length;
		var total_checked_boxes = $("input:checkbox[name='user[]']:checked").length;

		// If all checked manually then check check_all checkbox
		if (total_check_boxes === total_checked_boxes) {
			$("#check_all").prop("checked", true);
		}
		else {
			$("#check_all").prop("checked", false);
		}
	});
});