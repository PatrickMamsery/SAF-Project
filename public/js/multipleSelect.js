// Select multiple values for manipulation
$(function() {
	//If check_all checked then check all table rows
	$("#check_all").on("click", function () {
		if ($("input:checkbox").prop("checked")) {
			$("input:checkbox[name='photo[]']").prop("checked", true);
		} else {
			$("input:checkbox[name='photo[]']").prop("checked", false);
		}
	});

	// Check each table row checkbox
	$("input:checkbox[name='photo[]']").on("change", function () {
		var total_check_boxes = $("input:checkbox[name='photo[]']").length;
		var total_checked_boxes = $("input:checkbox[name='photo[]']:checked").length;

		// If all checked manually then check check_all checkbox
		if (total_check_boxes === total_checked_boxes) {
			$("#check_all").prop("checked", true);
		}
		else {
			$("#check_all").prop("checked", false);
		}
	});
});