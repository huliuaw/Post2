<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>리스트</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">노트</div>
            <div>
                <a href="{{ route('note.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
<!-- 테이블 -->
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th width="30">ID</th>
                        <th>name</th>
                        <th>content</th>
                        <th>title</th>    
                        <th width="150">Action</th>           
                    </tr>

        @if($notes->isNotEmpty())
        @foreach($notes->all() AS $note)
        <tr valign="middle">
            <td>{!! $note->id !!}</td>
            <td>{{ $note['name'] }}</td>
            <td>{{ $note->title }}</td>
            <td>{{ $note->content }}</td>
            <td>
                <a href="{{ route('note.edit',$note->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="#" onclick="deleteEmployee({{ $note->id }})" class="btn btn-danger btn-sm">Delete</a>
                <form id="employee-edit-action-{{ $note->id }}" action="{{ route('note.destroy',$note->id) }}" method="post">
                    @csrf
                    @method('delete')
                </form>

            </td>   
        </tr><br>
        @endforeach
        
        @else
        <tr>
            <td colspan="6">Record Not Found</td>
        </tr>
        @endif
        </table>
        <div class="mt-3">
            {{ $notes->links() }}
        </div>
        </body>
</html>
<script>
    function deleteEmployee(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('employee-edit-action-'+id).submit();
        }
    }
</script>