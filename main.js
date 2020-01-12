$("#signin").click(function(e) {

    e.preventDefault();

    var formData = new FormData($('form')[0]); // Create an arbitrary FormData instance

    $.ajax({
        type:'POST',
        url:'test.php',
        data:   formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
       
        success:function(data) {
            var message = $("#message");
            if (data == 2) {
                message.css("color", "black");
                message.text('Регистрация прошла успешно!');
                var divForm = $("#logreg-forms");
                divForm.hide();
            }
            if (data == 1) {
                message.css("color", "red");
                message.text('Пользователь с таким email\'ом уже существует, введите другой email');
            }
            if (data == 0) {
                message.css("color", "red");
                message.text('Введенные пароли не совпадают');
            }
        }
    });
});