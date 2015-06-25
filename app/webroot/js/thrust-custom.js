/**
 * Thrust: The Audit Management Tool
 * 
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v1.0
 */
 
/**
 * Excel Upload File Validate Function
 * @type {string[]}
 * @private
 */
var _validFileExtensions = [".xls"];
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
    return true;
}

/**
 * Auto Hide Flash Message
 * ToDo: Optimize Performance, not required for every page load, required only when Div is visible
 */
$(document).ready(function() {
    $('#myCustomFlash').fadeTo(3000, 500).hide(500);
});

/**
 * Programmatically Click Update Thrust Modal Hidden Link
 */
function showUpdateThrustModal() {
    $('#updateThrustHiddenLink')[0].click();
}