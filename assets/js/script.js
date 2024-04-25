$(document).ready(function () {
        // hapus user
    $('.hapusUser').on('click', function () {
        const id = $(this).data('id');
        $('#idUser').val(id);
    });

    //ubah user
    $('.ubahUser').on('click', function () {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const email = $(this).data('email');
        const role = $(this).data('role');
        const is_active = $(this).data('is_active');

        $('#idUpdateUser').val(id);
        $('#ubahNama').val(name);
        $('#ubahEmail').val(email);
        $('#ubahRole').val(role).change();

        if (is_active == 1) {
            $('.ubah-is-active').prop('checked', true);
        } else {
            $('.ubah-is-active').prop('checked', false);
        }
    });

    //reset password user
    $('.btnResetPassword').on('click', function () {
        const id_reset = $(this).data('resetid');
        const email_reset = $(this).data('email');
        $('#idResetPassword').val(id_reset);
        $('#emailResetPassword').val(email_reset);
    });

    $('.closeResetPassword').on('click', function () {
        $('.idResetPassword').val('') == null;
        $('.resetPassword').val('') == null;
    });

    //validate reset password
    $("#errorResetPassword").hide();
    let resetPasswordError = true;
    $("#btnResetPassword").prop("disabled", true);
    $("#resetPassword").keyup(function () {
        validatePassword();
    });

    function validatePassword() {
        let passwordValue = $("#resetPassword").val();
        if (passwordValue.length == "") {
            $("#errorResetPassword").show();
        } else if (passwordValue.length < 3) {
            $("#errorResetPassword").show();
            $("#errorResetPassword").html("Password harus lebih dari 3 karakter");
        } else {
            $("#btnResetPassword").prop('disabled', false);
            $("#errorResetPassword").hide();
        }
    }

        //validate form update user
    $("#errorName").hide();
    let errorUpdateName = true;
    $("#ubahNama").keyup(function () {
        validateUpdateName();
    });

    function validateUpdateName() {
        let nameValue = $("#ubahNama").val();
        if (nameValue.length == "") {
            $("#errorUbahNama").show();
            $("#btnUpdateUser").prop("disabled", true);
            errorUpdateName = false;
            return false;
        } else if (nameValue.length < 3) {
            $("#btnUpdateUser").prop("disabled", true);
            $("#errorUbahNama").show();
            $("#errorUbahNama").html("Nama harus lebih dari 3 karakter");
            errorUpdateName = false;
            return false;
        } else {
            $("#errorUbahNama").hide();
            $("#btnUpdateUser").prop('disabled', false);
        }
    }
 });

