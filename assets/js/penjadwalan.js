$('#anggota').lwMultiSelect();

$(document).ready(function () {
    $('#calendar').datepicker();
});

// dont fucking touch it! it works.
// $('#puskesmas').change(function () {
//     var id_puskesmas = $('#puskesmas').val();
//     console.log(id_puskesmas);
//     if (id_puskesmas != '') {
//         $.ajax({
//             url: "https://localhost/dinkes/permohonan/fetchvisitasi",
//             method: "POST",
//             data: {
//                 id_puskesmas: id_puskesmas
//             },
//             success: function (data) {
//                 $('#anggotavisitasi').html(data);
//             }
//         });
//     } else {
//         // $('#puskesmas').html('<option value="">Pilih Puskesmas</option>');
//     }
// });

// don't fucking touch it, it already works
$('#puskesmas').change(function () {
    var id_puskesmas = $('#puskesmas').val();
    console.log(id_puskesmas);
    if (id_puskesmas != '') {
        $.ajax({
            url: "https://localhost/dinkes/permohonan/fetchvisitasi",
            method: "POST",
            data: {
                id_puskesmas: id_puskesmas
            },
            success: function (data) {
                $('#anggota').html(data);
            }
        });
        // $.ajax({
        //     url: "https://localhost/dinkes/permohonan/fetchvisitasi",
        //     method: "POST",
        //     data: {
        //         id_puskesmas: id_puskesmas
        //     },
        //     success: function (data) {
        //         $('#anggota').html(data);
        //         // console.log(data);
        //         // $('#anggota').updateList();
        //     }
        // });
    } else {
        $('#anggota').html('<option value="">Pilih Anggota</option>');
    }
});

// 
$('#insert_data').on('submit', function (event) {
    event.preventDefault();
    if ($('#kecamatan').val() == '') {
        alert("Pilih kecamatan lokasi usaha");
        return false;
    } else if ($('#puskesmas').val() == '') {
        alert("Pilih puskesmas tim visitasi");
        return false;
    } else if ($('#anggota')) {
        alert("Pilih anggota tim visitasi");
        return false;
    } else {
        $('#hidden_anggota').val($('#anggota').val());
        $('#puskesmas').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
            url: "https://localhost/dinkes/permohonan/penjadwalan",
            method: "POST",
            data: form_data,
            success: function (data) {
                if (data == 'done') {
                    $('#anggota').html();
                    $('#anggota').data('plugin_lwMultiSelect').updateList();
                    $('#anggota').data('plugin_lwMultiSelect').removeAll();
                    $('#insert_data')[0].reset();
                    alert('Data Inserted');
                }
            }
        });
    }
});