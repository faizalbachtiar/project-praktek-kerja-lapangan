// ------------------------------------- ADMIN ------------------------------------- //

a_p_permohonan();
a_v_permohonan();
p_s_permohonan();
s_p_permohonan();

// Permohonan diproses for OP Kesmas & Superadmin
function a_p_permohonan(query) {
    $.ajax({
        url: "https://localhost/dinkes/permohonan/a_p_search",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#a_p_permohonan_result').html(data);
        }
    });
}

$('#apsearchpermohonan').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        a_p_permohonan(search);
    } else {
        a_p_permohonan();
    }
});

// Permohonan terverifikasi
function a_v_permohonan(query) {
    $.ajax({
        url: "https://localhost/dinkes/permohonan/a_v_search",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#a_v_permohonan_result').html(data);
        }
    });
}

$('#avsearchpermohonan').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        sa_data_permohonan(search);
    } else {
        sa_data_permohonan();
    }
});

// Permohonan untuk penerbitan sertifikat
function p_s_permohonan(query) {
    $.ajax({
        url: "https://localhost/dinkes/permohonan/p_s_search",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#p_s_permohonan_result').html(data);
        }
    });
}

$('#pssearchpermohonan').keyup(function () {
    var search = $(this).val();
    if (search != 's_sl_permohonan') {
        p_s_permohonan(search);
    } else {
        p_s_permohonan();
    }
});

// 

// Permohonan untuk pemohon
s_p_permohonan();

function s_p_permohonan(query) {
    $.ajax({
        url: "https://localhost/dinkes/permohonan/search",
        method: "POST",
        data: {
            query: query
        },
        success: function (data) {
            $('#sp_permohonan_result').html(data);
        }
    })
}
// live search data permohonan
$('#spsearchpermohonan').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        s_p_permohonan(search);
    } else {
        s_p_permohonan();
    }
});