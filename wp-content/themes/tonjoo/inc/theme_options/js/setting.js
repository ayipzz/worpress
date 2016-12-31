/*
* @Author: hakim
* @Date:   2016-12-31 08:47:39
* @Last Modified by:   hakim
* @Last Modified time: 2016-12-31 09:36:13
*/

'use strict';
$(document).ready(function($) {
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	e.target // newly activated tab
	e.relatedTarget // previous active tab
});
});