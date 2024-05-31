$(document).ready(function () {
    $('#add-record-form').on('submit', function (e) {
        var isValid = true;

        // Validate task_name
        var taskName = $('#task_name').val().trim();
        if (taskName.length === 0 || taskName.length > 255) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Task Name is required and should not exceed 255 characters.'
            });
        }

        // Validate task_description
        var taskDescription = $('#task_description').val().trim();
        if (taskDescription.length === 0 || taskDescription.length > 1024) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Task Description is required and should not exceed 1024 characters.'
            });
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
});
