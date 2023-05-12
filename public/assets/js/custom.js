$("input[data-bootstrap-switch]").each(function () {
	$(this).bootstrapSwitch('state', $(this).prop('checked'));
});

// $('.select2').select2({
// 	theme: 'bootstrap4'
// });

/*** add active class and stay opened when selected ***/
let url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function () {
	if (this.href) {
		// return this.href == url || url.href.indexOf(this.href) == 0;
		return this.href == url;
	}
}).addClass('active');

// for the treeview
$('ul.nav-treeview a').filter(function () {
	if (this.href) {
		return this.href == url || url.href.indexOf(this.href) == 0;
	}
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
