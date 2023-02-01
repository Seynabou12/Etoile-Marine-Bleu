$(function() {

    $('body').on('click', '.editModal', function() {
        $('#form').attr('action', $(this).attr('href'));
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#description').val($(this).data('description'));
    });
    $('body').on('click', '.showModal', function() {
        $('#form').attr('action', $(this).attr('href'));
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $( "#nombre" ).empty().append( $(this).data('nombre'));
        $('#departement').empty().append($(this).data('departement'));
        // $("#departement").append("test");
        console.log($(this).data('departement'))
    });

});

function enableDisableInput() {
    var x = document.getElementById("password");
    alert('ok')
    if (x.disabled === false) {
        x.disabled = true;
        // x.type = "text";
        console.log(x);
        document.getElementById("password-confirm").disabled = true;
    } else {
        x.disabled = false;
        // x.type = "password";
        document.getElementById("password-confirm").disabled = false;
    }
}
