$( document ).ready(function() {
    $('#companies-datatable').DataTable({
        "paging":   false,
        "info":   false,
        "columns": [
            { "width": "1%", 'orderable': false },
            { "width": "1%", 'orderable': false },
            null,
            null,
            { "width": "1%", 'orderable': false }
        ],
        "order": [[ 2, "desc" ]]
    });

    $('#agreements-datatable').DataTable({
        "paging":   false,
        "info":   false,
        "columns": [
            { "width": "1%", 'orderable': false },
            { "width": "1%", 'orderable': false },
            null
        ],
        "order": [[ 2, "desc" ]]
    });

    $('button.delete').on('click', function(e){
        var $form=$(this).closest('form'); 
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = $(this).attr('data-token');
        console.debug(id);
        console.debug(url);
        $('#deleteModal').modal('show')
            .one('click', '#delete', function() {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {id: id, _token: token},
                    success: function(result) {
                        location.reload();
                    },
                    error: function() {
                        $('#deleteErrorModal').modal('show')
                    }
                });
            });
    });

    $('select').select2();
});
