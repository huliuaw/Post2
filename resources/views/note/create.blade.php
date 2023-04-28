<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>생성</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">글쓰기</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">노트</div>
            <div>
                <a href="{{ route('note.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('note.store') }}" method="post">
            @csrf
            <div class="card border-0 shadow-lg">
            <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                이름 : <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>    
                @enderror                        
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">제목</label>
                제목 : <input type="text" name="title"  placeholder="Enter title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <p class="invalid-feedback">{{ $message }}</p>    
                @enderror                        
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">내용</label>
                내용 : <textarea name="content" cols="30" rows="4" minlength="4" placeholder="Enter content" class="form-control">{{ old('content') }}</textarea>
            </div>
        </div>

            <button class="btn btn-primary mt-3">Save Employee</button>

        </form>
    </div>
</body>
</html>