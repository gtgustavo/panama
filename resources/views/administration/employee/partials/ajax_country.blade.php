<script type="text/javascript">

    $(document).ready(function() {

        $("#country").change(function () {

            var country = $(this).val();

            $.ajax({

                type: "GET",

                url: "{{ route('ajax_province_country') }}",

                data: {country: country},

                success: function(data)
                {
                    $('#province').fadeIn(1000).html(data);
                }

            });

        });

    });
</script>