//ip地址输入框点击进去清楚内容自动为空
function ignoreSpaces(string) {
	var temp = "";
	string = '' + string;
	splitstring = string.split(" ");
	for(i = 0; i < splitstring.length; i++)
	temp += splitstring[i];
	return temp;
}
//$(document).ready(function() {
//     $('#searchform input').keyup(trimkeyup);
//});
//function trimkeyup(e) {
//  lucene_objInput = $(this);
// if (e.keyCode != 38 && e.keyCode != 40 && e.keyCode != 13) {
//     var im = $.trim(lucene_objInput.val());
//     lucene_objInput.val(im); 
// }
//}