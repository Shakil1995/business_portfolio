@extends('Layout.app')

@section('content')


    <div id="mainDiv" class="container d-none ">
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="course_Table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="loaderDiv" class="container">
        <div class="row">
            <div class="col-md-12 text-center p-5">

                <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}">
            </div>
        </div>
    </div>


    <div id="wrongDiv"  class="container d-none">
        <div class="row">
            <div class="col-md-12 text-center p-5">

                <h1>Something went wrong</h1>
            </div>
        </div>
    </div>
@endsection







@section('script')

    <script type="text/javascript">

        getCourseData();

        function getCourseData() {
axios.get('/getCourseData')
            .then(function (response) {
                if(response.status=200){
                    $('#mainDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');

                    let courseData=response.data;
                    $.each(courseData,function (i,item) {
                        $('<tr>').html(
                            "<td> <img class='table-img' src=" + courseData[i].	courses_img + ">  </td>" +
                            "<th> " + courseData[i].courses_name + "</th> " +
                            "<th> " + courseData[i].courses_des + " </th> " +
                            "<td> <a  ><i class='fas fa-edit'></i></a> </td>>" +
                            "<td> <a   ><i class='fas fa-trash-alt'></i></a> </td>>"



                        ).appendTo('#course_Table');
                    });

                }
                else {
                    $('#loaderDiv').addClass('d-none');
                    $('#wrongDiv').removeClass('d-none');

                }

            })
            .catch(function (error) {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            });

        }



    </script>



@endsection
