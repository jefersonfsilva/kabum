//root back
function getRoot()
{
    var root = "http://" + document.location.hostname + "/kabum/";
    return root;
}

//ajax to form
$("#formRegister").on("submit", function(event){
    event.preventDefault();
    var vData = $(this).serialize();

    $.ajax({
        url: getRoot()+'controllers/controllerRegister',
        type: 'post',
        dataType: 'json',
        data: vData,
        success: function (response) {
            $('.returnCad').empty();

            if (response.return == 'err') {
                $.each(response.errs, function(key, value){
                    $('.returnCad').append(value+'<br>');
                });
            } else {
                $('.returnCad').append('Dados inseridos com sucesso!');
            }
        }
    });
});