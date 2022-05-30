$(function(){
    // DELETE MODAL
    var form;

    $(document).on("click", ".delete-button", function(){
        $('.delete-name').text($(this).data('entity'));
        form = $(this).parent();

        $('.modal-delete').modal();
    });

    $(document).on("click", "#delete-confirm", function(){
        form.submit();
    });

    $('.price-input').keyup(function(){
        var text = $(this).val();
        var new_text = text.replace(',', '.');

        $(this).val(new_text);
    });

    $('.select2-selection--multiple').select2();
    $('.datepicker').datepicker({
        startDate: '-3y',
        format: 'dd-mm-yyyy'
    });
});


function disableLastName() {
    let checkboxStatus = $('#last_name_check').is(':checked')
    $('#last_name').prop('readonly', !checkboxStatus);
    $('#first_name').prop('readonly', !checkboxStatus);

}

function fillUserName() {
    let lastName = $('#last_name').val();

    if (lastName === "") {
        $('#username').val("");
        return;
    }

    console.log($('#last_name').data('url'),)

    let data = {
      last_name :   lastName,
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        url: $('#last_name').data('url'),
        data: data,
        success:function(data) {
            $('#username').val(data.username);
        },
        error:function(data) {
            console.log(data);
        }
    });
}


function goPrev() {
    window.history.back();
}




