// Basic DataTable
$(function(){
	$('#cast_view').DataTable({
        dom: 'Bfrtip',
        "lengthMenu": [[10, 25, 50], [10, 25, 50, "All"]],
        "scrollY": "calc(100vh - 310px)",
        "scrollCollapse": true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
		"language": {
			"lengthMenu": "Display _MENU_ Records Per Page",
			"info": "Showing Page _PAGE_ of _PAGES_",
		}
	});
});