<div id="main">
    <?php foreach ($permohonan as $row) : ?>
        <div class="card col-md-12 shadow md-5 p-3">
            <div class="card-body">
                <div class="mb-30">
                    <!-- <a class="btn btn-primary p-3 mb-30 add_calendar" href="#">Tambah Jadwal Visitasi</a> -->
                    <div id='calendar'></div>
                </div>
                <hr>
                <div class="mb-30">
                    <h3 class="card-title mb-30">
                        <?php echo $row['nama_usaha']; ?>
                    </h3>
                    <div class="row">
                        <!-- data pemohon -->
                        <h5 class="col-md-4">Pemohon</h5>
                        <p class="col-md-8"><?php echo $row['nama']; ?></p>
                        <!-- data usaha -->
                        <h5 class="col-md-4">Alamat usaha</h5>
                        <p class="col-md-8"><?php echo $row['alamat_usaha']; ?></p>
                    </div>
                    <h4 class="title_color">Data Tanggal Visitasi</h4>
                    <form method="post" id="insert_data">
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <div class="mt-10">
                                <input type="text" name="kecamatan" id="kecamatan" readonly placeholder="<?php echo $row['nama_kecamatan']; ?>" class="form-control action">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="puskesmas">Puskesmas</label>
                            <div class="mt-10">
                                <select name="puskesmas" id="puskesmas">
                                    <option value="">Select Puskesmas</option>
                                    <?php foreach ($puskesmas as $data) : ?>
                                        <option value='<?php echo $data->id_puskesmas; ?>'>
                                            <?php echo $data->nama_puskesmas; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <br />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="anggota">Anggota Visitasi</label>
                            <div class="mt-10">
                                <select name="anggota" id="anggota" multiple class="form-control">
                                </select>
                                <br />
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="tgl_visitasi">Tanggal Visitasi</label>
                            <div class="mt-10">
                                <input type="date" name="tgl_visitasi" id="tgl_visitasi" required class="form-control action">
                            </div>
                        </div>
                        <input type="hidden" name="id_permohonan" id="id_permohonan" value="<?php echo $row['id_permohonan']; ?>">
                        <input type="hidden" name="hidden_anggota" id="hidden_anggota" />
                        <input type="submit" name="simpan" id="action" class="btn btn-info" value="simpan" />
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<!-- <script>
    jQuery('#anggota').lwMultiSelect();
</script> -->

