
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Student management system</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student management system</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Add Student</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link active" href="#">Add Course</a>
                    </li>

                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>

    <section>
        <div class="container p-5">
            <div class="row">
                <div class="col-md-4 col-lg-4 card p-2 ">
                    <img class="auto d-block" width="300px" src="{{ asset($data->photos) }}" alt="Photo">
                </div>
                <div class="col-md-6 col-lg-6 ">
                    <table>
                        <tr class="">
                          <th class="text-uppercase p-2">name :</th><td class="text-uppercase">{{ $data['name'] }}</td>
                        </tr>
                        <tr>
                          <th class="text-uppercase p-2">email :</th><td class="text-uppercase">{{ $data['email'] }}</td>
                        </tr>
                        <tr>
                          <th class="text-uppercase p-2">phone :</th><td class="text-uppercase">{{ $data['phone'] }}</td>
                        </tr>
                        <tr>
                          <th class="text-uppercase p-2">roll :</th><td class="text-uppercase">{{ $data['roll'] }}</td>
                        </tr>
                        <tr>
                          <th class="text-uppercase p-2">course :</th><td class="text-uppercase">{{ $data['course'] }}</td>
                        </tr>

                       
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    {{-- <section>
        <!-- studend add form  -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 m-5">
                 
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                 
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif


                    <form class="p-5" method="POST" action="{{ url('/store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $data['name'] }}" type="text" name="name" class="form-control" id="name" >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input value="{{ $data->email }}"  type="email" name="email" class="form-control" id="email" >
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input value="{{ $data->phone }}" type="tel" name="phone" class="form-control" id="phone" >
                        </div>

                        <div class="mb-3">
                            <label for="roll" class="form-label">Roll</label>
                            <input value="{{ $data->roll }}" type="text" name="roll" class="form-control" id="roll" >
                        </div>

                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input value="{{ $data->course }}" type="text" name="course" class="form-control" id="course" >
                        </div>

                     


                </div>
            </div>
        </div>
    </section> --}}


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
</body>

</html>