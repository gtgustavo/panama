<script type="text/javascript">

    $(document).ready(function() {

        $("#country").change(function () {

            var country = $(this).val();

            // Ajax for get Provinces
            $.ajax({

                type: "GET",

                url: "{{ route('ajax_province_country') }}",

                data: {country: country},

                success: function(data)
                {
                    $('#province').fadeIn(1000).html(data);
                }

            });

            var origin_country = $("#origin").val();

            // Ajax for get Road consigning
            $.ajax({

                type: "GET",

                url: "{{ route('ajax_road_consigning') }}",

                data: {country: country, origin: origin_country},

                success: function(data)
                {
                    $("#road").val(data);
                }

            });

        });

    });
</script>