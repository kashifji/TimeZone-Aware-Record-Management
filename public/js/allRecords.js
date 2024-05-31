var recordsTable;
$(document).ready(function() {
    const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

     recordsTable = $('#recordsTable').DataTable({

                "ajax" : {
        "url": "/loadRecords",
        "type" : "get",
        "dataType" : "json",
         "data" : {"timezone" : timezone},
        "dataSrc": '', // Add this one!
        },
                columns: [
                    { data: 'task_name' },
                    { data: 'task_description' },
                    {
                        data: 'created_at',
                        render: function (data, type, row) {
                    // Split the timestamp string into date and time parts
                    const date = data.slice(0, 10);
                    const time = data.slice(11, 19);
                    return `${date} ${time}`;
                }
                    },
                    { data: 'id', render: function(data, type, row) {
                return `<button class="btn btn-danger delete-btn" data-id="${data}">Delete</button>`;
                    }

                }
                ]
            });

    $('#recordsTable').on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/records/delete/' + id,
                    type: 'DELETE', // Use DELETE method
                    data: {
                        _token: token
                    },
                    success: function (result) {
                        Swal.fire(
                            'Deleted!',
                            'Your record has been deleted.',
                            'success'
                        );
                        // Reload DataTables
                        $('#recordsTable').DataTable().ajax.reload();
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the record.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
