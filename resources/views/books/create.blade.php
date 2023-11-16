<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <title>Create Books</title>
    <body class="antialiased">
<div class="container">
             <h2 style="text-align:center">Create Books</h2>
<form action="{{ route('books.store') }}" method="POST" class="form" id="form_books_create">
        @csrf
        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Name *</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Enter books' name" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Published At *</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="date" class="form-control @error('published_at') is-invalid @enderror" name="published_at"
                    placeholder="Enter published_date" />
                @error('published_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Authors *</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <select class="form-control @error('author_id') is-invalid @enderror" name="author_id">
                @foreach($authors as $item)
                <option value="{{$item['id']}}">{{$item['first_name']}} {{$item['last_name']}}</option>
                @endforeach
                </select>
                @error('author_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="separator separator-dashed my-10"></div>



        <div class="row">
            <div class="col-lg-12 ml-lg-auto">
                <button type="submit" class="btn btn-primary font-weight-bold mr-2">Submit</button>
            </div>
        </div>
    </form>

</div>
</body>
</html>