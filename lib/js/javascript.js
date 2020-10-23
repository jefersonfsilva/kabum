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
            $('.returnCad').append('Dados inseridos com sucesso!');
            window.location.href = getRoot()+"areaRestrita";
        },
        error: function (response) {
            $('.returnCad').empty();
            $('.returnCad').append('Ocorreu um erro:'+response);
            window.location.href = getRoot();
        }
    });
});

$("#formClient").on("submit", function(event){
    event.preventDefault();
    var vData = $(this).serialize();

    $.ajax({
        url: getRoot()+'controllers/controllerClient',
        type: 'post',
        dataType: 'json',
        data: vData,
        success: function (response) {
            $('.returnCad').empty();
            $('.returnCad').append('Dados inseridos com sucesso!');
            window.location.href = getRoot()+"areaRestrita";
        },
        error: function (response) {
            $('.returnCad').empty();
            $('.returnCad').append('Ocorreu um erro:'+response);
        }
    });
});