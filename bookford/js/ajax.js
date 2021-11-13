$(document).ready(function(){
    $('button.otpravka').on('click', function() {
        let name_avtor = $('input.name_avtor').val();
        let strana = $('input.strana').val();
        let img_avtors = $('input.img_avtors').val();
        let name_works = $('input.name_works').val();
        let year = $('input.year').val();
        let janr = $('input.janr').val();
        let img_works = $('input.img_works').val();
        let comm_works = $('textarea.comm_works').val();

        $.ajax ({
            method: "POST",
            url: "avtor/bd_bookford/insert.php",
            data: {
                name_avtor: name_avtor,
                strana: strana,
                img_avtors: img_avtors,
                name_works: name_works,
                year: year,
                janr: janr,
                img_works: img_works,
                comm_works: comm_works
            }
        })
            .done(function(){});
        $('input.name_avtor').val('');
        $('input.data_birthday').val('');
        $('input.strana').val('');
        $('input.img_avtors').val('');
        $('input.name_works').val('');
        $('input.data_works').val('');
        $('input.janr').val('');
        $('input.img_works').val('');
        $('textarea.comm_works').val('');
    })
})

/*$("#img_avtors").change(function() {
    let formData = new FormData();
    $.each($("#img_avtors")[0].files,function(key, input){
        formData.append('file[]', input);
    });
    $.ajax({
        type: "POST",
        url: '../avtor/bd_bookford/insert.php',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        dataType : 'json'
    });
});

$("#img_works").change(function() {
    let formData1 = new FormData();
    $.each($("#img_works")[0].files,function(key, input){
        formData1.append('file[]', input);
    });
    $.ajax({
        type: "POST",
        url: '../avtor/bd_bookford/insert.php',
        cache: false,
        contentType: false,
        processData: false,
        data: formData1,
        dataType : 'json'
    });
});*/
