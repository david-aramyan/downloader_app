@extends('layouts.main')

@section('content')
    <div class="flex-center container" style="margin-top: 100px">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Url</th>
                <th scope="col">Status</th>

            </tr>
            </thead>
            <tbody id="resources">

            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $.ajax({
            url: '{{route('resources.listing')}}',
            type: "GET",

            success: function (data) {
                if (data.success == 'true') {
                   if(data.data.length){

                       $.each(data.data,function (index,value) {
                           var str = value.url;
                           if(value.status.name == "Complete"){
                               var str ='<a href = "{{ asset("storage/") }}/'+value.name+'" download>'+value.url+'</a>'
                           }
                           $("#resources").prepend('<tr>' +
                               '<td>'+ value.id +'</td>' +
                               '<td>'+ str +'</td>' +
                               '<td>'+ value.status.name +'</td>' +
                               '</tr>')
                       })

                   }else{
                       $("#resources").prepend('No matching records found')
                   }
                }

            },
            error: function (errors) {
                $("#resources").prepend('Something wrong!')

            }

        })
    </script>
@endsection

