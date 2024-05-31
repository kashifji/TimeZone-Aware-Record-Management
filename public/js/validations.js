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

    $('#update-profile-form').on('submit', function (e) {
        var isValid = true;

        // Validate task_name
        var name = $('#name').val().trim();
        if (name.length === 0 || name.length > 255) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Name is required and should not exceed 255 characters.'
            });
        }


        if (!isValid) {
            e.preventDefault();
        }
    });

    $('#register-form').on('submit', function (e) {
        var isValid = true;

        // Validate name
        var name = $('#name').val().trim();
        if (name.length === 0 || name.length > 255) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Name is required and should not exceed 255 characters.'
            });
        }

        // Validate email
        var email = $('#email').val().trim();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email.length === 0 || !emailPattern.test(email)) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'A valid email is required.'
            });
        }

        // Validate password
        var password = $('#password').val().trim();
        var confirmPassword = $('#password-confirm').val().trim();
        if (password.length === 0) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Password is required.'
            });
        } else if (password.length < 8) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Password must be at least 8 characters long.'
            });
        } else if (password !== confirmPassword) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Password and confirm password must match.'
            });
        }

        if (!isValid) {
            e.preventDefault();
        }
    });


});
