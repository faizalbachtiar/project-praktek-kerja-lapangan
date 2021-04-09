searchsertifikat();

function searchsertifikat(query) {
    $.ajax({
        url: "https://localhost/dinkes/sertifikat/search",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#sertifikatresult').html(data);
        }
    });
}

$('#searchsertifikat').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        searchsertifikat(search);
    } else {
        searchsertifikat();
    }
});