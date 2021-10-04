
@extends('Layout.app')

@section('content')


    <div id="mainDiv" class="container ">
        <div class="row">
            <div class="col-md-12 p-5">
                <button  id="addNewProjectBtnID" class="  btn btn-sm my-3 btn-danger" >Add New </button>
                <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Project Link</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="projectTable">

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




    <!-- Modal -->
    <div
        class="modal fade"
        id="projectModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center p-3 ">
                    <h3 class="mt-5">Do you want to Delete?</h3>
                    <h5 id="projectDeleteID"> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                        No
                    </button>
{{--                    <button data-id=" " id="serviceDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>--}}
                    <button  id="projectDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>

                </div>
            </div>
        </div>
    </div>



    <!-- Add   Modal -->
    <div
        class="modal fade"
        id="projectAddModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center p-3 ">
                    <h3 class="mt-5 mb-4">Add  New Project Data </h3>


                    <div id="projectAddForm" class="w-100 ">
                        <input id="projectNameAddId" type="text" id="" class="form-control mb-4" placeholder="project Name" >
                        <input id="projectDesAddId" type="text" id="" class="form-control mb-4" placeholder="project Description" >
                        <input id="projectLinkAddId" type="text" id="" class="form-control mb-4" placeholder="project Link" >
                        <input id="projectImgAddId" type="text" id="" class="form-control mb-4" placeholder="project Img link" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> Cancel </button>

                    <button  id="projectAddConfirmID" type="button" class="btn btn-sm btn-danger">Add</button>

                </div>
            </div>
        </div>
    </div>





    <!-- Project Update  Modal -->
    <div
        class="modal fade"
        id="projectUpdateModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center p-3 ">
                    <h3 class="mt-5">Update Your Services Data </h3>

                    <h5 id="projectUpdateID"> </h5>

                    <div id="projectUpdateForm" class="w-100 d-none">
                        <input id="projectUpdateNameId" type="text" id="" class="form-control mb-4" placeholder="project Name" >
                    <input id="projectUpdateDesId" type="text" id="" class="form-control mb-4" placeholder="project Description" >
                    <input id="projectUpdateLinkId" type="text" id="" class="form-control mb-4" placeholder="project Link" >
                    <input id="projectUpdateImgId" type="text" id="" class="form-control mb-4" placeholder="project Img link" >
                    </div>

                    <img id="projectUpdateLoader" class="loading-icon m-5" src="{{asset('images/loder.svg')}}">
                    <h1 id="projectUpdateWrong" class="d-none" >Something went wrong</h1>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                     Cancel
                    </button>

                    <button  id="projectUpdateConfirmID" type="button" class="btn btn-sm btn-danger">Update</button>

                </div>
            </div>
        </div>
    </div>






@endsection



@section('script')

    <script type="text/javascript">
        getProjectAllData()






    </script>



@endsection
