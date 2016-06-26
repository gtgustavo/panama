<script>

    $(document).ready(function(){

        // activate this event by clicking on the button with status id
        $('.btn-status').click(function(){

            // call submission form
            var form = $('#form-status');

            // shipping arm the url tribute to the action form
            var url = form.attr('action');

            // get all the form elements that will be sent
            var data = form.serialize();

            // call the combo selection of status
            var status = $('#change_status').val();

            // validate that you have selected an option to change status
            if(status == '')
            {
                alert('{!! trans('messages.confirm.select_status') !!}');

            } else {

                // get all the checkboxes on the form and store them in an array
                var checkboxValues = new Array();
                // we travel all the checkbox selected .each
                $('input[name="package_id[]"]:checked').each(function() {
                    //$(this).val() is the value of the corresponding checkbox
                    checkboxValues.push($(this).val());
                });

                // validate that you have selected at least one checkbox
                if(checkboxValues == '')
                {
                    alert('{!! trans('messages.confirm.select_package') !!}');

                } else {

                    // confirm change of status of packages
                    var resp = window.confirm('{!! trans('messages.confirm.change_status') !!}');

                    if (resp)
                    {
                        // send data by post jquery
                        $.post(url, data, function(result)
                        {
                            alert(result);

                            location.reload();

                        }).fail(function()
                        {
                            // server error
                            alert('{!! trans('messages.confirm.error_change_status') !!}');
                        });
                    }
                }
            }

        });

    });

</script>