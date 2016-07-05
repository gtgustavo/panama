<script type="text/javascript">

    $(document).ready(function() {

        // GET client and consigning
        $('#dni').blur(function() {

            $('#info').html('<img src="/../assets/img/loader.gif" alt="" />').fadeOut(1000);

            var dni = $(this).val();

            // GET name the dni
            $.ajax({

                type: "GET",

                url: "{{ route('ajax_dni_client') }}",

                data: {dni: dni},

                success: function(data) {

                    $('#info').fadeIn(1000).html(data);

                }

            });

            // GET consigning DNI
            $.ajax({

                type: "GET",

                url: "{{ route('ajax_consigning_client') }}",

                data: {dni: dni},

                success: function(data) {

                    $('#consigning').fadeIn(1000).html(data);

                }

            });

        });

        // Calculate cost
        $('#extra_pounds').blur(function() {

            calculate_shipping_cost();
        });

        $("#box").change(function () {

            calculate_shipping_cost();
        });

        $("#shipping_type").change(function () {

            calculate_shipping_cost();
        });

        function calculate_shipping_cost()
        {
            var extra = $('#extra_pounds').val();

            var box = $('#box').val();

            var shipping_type = $('#shipping_type').val();

            if(extra == '')
            {
                extra = 0;
            }

            $.ajax({

                type: "GET",

                url: "{{ route('ajax_cost_shipment') }}",

                data: {box: box, extra: extra, shipping_type: shipping_type},

                success: function(data) {

                    $("#cost").val(data);
                    $("#cost_view").fadeIn(1000).html(data);
                }

            });
        }

    });
</script>