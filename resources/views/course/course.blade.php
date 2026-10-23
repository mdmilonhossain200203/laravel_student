
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Management</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

  
<div class="container">
    <div class="row">
        <div class="col-md_12 col_lg-12">
            @if (session('error'))
            <span class="h4 my-5 text-danger">{{ session('error') }}</span>
             @endif
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">

    <!-- Add Course Form -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add New Course</h3>
        </div>

        <div class="card-body">
            <form id="" action="{{ url('/course/store') }}"  method="post">

                @csrf

                {{-- <input type="hidden" id="editIndex"> --}}

                <div class="mb-3">
                    <label for="courseName" class="form-label">
                        Course Name
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="courseName"
                        placeholder="Enter course name"
                        name="courseName"
                    >
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn">
                    Add Course
                </button>

                {{-- <button
                    type="button"
                    class="btn btn-secondary d-none"
                    id="cancelBtn"
                    onclick="cancelEdit()"
                >
                    Cancel
                </button> --}}
            </form>
        </div>
    </div>

    <!-- Show Courses -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Course List</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th style="">SL</th>
                            <th>Course Name</th>
                            <th style="">Action</th>
                        </tr>
                    </thead>

                    <tbody id="courseTable">
                        @foreach ($allCourse as $Course)
                        <tr>
                            <td colspan="" class="text-center">
                                {{$Course->id}}
                            </td>
                            <td colspan="" class="text-center">
                                {{ $Course->courseName }}

                              
                            </td>
                            <td colspan="" class="text-center">
                                <a class="btn btn-danger" href={{ url('course/delete/'.$Course->id) }}>delete</a>

                                {{-- edit --}}

                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$Course->id}}">
    edit course
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$Course->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit cousrse</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            

            <form id="" action="{{ url('/course/update',$Course->id) }}"  method="POST">

                @csrf
                {{-- @method('PUT') --}}

                {{-- <input type="hidden" id="editIndex"> --}}

                <div class="mb-3">
                  

                    <input value=" {{$Course->id}}" type="number" hidden>
                    <input
                    value=" {{$Course->courseName}}"
                        type="text"
                        class="form-control"
                        id="courseName"
                        placeholder="Enter course name"
                        name="courseUpdate"
                    >
                </div>
               
              
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    Add update
                </button>

                
            </form>





      </div>
    </div>
  </div>
                            </td>
                        </tr>
                        @endforeach
                            
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="container mb-4">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card p-4">
                <a class="btn btn-primary " href="{{ url('http://127.0.0.1:8000/') }}">Studetn list</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
