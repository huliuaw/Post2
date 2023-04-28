<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>수정폼</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">수정</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Edit Note</div>
            <div>
                <a href="{{ route('note.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
{{-- 수정폼 --}}
        <form action="{{ route('note.update',$note->id) }}" method="post">
            @csrf
            @method('put')
           
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        이름 : <input type="text" name="name" i placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$note->name) }}">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Email</label>
                        <input type="text" name="title"  placeholder="Enter title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$note->title) }}">
                        @error('title')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror      
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Address</label>
                        <textarea name="content" minlength="4" cols="30" rows="4" placeholder="Enter content" class="form-control">{{ old('content',$note->content) }}</textarea>
                        @error('content')
                            <p class="invalid-feedback">{{ $message }}</p>    
                     @enderror  
                    </div>
                
                </div>
            </div>
            
            <button class="btn btn-primary my-3">Update Employee</button>

        </form>
    </div>

    
</body>
</html>
