// Basic DataTable
$(function(){
	$('#cast_view').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        "scrollY": "calc(100vh - 310px)",
        "scrollCollapse": true,
        buttons: [
            'csvHtml5',
            'pdfHtml5',
            'print',
            {
                text: 'Add New Cast',
                className: 'btn btn-outline-success ',
                attr : {

                },
                key: {
                    shiftKey: true,
                    key: '1'
                },
                action: function ( e, dt, node, config ) {
                    $("#add_new_cast").modal('show');
                }
            },
        ],
        columnDefs: [
            {
                "visible": false,
                "targets": 0,
                "searchable": false
            }
        ],
		"language": {
			"lengthMenu": "Display _MENU_ Records Per Page",
			"info": "Showing Page _PAGE_ of _PAGES_",
		},
	});

	$('#genre_view').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        "scrollY": "calc(100vh - 310px)",
        "scrollCollapse": true,
        buttons: [
            'csvHtml5',
            'pdfHtml5',
            'print',
            {
                text: 'Add New Genre',
                className: 'btn btn-outline-success ',
                attr : {

                },
                key: {
                    shiftKey: true,
                    key: '1'
                },
                action: function ( e, dt, node, config ) {
                    $("#add_new_genre").modal('show');
                }
            },
        ],
        columnDefs: [
            {
                "visible": false,
                "targets": 0,
                "searchable": false
            }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        },
    });

    $('#tag_view').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        "scrollY": "calc(100vh - 310px)",
        "scrollCollapse": true,
        buttons: [
            'csvHtml5',
            'pdfHtml5',
            'print',
            {
                text: 'Add New Tag',
                className: 'btn btn-outline-success ',
                attr : {

                },
                key: {
                    shiftKey: true,
                    key: '1'
                },
                action: function ( e, dt, node, config ) {
                    $("#add_new_tag").modal('show');
                }
            },
        ],
        columnDefs: [
            {
                "visible": false,
                "targets": 0,
                "searchable": false
            }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ Records Per Page",
            "info": "Showing Page _PAGE_ of _PAGES_",
        },
    });


});
