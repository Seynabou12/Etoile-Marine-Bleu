$(function() {
    $("#password").on('change keyup', function(e) {
        var sanitizePassword = $(this).val().trim();
        isUpper($(this).val())
        $(this).val(sanitizePassword);
        isNumber(sanitizePassword);
        isLower(sanitizePassword);
        let tested = isTestedRegex(sanitizePassword);
        if (tested) {
            isValidStatus("password");
            isValidCritere("char");
        } else {
            isInValidStatus("password");
            isInValidCritere("char");

        }
        isConfirmed();
    });

    $("#password-confirm").on('change keyup', function(e) {
        isConfirmed();
    });

    function isUpper(str) {
        for (var i = 0; i < str.length; i++) {
            if (str.charAt(i) == str.charAt(i).toUpperCase() && str.charAt(i).match(/[A-Z]/i)) {
                isValidCritere("maj");

                return true;
            }
        }
        isInValidCritere("maj");

        return false;
    }

    function isLower(str) {

        if (str.toUpperCase() != str) {
            isValidCritere("min");
            return true
        }
        isInValidCritere("min");

        return false;

    }

    function isNumber(character) {
        var hasNumber = /\d/;

        if (hasNumber.test(character)) {
            isValidCritere("number");

            return true
        }
        isInValidCritere("number");

        return false;

    }

    function isValidStatus(ref) {
        if ($('#' + ref).hasClass('is-invalid')) $('#' + ref).removeClass('is-invalid');

        if (!$('#' + ref).hasClass('is-valid')) {
            $('#' + ref).addClass('is-valid');
        }
    }

    function isInValidStatus(ref) {
        if ($('#' + ref).hasClass('is-valid')) $('#' + ref).removeClass('is-valid');

        if (!$('#' + ref).hasClass('is-invalid')) {
            $('#' + ref).addClass('is-invalid');
        }
    }

    function isInValidCritere(ref) {
        if ($('#' + ref).hasClass('text-success')) $('#' + ref).removeClass('text-success');

        if (!$('#' + ref).hasClass('text-danger')) {
            $('#' + ref).addClass('text-danger');
        }
    }

    function isValidCritere(ref) {
        if ($('#' + ref).hasClass('text-danger')) $('#' + ref).removeClass('text-danger');

        if (!$('#' + ref).hasClass('text-success')) {
            $('#' + ref).addClass('text-success');
        }
    }

    function isConfirmed() {
        var confirmed = $('#password-confirm').val();
        var password = $('#password').val();

        //Btn
        formIsValid();

        if (!confirmed || confirmed.trim() == '') {
            return false;
        }
        if (confirmed === password && isTestedRegex(confirmed)) {
            isValidStatus("password-confirm");
            isValidStatus("char");
        } else {
            isInValidStatus("password-confirm");
        }
    }

    //Bouton reset Page
    function formIsValid() {
        var confirmed = $('#password-confirm').val();
        var password = $('#password').val();
        if ($('#reset-btn').html()) {
            if (confirmed === password && isTestedRegex(confirmed)) {
                $('#reset-btn').prop("disabled", false);
            } else {
                $('#reset-btn').prop("disabled", true);
            }
        }
    }

    function isTestedRegex(password) {
        return /^(?=.*\d)(?=.*[a-z])(?=.*[@#$%^&+=_!?,;-])(?=.*[A-Z])[0-9a-zA-Z!@#\$%\^\&*\)\(@#$%^&+=_!?,;-]{8,}$/.test(password);
        // return /^(.){8,}/.test(password);
    }
});