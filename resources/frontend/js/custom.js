$(function(){
    $('.newsletterForm, #frmCommentary, #frmContact').submit(function(e){
        e.preventDefault();
        const form = $(this);

        $.ajax({
            url: $(this).prop('action'),
            method: $(this).prop('method'),
            data: $(this).serializeArray(),
            dataType: "json"
        }).success(function(json){
            $('#subsModal .close').trigger("click");
            alert(json.msg)
            form[0].reset()
        }).error(function(a, b, c){
            const data = a.responseJSON;
            const msg = data.errors;

            if(msg.email[0] == "validation.unique"){
                alert('Este e-mail já existe em nossa base de dados')
            }
        });
    });
})