
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Student List</h2>

        <div>
            <a href="{{ url('/create') }}" class="btn btn-primary">
                student registration
            </a>
            <a href="{{ url('/course') }}" class="btn btn-primary">
                add new course 
            </a>

             <form class="d-flex m-1" method="GET" action="{{ url('/')}}">
                    <input name="search" class="form-control m-1" type="search" placeholder="Search" aria-label="Search">
                    
                    <button class="btn btn-primary mt-1 " type="submit">Search</button>
                </form>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Student Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Roll</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                {{-- <td>{{ $student->id }}</td> --}}

                                <td>
                                    @if ($student->photos)
                                    <img
                                        src="{{ asset( $student->photos) }}"
                                        alt="Student Photo"
                                        width="60"
                                        height="60"
                                        class="rounded"
                                        style="object-fit: cover;"
                                    >
                                    @else
                                        No Photo
                                    @endif
                                </td>

                                <td class="text-uppercase">{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->roll }}</td>
                                <td>{{ $student->course->courseName }}</td>

                                <td>
                                    <a href="{{ url('/show/'. $student->id) }}"
                                       class="btn btn-sm btn-warning mb-1">
                                        view
                                    </a>

                                    <a href="{{ url('/edit/'. $student->id) }}"
                                       class="btn btn-sm btn-warning mb-1">
                                        Edit
                                    </a>

                                    <form action="{{ url('/delete/' . $student->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this student?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $students->links() }}

        </div>
    </div>

</div>

</body>
</html>
