$('#add').submit(function(){
    event.preventDefault();
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'add.php',
        type:'post',
        data: serijalizacija
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("New course is added.");
            location.reload(true);
        }else console.log("Kurs nije dodat "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Error> '+textStatus, errorThrown)
    });
});

$('#delete').click(function(){

    const checked = $('input[name=checked-donut]:checked');

    req = $.ajax({
        url: 'delete.php',
        type:'post',
        data: {'id':checked.val()}
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
           checked.closest('tr').remove();
           alert('Course is deleted.');
           console.log('Deleted');
        }else {
        console.log("Not deleted "+res);
        alert("Course is not deleted");

        }
        console.log(res);
    });

});

// dugme koje je na glavnoj formi i otvara dijalog za izmenu
$('#izmeni').click(function () {
    const checked = $('input[name=checked-donut]:checked');
    //pristupa informacijama te konkretne forme i popunjava dijalog
    request = $.ajax({
        url: 'get.php',
        type: 'post',
        dataType : "json",
        data: {'id': checked.val()}
        
    });


    request.done(function (response, textStatus, jqXHR) {
        console.log('Popunjena');
        $('#course').val(response[0]['kurs']);
        console.log(response[0]['kurs']);

        $('#teacher').val(response[0]['profesor'].trim());
        console.log(response[0]['profesor'].trim());

        $('#price').val(response[0]['cena'].trim());
        console.log(response[0]['cena'].trim());

        $('#id').val(checked.val().trim());

        console.log(response);
    });

   request.fail(function (jqXHR, textStatus, errorThrown) {
       console.error('The following error occurred: ' + textStatus, errorThrown);
   });

   
});
$('#update').submit(function () {
    event.preventDefault();
    //serijalizacija
    console.log("Izmene");
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serializedData = $form.serialize();
    console.log(serializedData);
    $inputs.prop('disabled', true);

    // kreirati request za UPDATE handler
    request = $.ajax({
        url: 'update.php',
        type: 'post',
        data: serializedData
      
    });

    request.done(function (response, textStatus, jqXHR) {


        if (response == "Success") {
            console.log('Kurs je izmenjen');
            location.reload(true);
            $('#update').reset;
        }
        else console.log('Kurs nije izmenjen ' + response);
        console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });


    $('#update').modal('hide');
});
