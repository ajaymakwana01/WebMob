$(document).ready(function () {
    function processForm( e ){
        e.preventDefault();
        $.ajax({
            url: '/blog',
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function( data, textStatus, jQxhr ){
                data = JSON.parse(data);
                if(data.succes == false) {
                    alert(data.message);
                } else {
                    $('#exampleModal').modal('hide');
                    $('#blog-form').trigger('reset');
                    alert(data.message);
                    location.reload();
                }
                $('#response pre').html( data );
            },
        });
    }

    $('#blog-form').submit( processForm );
})
