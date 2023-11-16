<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <title>Create Authors</title>
    <body class="antialiased">
<div class="container">
             <h2 style="text-align:center">Create Authors</h2>
<form action="{{ route('authors.store') }}" method="POST" class="form" id="form_author_create">
        @csrf
        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">First Name *</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                    placeholder="Enter your first name" />
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Last Name *</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                    placeholder="Enter your last name" />
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Email *</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Enter your email" />
                @error('email')
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