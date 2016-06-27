<script type="text/javascript">

    $(document).ready(function() {

        $('#dni').blur(function() {

            $('#info').html('<img src="/../assets/img/loader.gif" alt="" />').fadeOut(1000);

            var dni = $(this).val();

            $.ajax({

                type: "GET",

                url: "{{ route('ajax_dni_client') }}",

                data: {dni: dni},

                success: function(data) {

                    $('#info').fadeIn(1000).html(data);

                }

            });

            $.ajax({

                type: "GET",

                url: "{{ route('ajax_consigning_client') }}",

                data: {dni: dni},

                success: function(data) {

                    $('#consigning').fadeIn(1000).html(data);

                }

            });

        });

    });
</script>