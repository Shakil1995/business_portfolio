@extends('Layout.app')

@section('content')



    <div id="mainDiv" class="container ">
    <div class="row">
    <div class="col-md-12 p-5">
    <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">NO</th>
          <th class="th-sm">IP</th>
          <th class="th-sm">Date & Time</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($visitorData as $visitorData)
        <tr>
          <td class="th-sm">{{$visitorData->id}}</td>
          <td class="th-sm">{{$visitorData->ip_address}}</td>
          <td class="th-sm">{{$visitorData->visit_time}}</td>
        </tr>
        @endforeach

      </tbody>
    </table>

    </div>
    </div>
    </div>


{{--<div id="loaderDiv" class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12 text-center p-5">--}}

{{--            <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div id="wrongDiv"  class="container d-none">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12 text-center p-5">--}}

{{--            <h1>Something went wrong</h1>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


   @endsection


{{--@section('script')--}}




{{--    <script type="text/javascript">--}}

{{--        // $(document).ready(function() {--}}
{{--        //     $('#VisitorDt').DataTable();--}}
{{--        //     $('.dataTables_length').addClass('bs-select');--}}
{{--        // });--}}

{{--        // getVisitorAllData();--}}











{{--        // function getVisitorAllData() {--}}
{{--        //     axios.get('/getVisitorsData')--}}
{{--        //         .then(function(response) {--}}
{{--        //--}}
{{--        //             if (response.status=200){--}}
{{--        //                 $('#mainDiv').removeClass('d-none');--}}
{{--        //                 $('#loaderDiv').addClass('d-none');--}}
{{--        //                 var jsonVisitorData = response.data;--}}
{{--        //                 $.each(jsonVisitorData, function(i, item) {--}}
{{--        //                     $('<tr>').html(--}}
{{--        //--}}
{{--        //                         "<td> " + jsonVisitorData[i].id + "</td> " +--}}
{{--        //                         "<td> " + jsonVisitorData[i].ip_address + " </td> " +--}}
{{--        //                         "<td> " + jsonVisitorData[i].visit_time + " </td> "--}}
{{--        //--}}
{{--        //                     ).appendTo('#visitorTable');--}}
{{--        //                 });--}}
{{--        //             }else {--}}
{{--        //                 $('#loaderDiv').addClass('d-none');--}}
{{--        //                 $('#wrongDiv').removeClass('d-none');--}}
{{--        //             }--}}
{{--        //--}}
{{--        //--}}
{{--        //         }).catch(function (error) {--}}
{{--        //         $('#loaderDiv').addClass('d-none');--}}
{{--        //         $('#wrongDiv').removeClass('d-none');--}}
{{--        //     });--}}
{{--        // }--}}





{{--    </script>--}}



{{--@endsection--}}
