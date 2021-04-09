s_p_jadwal();
s_u_jadwal();

// search for pengguna
function s_p_jadwal(query) {
    $.ajax({
        url: "https://localhost/dinkes/jadwal/fetchdata",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#resultjadwal').html(data);
        }
    });
}

$('#resultjadwal').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        s_p_jadwal(search);
    } else {
        s_p_jadwal();
    }
});

// search for user
function s_u_jadwal(query) {
    $.ajax({
        url: "https://localhost/dinkes/jadwal/s_u_jadwal",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#s_u_jadwal').html(data);
        }
    });
}

$('#u_resultjadwal').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        s_u_jadwal(search);
    } else {
        s_u_jadwal();
    }
});