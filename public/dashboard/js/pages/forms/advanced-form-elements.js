'use strict';
$(function () {
	initBasicSelect();
	$('#optgroup').multiSelect({ selectableOptgroup: true });
});

//Get noUISlider Value and write on
function initBasicSelect() {
	/* basic select start*/
	$('select').formSelect();
	$('#sel').formSelect();
	var data = [{ id: 1, name: "Option 1" }, { id: 2, name: "Option 2" }, { id: 3, name: "Option 3" }];

	var Options = "";
	$.each(data, function (i, val) {
		$('#sel').append("<option value='" + val.id + "'>" + val.name + "</option>");
		$('#sel').formSelect();
	});
	/* basic select end*/
}
