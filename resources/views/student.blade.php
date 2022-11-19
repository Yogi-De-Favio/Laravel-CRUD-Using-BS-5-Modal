<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>STUDENT MODAL</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--DATA TABLE CDN-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--fontawsomicon page link-->
    <script src="https://kit.fontawesome.com/fd253c14d3.js" crossorigin="anonymous"></script>
</head>

<body>

<!--NAVBAR START-->
    <header class="container-fluid fixed-top">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
            <a class="navbar-brand" style="color: rgb(255, 95, 95)" href="/"><i class="bi bi-book me-2" style="font-size: 30px;"></i>SCHOOL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navbar-brand btn btn-light" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand btn btn-light active" href="#">Sudent-List</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="navbar-brand dropdown-toggle btn btn-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Course</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">HTML</a></li>
                    <li><a class="dropdown-item" href="#">CSS</a></li>
                    <li><a class="dropdown-item" href="#">JS</a></li>
                    <li><a class="dropdown-item" href="#">PHP</a></li>
                    <li><a class="dropdown-item" href="#">LARAVEL</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand btn btn-light" href="">About</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <br><br><br><br>
<!--NAVBAR END-->

<!--ADD MODAL START-->

    <section class="container mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" style="float: right;"><i class="bi bi-person-plus me-2"></i>ADD STUDENT</button>


        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModal" style="margin-left: 35%">ADD-STUDENT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <form class="form" action="{{url('/student/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">NAME</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="" value="{{ old('name')}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter EMAIL" required="" value="{{ old('email')}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">CONTACT</label>
                                    <input type="number" class="form-control" name="contact" placeholder="Enter CONTACT" required="" value="{{ old('contact')}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="grade">GRADE</label><br>
                                    <input class="form-check-input" type="radio" name="grade" id="Pass" value="Pass" onclick="Pass1();" />Pass
                                    <input class="form-check-input" type="radio" name="grade" id="Fail" value="Fail" onclick="Fail1();" />Fail

                                    <div id="formContent" class="hide mt-3" style="display: none;">
                                        <label>MARKS</label><br>
                                        <hr>
                                        <label class="form-label">ENGLIHS</label>
                                        <input type="text" class="form-control" id="engM" name="engM" placeholder="Enter English Mark" maxlength="2">
                                        <label class="form-label">TAMIL</label>
                                        <input type="text" class="form-control" id="tamM" name="tamM" placeholder="Enter Tamil Mark" maxlength="2">
                                        <label class="form-label">MATHS</label>
                                        <input type="text" class="form-control" id="matM" name="matM" placeholder="Enter Maths Mark" maxlength="2">
                                        <hr>
                                    </div>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="" class="form-label">IMAGE</label>
                                    <input type="file" class="form-control" name="image" placeholder="image">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Student</button>
                            </div>
                        </form>


                </div>
            </div>
        </div>
    </section>

<!--ADD MODAL END-->

<!--Search box Start-->
    <div class="container mb-4">
        <div class="search w-50" style="display: flex;">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" class="form-control">
        </div>
    </div>
<!--Search box End-->

<!--TABLE START-->
    <section class="container mt-5s">

        <table class=" table table-hover" id="datatables">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">PROFILE</th>
                <th class="text-center">NAME</th>
                <th class="text-center">E-MAIL</th>
                <th class="text-center">CONTACT</th>
                <th class="text-center">GRADE</th>
                <th class="text-center">MARKS</th>
                <th class="text-center">ACTION</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ( $stu as $studata )

                <tr>
                    <input type="hidden" class="deleteValue" value="{{ $studata->id }}">

                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-center"><img class="" src="/images/{{ $studata->image }}" width="50px" height="50px" style="border-radius: 50%"></td>
                    <td class="text-center">{{ $studata->name }}</td>
                    <td class="text-center">{{ $studata->email }}</td>
                    <td class="text-center">{{ $studata->contact }}</td>
                    <td class="text-center">{{ $studata->grade }}</td>
                    <td class="text-center">ENGLISH : {{ $studata->engM}} <br>
                        TAMIL   : {{ $studata->tamM}} <br>
                        MATHS   :{{$studata->matM}}
                    </td>

                    <td class="text-center">
                        <a class=" show" onclick="student_show({{$studata->id}})"href="#" data-bs-toggle="modal" data-bs-target="#showModal"><i class="bi bi-person-lines-fill btn btn-outline-secondary"></i></a>

                        <a class="btn btn-outline-primary edit" onclick="student_edit({{$studata->id}})"href="#" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-user-pen"></i></a>

                        <button type="button" class="btn btn-outline-danger deleteButton "><i class="fa-solid fa-user-xmark"></i></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
<!--TABLE END-->

<!--SHOW MODAL START-->

    <section class="container">
        <!-- Modal -->
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="showModal" style="margin-left: 35%">SHOW-STUDENT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <form class="form" style="justify-content: center;" id="" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="stu_id1" id="stu_id1" value="">
                            <input type="hidden" name="stu_image1" id="stu_image1" value="">

                            <div class="modal-body">
                                <div class="mt-2 text-center" id="imageShow">

                                </div>


                                <div class="form-group mb-3">
                                    <label class="form-label">NAME</label>
                                    <input type="text" class="form-control" name="name" id="nameShow" placeholder="Enter Name" required="">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" name="email" id="emailShow" placeholder="Enter EMAIL" required="">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">CONTACT</label>
                                    <input type="number" class="form-control" name="contact" id="contactShow" placeholder="Enter CONTACT" required="">
                                </div>

                                <div class="mb-3">
                                    <label for="grade">GRADE</label><br>
                                    <input class="form-check-input" type="radio" name="grade" id="passShow" value="Pass" onclick="passShow();" />Pass
                                    <input class="form-check-input" type="radio" name="grade" id="failShow" value="Fail" onclick="failShow();" />Fail

                                    <div class="mt-3" id="showFormContent" class="hide">
                                        <label for="">MARKS</label><br>
                                        <hr>
                                        <label class="form-label">ENGLIHS</label>
                                        <input type="text" class="form-control" id="engMShow" name="engM" placeholder="Enter English Mark" maxlength="2">
                                        <label class="form-label">TAMIL</label>
                                        <input type="text" class="form-control" id="tamMShow" name="tamM" placeholder="Enter Tamil Mark" maxlength="2">
                                        <label class="form-label">MATHS</label>
                                        <input type="text" class="form-control" id="matMShow" name="matM" placeholder="Enter Maths Mark" maxlength="2">
                                        <hr>
                                    </div>
                                </div>
                                        </div>
                        </form>

                </div>
            </div>
        </div>
    </section>

<!--SHOW MODAL END-->

<!--EDIT MODAL START-->

    <section class="container">
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModal" style="margin-left: 35%">EDIT-STUDENT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <form class="form" id="" action="{{url('/student/update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="stu_id" id="stu_id2" value="">
                            <input type="hidden" name="stu_image" id="stu_image2" value="">

                            <div class="modal-body">

                                <div class="form-group mb-3">
                                    <label class="form-label">NAME</label>
                                    <input type="text" class="form-control" name="name" id="nameEdit" placeholder="Enter Name" required="">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" name="email" id="emailEdit" placeholder="Enter EMAIL" required="">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">CONTACT</label>
                                    <input type="number" class="form-control" name="contact" id="contactEdit" placeholder="Enter CONTACT" required="">
                                </div>

                                <div class="mb-3">
                                    <label for="grade">GRADE</label><br>
                                    <input class="form-check-input" type="radio" name="grade" id="passEdit" value="Pass" onclick="passedit();"/>Pass
                                    <input class="form-check-input" type="radio" name="grade" id="failEdit" value="Fail" onclick="failedit();"/>Fail

                                    <div class="mt-3" id="editFormContent" class="hide">
                                        <label for="">MARKS</label><br>
                                        <hr>
                                        <label class="form-label">ENGLISH</label>
                                        <input type="text" class="form-control" id="engMEdit" name="engM" placeholder="Enter English Mark" maxlength="2">
                                        <label class="form-label">TAMIL</label>
                                        <input type="text" class="form-control" id="tamMEdit" name="tamM" placeholder="Enter Tamil Mark" maxlength="2">
                                        <label class="form-label">MATHS</label>
                                        <input type="text" class="form-control" id="matMEdit" name="matM" placeholder="Enter Maths Mark" maxlength="2">
                                        <hr>

                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">IMAGE</label>
                                    <input type="file" class="form-control" name="image" placeholder="image">
                                </div>
                                <div class="mt-2" id="imageEdit">

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Student</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </section>

<!--EDIT MODAL END-->

<!--CDN LINK-->
    <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!--Jquery CDN link-->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!--CDN LINK-->

<!--SHOW form Ajax Start-->
    <script>
    function student_show(id) {
        $('#stu_id1').val(id);
    }
    $(document).on('click', '.show', function (e) {
        var id = $('#stu_id1').val();
        $.ajax({
            type: "POST",
            url: '/student/show/'+id,
            data: {'id':id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (show_id) {
                // console.log(show_id);
                $('#nameShow').val(show_id.name);
                $('#emailShow').val(show_id.email);
                $('#contactShow').val(show_id.contact);
                $('#gradeShow').val(show_id.grade);
                if(show_id.grade == "Pass" ){
                    // document.getElementById('Pass').checked = true;
                    $("#passShow").prop('checked',true);
                    document.getElementById('showFormContent').style.display ='block';
                }
                else{
                    // document.getElementById('Fail').checked = true;
                    $("#failShow").prop('checked',true);
                    document.getElementById('showFormContent').style.display ='none';
                }
                $('#engMShow').val(show_id.engM);
                $('#tamMShow').val(show_id.tamM);
                $('#matMShow').val(show_id.matM);
                $('#imageShow').html(`<img src="/images/${show_id.image}" width="250" class = "img-fluid img-thumbnail" >`);
                $('#stu_id1').val(show_id.id);
                $('#stu_image1').val(show_id.image);
            }
        });
    });
    </script>

<!--SHOW form Ajax End-->

<!--Edit form Ajax Start-->
    <script>
    function student_edit(id) {
        $('#stu_id2').val(id);
    }
    $(document).on('click', '.edit', function (e) {
        var id = $('#stu_id2').val();
        $.ajax({
            type: "POST",
            url: '/student/edit/'+id,
            data: {'id':id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (edit_id) {
                // console.log(edit_id);
                $('#nameEdit').val(edit_id.name);
                $('#emailEdit').val(edit_id.email);
                $('#contactEdit').val(edit_id.contact);
                $('#gradeEdit').val(edit_id.grade);
                if(edit_id.grade == "Pass" ){
                    // document.getElementById('Pass').checked = true;
                    $("#passEdit").prop('checked',true);
                    document.getElementById('editFormContent').style.display ='block';
                }
                else{
                    // document.getElementById('Fail').checked = true;
                    $("#failEdit").prop('checked',true);
                    document.getElementById('editFormContent').style.display ='none';
                }
                $('#engMEdit').val(edit_id.engM);
                $('#tamMEdit').val(edit_id.tamM);
                $('#matMEdit').val(edit_id.matM);

                $('#imageEdit').html(`<img src="/images/${edit_id.image}" width="250" class = "img-fluid img-thumbnail" >`);
                $('#stu_id2').val(edit_id.id);
                $('#stu_image2').val(edit_id.image);
            }
        });
    });
    </script>

<!--Edit form Ajax End-->

<!--DELETE Ajax Start-->

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.deleteButton').click(function(e){
                e.preventDefault();
                var delete_id = $(this).closest("tr").find(".deleteValue").val();
                // alert(delete_id);
                swal({
                    title: "Are you sure?",
                    text: 'You Want To Delete This " STUDENT DATA" !',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                            "_token": $('input[name=_token]').val(),
                            "id": delete_id,
                        };
                        $.ajax({
                            type : "DELETE",
                            url : '/student/delete/'+delete_id,
                            data : data,
                            success : function(response){
                                swal(response.status,{
                                    icon : "success",
                                })
                                .then((result)=>{
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
<!--DELETE Ajax End-->

<!--search ajax start-->
    <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("datatables");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
        }
    </script>
<!--search ajax end-->

<!--onclick form start-->
    {{-- ADD --}}
    <script>
        function Fail1(){
            document.getElementById('formContent').style.display ='none';
        }
        function Pass1(){
            document.getElementById('formContent').style.display = 'block';
        }
    </script>

    {{-- EDIT --}}
    <script>
        function failedit(){
            document.getElementById('editFormContent').style.display ='none';
            // $('#engMEdit').val('');
            // $('#tamMEdit').val('');
            // $('#matMEdit').val('');
        }
        function passedit(){
            document.getElementById('editFormContent').style.display = 'block';
        }
    </script>

    {{-- show --}}
    <script>
        function failShow(){
            document.getElementById('showFormContent').style.display ='none';
            // $('#engMEdit').val('');
            // $('#tamMEdit').val('');
            // $('#matMEdit').val('');
        }
        function passShow(){
            document.getElementById('showFormContent').style.display = 'block';
        }
    </script>
<!--Onclick form end-->

<!--sweet alert start-->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <script>

        @if(Session('success'))
        swal({
            title: '{{ Session('success') }}',
            icon: "success",
            button: "OK",
        });
        @endif
    </script>
<!--sweet alert end-->

</body>

</html>