<script type="text/javascript">
    var main_url = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        // define(['moment', 'moment/locale/idn'], function(moment) {
        //     moment.locale('idn');
        //     console.log(moment().format('LLLL'));
        // });
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            // define(['moment', 'moment/locale/idn'], function(moment) {
            //     moment.locale('idn');
            //     console.log(moment().format('LLLL'));
            //     calendar = new Fu
            //     defaultDate: moment().format('YYYY-MM-DD'),
            // });

            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selecthelper: true,
            select: function(start, end, allDay) {
                $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                $('#create_modal').modal('show');
                save();
                $('#calendar').fullCalendar('unselect');
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                editDropResize(event);
            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
                editDropResize(event);
            },
            // eventClick: function(event, element) {
            //     deteil(event);
            //     editData(event);
            //     deleteData(event);
            // },
            // events: JSON.parse(get_data)
            plugins: ['interaction', 'dayGrid'],
        });

        $('#anggota').lwMultiSelect();

        $('#puskesmas').change(function() {
            if ($(this).val() != '') {
                var action = $(this).attr("id");
                var query = $(this).val();
                var result = '';

                if (action == 'puskesmas') {
                    result = 'anggota';
                }
                $.ajax({
                    url: "<?php echo base_url(); ?>Jadwal/buat_jadwal",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                        if (result == 'anggota') {
                            $('#anggota').data('plugin_lwMultiSelect').updateList();
                        }
                    }
                })
            }
            // else if (empty($(this).val())) {
            //     $('#anggota').data('plugin_lwMultiSelect').removeAll();
            // }
        });

        //proses insert function 
        $('#insert_data').on('submit', function(event) {
            var anggota = $('#anggota').val();
            event.preventDefault();
            if ($('#puskesmas').val() == '') {
                alert("Please Select puskesmas");
                return false;
            } else if (!anggota) {
                alert("Please Select anggota");
                return false;
            } else {
                $('#hidden_anggota').val($('#anggota').val());
                var form_data = $(this).serialize();
                $.ajax({
                    //untuk insert data
                    url: "<?php echo base_url(); ?>Jadwal/simpan",

                    method: "POST",
                    data: form_data,
                    success: function(data) {
                        //$('#action').attr("disabled", "disabled");
                        console.log("proses");
                        // if(data == 'done') {
                        //     $('#anggota').html('');
                        //     $('#anggota').data('plugin_lwMultiSelect').updateList();
                        //     $('#anggota').data('plugin_lwMultiSelect').removeAll();
                        //     $('#insert_data')[0].reset();
                        //     alert('Data Inserted');
                        //      }
                        window.location.href = 'https://localhost/dinkes/jadwal';

                    }
                });
            }
        });

        // $(document).on('click', '.add_calendar', function() {
        //     $('#create_modal input[name=calendar_id]').val(0);
        //     $('#create_modal').modal('show');
        // });

        // $(document).on('submit', '#form_create', function() {
        //     var element = $(this);
        //     var eventData;
        //     $.ajax({
        //         url: main_url + 'jadwal/save',
        //         type: element.attr('method'),
        //         data: element.serialize(),
        //         dataType: 'JSON',
        //         beforeSend: function() {
        //             element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
        //         },
        //         success: function(data) {
        //             if (data.status) {
        //                 eventData = {
        //                     id: data.id,
        //                     title: $('#create_modal input[name=title]').val(),
        //                     description: $('#create_modal textarea[name=description]').val(),
        //                     start: moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
        //                     end: moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
        //                     color: $('#create_modal select[name=color]').val()
        //                 };
        //                 $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
        //                 $('#create_modal').modal('hide');
        //                 element[0].reset();
        //                 $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
        //             } else {
        //                 element.find('.alert').css('display', 'block');
        //                 element.find('.alert').html(data.notif);
        //             }
        //             element.find('button[type=submit]').html('Submit');
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             element.find('button[type=submit]').html('Submit');
        //             element.find('.alert').css('display', 'block');
        //             element.find('.alert').html('Wrong server, please save again');
        //         }
        //     });
        //     return false;
        // });

        // function editDropResize(event) {
        //     start = event.start.format('YYYY-MM-DD HH:mm:ss');
        //     if (event.end) {
        //         end = event.end.format('YYYY-MM-DD HH:mm:ss');
        //     } else {
        //         end = start;
        //     }

        //     $.ajax({
        //         url: backend_url + 'jadwal/save',
        //         type: 'POST',
        //         data: 'calendar_id=' + event.id + '&title=' + event.title + '&start_date=' + start + '&end_date=' + end,
        //         dataType: 'JSON',
        //         beforeSend: function() {},
        //         success: function(data) {
        //             if (data.status) {
        //                 $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
        //             } else {
        //                 $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
        //             }

        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
        //         }
        //     });
        // }

        // function save() {
        //     $('#form_create').submit(function() {
        //         var element = $(this);
        //         var eventData;
        //         $.ajax({
        //             url: backend_url + 'calendar/save',
        //             type: element.attr('method'),
        //             data: element.serialize(),
        //             dataType: 'JSON',
        //             beforeSend: function() {
        //                 element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
        //             },
        //             success: function(data) {
        //                 if (data.status) {
        //                     eventData = {
        //                         id: data.id,
        //                         title: $('#create_modal input[name=title]').val(),
        //                         description: $('#create_modal textarea[name=description]').val(),
        //                         start: moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
        //                         end: moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
        //                         color: $('#create_modal select[name=color]').val()
        //                     };
        //                     $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
        //                     $('#create_modal').modal('hide');
        //                     element[0].reset();
        //                     $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
        //                 } else {
        //                     element.find('.alert').css('display', 'block');
        //                     element.find('.alert').html(data.notif);
        //                 }
        //                 element.find('button[type=submit]').html('Submit');
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 element.find('button[type=submit]').html('Submit');
        //                 element.find('.alert').css('display', 'block');
        //                 element.find('.alert').html('Wrong server, please save again');
        //             }
        //         });
        //         return false;
        //     })
        // }

        // function deteil(event) {
        //     $('#create_modal input[name=calendar_id]').val(event.id);
        //     $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
        //     $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
        //     $('#create_modal input[name=title]').val(event.title);
        //     $('#create_modal input[name=description]').val(event.description);
        //     $('#create_modal select[name=color]').val(event.color);
        //     $('#create_modal .delete_calendar').show();
        //     $('#create_modal').modal('show');
        // }

        // function editData(event) {
        //     $('#form_create').submit(function() {
        //         var element = $(this);
        //         var eventData;
        //         $.ajax({
        //             url: backend_url + 'calendar/save',
        //             type: element.attr('method'),
        //             data: element.serialize(),
        //             dataType: 'JSON',
        //             beforeSend: function() {
        //                 element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
        //             },
        //             success: function(data) {
        //                 if (data.status) {
        //                     event.title = $('#create_modal input[name=title]').val();
        //                     event.description = $('#create_modal textarea[name=description]').val();
        //                     event.start = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
        //                     event.end = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
        //                     event.color = $('#create_modal select[name=color]').val();
        //                     $('#calendarIO').fullCalendar('updateEvent', event);

        //                     $('#create_modal').modal('hide');
        //                     element[0].reset();
        //                     $('#create_modal input[name=calendar_id]').val(0)
        //                     $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
        //                 } else {
        //                     element.find('.alert').css('display', 'block');
        //                     element.find('.alert').html(data.notif);
        //                 }
        //                 element.find('button[type=submit]').html('Submit');
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 element.find('button[type=submit]').html('Submit');
        //                 element.find('.alert').css('display', 'block');
        //                 element.find('.alert').html('Wrong server, please save again');
        //             }
        //         });
        //         return false;
        //     })
        // }

        // function deleteData(event) {
        //     $('#create_modal .delete_calendar').click(function() {
        //         $.ajax({
        //             url: backend_url + 'calendar/delete',
        //             type: 'POST',
        //             data: 'id=' + event.id,
        //             dataType: 'JSON',
        //             beforeSend: function() {},
        //             success: function(data) {
        //                 if (data.status) {
        //                     $('#calendarIO').fullCalendar('removeEvents', event._id);
        //                     $('#create_modal').modal('hide');
        //                     $('#form_create')[0].reset();
        //                     $('#create_modal input[name=calendar_id]').val(0)
        //                     $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
        //                 } else {
        //                     $('#form_create').find('.alert').css('display', 'block');
        //                     $('#form_create').find('.alert').html(data.notif);
        //                 }
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 $('#form_create').find('.alert').css('display', 'block');
        //                 $('#form_create').find('.alert').html('Wrong server, please save again');
        //             }
        //         });
        //     })
        // }

        calendar.render();
    });
</script>
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
</style>