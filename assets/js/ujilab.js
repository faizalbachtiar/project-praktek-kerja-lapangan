searchujilab();

function searchujilab(query) {
    $.ajax({
        url: "https://localhost/dinkes/ujilab/search",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#ujilabresult').html(data);
        }
    });
}

$('#searchhasiluji').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        searchujilab(search);
    } else {
        searchujilab();
    }
});