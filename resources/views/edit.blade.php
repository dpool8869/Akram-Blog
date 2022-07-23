<x-header name="Users Page"/>
<h2>Hi From Users</h2>
<div class="row">
    <div class="container">
        <div class="col-md-4 col-lg-12">
            @if(Session::has('save'))
            <div class="alert alert-danger">
                <p style="font-size: 30px" class="font-weight-bold text-center">{{Session::get('save')}}</p>
            </div>
            @enderror
            <form method="POST" action="{{url('blog/edit')}}" enctype="multipart/form-data">
                @csrf
                @foreach($post as $p)
                    <h1 class="text-center">{{trans('passwords.post num') .$p->id}}</h1>
                    <input type="hidden" value="{{$p->id}}" name="id">
                    <div class="text-center  col-md-6 justify-content-center">
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Blogs Name</label>
                        <input name="name" type="text" class="form-control"  value="{{$p ->name}}">
                        @error('name')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Blogs Email</label>
                        <input name="email" type="text" class="form-control" value="{{$p ->email}}" >
                        @error('email')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Blogs Address</label>
                        <input name="address" type="text" class="form-control" value="{{$p ->address}}"">
                        @error('address')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary ml-md-4 font-weight-bold">Insert</button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/bootstrap.js')}}" defer></script>

</body>
</html>
