@extends('layouts.main')

@section('content')
    <div class="flex-center container" style="margin-top: 100px">


        <input type="url" id="resource_url" style="border-color: silver" name="url">

        <p class="is-invalid" style="color: red"></p>

        <button type="submit" id="addResource">Submit</button>

    </div>


@endsection
@section('script')
    <script>
        $("#addResource").click(function () {
            var resource_url = $("#resource_url")
            let url = resource_url.val();

            if (isURL(url)) {
                $.ajax({
                    url: '/api/resources/add',
                    type: "POST",
                    data: {'url': url, "_token": "{{ csrf_token() }}"},
                    success: function (success) {
                        if (success.success == 'true') {
                            $("#message").html("Success");
                            $("#message").show()
                            resource_url.val('')
                        }

                    },
                    error: function (errors) {

                        resource_url.css('border-color', 'red');
                        $(".is-invalid").text(errors.responseJSON.message)
                    }

            })
            } else {
                resource_url.css('border-color', 'red');
                $(".is-invalid").text('Invalid url!')
            }
        })
        $("#resource_url").keyup(function () {
            var url = $(this).val();
            if (isURL(url)) {
                $(this).css('border-color', 'silver');
                $(".is-invalid").text('')
            }else{
                $(this).css('border-color', 'red');
                $(".is-invalid").text('Invalid url!')
            }
        })

        function isURL(s) {
            var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
            return regexp.test(s);
        }
    </script>
@endsection