$(document).ready(function(){

	new List('idlist', {
		valueNames: ['name'],
		page: 5,
		pagination: true
	});

	new List('idlistAdmin', {
		valueNames: ['nameAdmin'],
		page: 5,
		pagination: true
	});
});