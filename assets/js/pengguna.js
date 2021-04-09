searchpengguna();

function searchpengguna(query) {
    $.ajax({
        url: "<?php echo base_url(); ?>Users/fetchdata",
        method: "POST",
        data: {
            query: query
        },
        success: function(data) {
            $('#resultpengguna').html(data);
        }
    });
}

$('#searchpengguna').keyup(function() {
    var search = $(this).val();
    if (search != '') {
        searchpengguna(search);
    } else {
        searchpengguna();
    }
});