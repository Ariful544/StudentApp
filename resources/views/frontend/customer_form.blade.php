<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <style>
    .requied label::after{
      content: " * ";
      color: red;
    }
  </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">{{ $title }}</h1>
    <div class="row">
       <div class="col-md-12">
        <a href="{{ route('student.index')}}" class="btn btn-primary ">Back</a>
       </div>
    </div>
    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
      @csrf
     <div class="row">
      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif
       <div class="col-md-6  my-3 requied" >
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{ $student->name }}">
            <span class="text-danger">
              @error('name')
                {{ $message }}
              @enderror
            </span>
          </div>
       </div>
       <div class="col-md-6 my-3 requied" >
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" id="" class="form-control" value="{{ $student->email }}" >
          <span class="text-danger">
            @error('email')
            {{ $message }}
            @enderror
          </span>
        </div>
     </div>
     <div class="col-md-6 my-3 requied" >
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="" class="form-control" placeholder="">
          <span class="text-danger">
            @error('password')
            <ul>
              <li> {{ $message }}</li>
            </ul>
            @enderror
          </span>
        </div>
     </div>
     <div class="col-md-6 my-3 requied" >
        <div class="form-group">
          <label for="">confrim Password</label>
          <input type="password" name="confirmed_password" id="" class="form-control" placeholder="">
          <span class="text-danger">
            @error('confirmed_password')
            <ul>
              <li> {{ $message }}</li>
            </ul>
            @enderror
          </span>
        </div>
     </div> 
     <div class="col-md-6 my-3" >
        <div class="form-group">
             <label class="form-label select-label">Divison</label>
            <select name="division" class="select form-control" value="{{ $student->division }}" >
                <option value="Dhaka">Dhaka</option>
                <option value="Mymensing">Mymensing</option>
                <option value="Chottogram">Chottogram</option>
                <option value="Syhlet">Syhlet</option>
                <option value="Rajshahi">Rajshahi</option>
              </select>
             
        </div>
     </div>
     <div class="col-md-6 my-3" >
        <div class="form-group">
          <label for="">Upzilla</label>
          <input type="text" name="upzilla" id="" class="form-control" value="{{ $student->upzilla }}">
        </div>
     </div>
     <div class="col-md-12 my-3" >
        <div class="form-group">
          <label for="">Address</label>
         <textarea class="form-control" name="address" placeholder="">{{ $student->address }}</textarea>
        </div>
     </div>
     <div class="col-md-6 my-3" >
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="Male"
            {{ $student->gender == 'male' ? 'checked' :''}}
            />
            <label class="form-check-label" >Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="Female" 
            {{ $student->gender == 'female' ? 'checked' :''}} />
            <label class="form-check-label">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="other"
            {{ $student->gender == 'other' ? 'checked' :''}}
            />
            <label class="form-check-label">Other</label>
          </div>
     </div>
     <div class="col-md-6 my-3 " >
        <div class="form-group">
          <label for="">Date of birth</label>
          <input type="date" name="dob" id="" class="form-control" value="{{ $student->dob }}">
        </div>
     </div>
        <button class="btn btn-primary d-inline my-3">Submit</button>

     </div>
    
    </form>
</div>
</body>
</html>