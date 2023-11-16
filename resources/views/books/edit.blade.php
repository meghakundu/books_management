
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <title>Books</title>
    <body>
        <div class="container">
        <form action="{{ route('books.update',$data->id) }}" method="POST" id="edit_form">
            @csrf
            @method('PUT')
       
            <div class="card-body">
              <input type="hidden" class="form-control" name="id" value="{{$data['id']}}" />
              <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" value="{{$data['name']}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputName">Published At*</label>
                <input type="date" name="published_at" class="form-control @error('published_at') is-invalid @enderror" id="exampleInputName" value="{{$data['published_at']}}">
                @error('published_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
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

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
       
        </form>
          <!-- /.card -->
</div>
  <!-- /.content -->
</body>
</html>

