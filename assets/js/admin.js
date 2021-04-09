searchadmin();

function searchadmin(query) {
    $.ajax({
        url: "<?php echo base_url(); ?>Admin/search",
        method: "POST",
        data: {
            query: query
        },
        success: function(data) {
            $('#resultadmin').html(data);
        }
    });
}

$('#searchadmin').keyup(function() {
    var search = $(this).val();
    if (search != '') {
        searchadmin(search);
    } else {
        searchadmin();
    }
});