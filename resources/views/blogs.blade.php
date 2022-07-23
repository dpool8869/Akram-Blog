<x-header name="Users Page"/>
<div class="row">
    <div class="container">
        @if(Session::has('delete'))
            <h2 class="alert alert-success text-decoration-none">{{Session::get('delete')}}</h2>
            @elseif(Session::has('not'))
            <h2 class="alert alert-danger text-decoration-none">{{Session::get('not')}}</h2>
            @endif
        <a href="{{url('blog/create')}}"class="btn btn-outline-primary font-weight-bold mb-2">اضافه مقال جديد</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Adress</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($post!='')
                @foreach($post as $p)
                    <tr>
                        <td>{{$p ->id}}</td>
                        @if(file_exists(public_path('images/'.$p->image)))
                         <td><img src="{{url('images/'.$p->image)}}" class="img-responsive" height="100px" width="150px"> </td>
                        @else
                        <td><img src="{{url('images/s.jpg')}}" class="img-responsive" height="100px" width="150px"> </td>
                        @endif
                        <td>{{$p ->name}}</td>
                        <td>{{$p ->email}}</td>
                        <td>{{$p ->address}}</td>
                        <td><a class="btn btn-outline-dark" href="{{url('blog/edit',['id' => $p ->id])}}">تعديل</a>
                        <a class="btn btn-danger ml-3" href="{{url('blog/del',['id' => $p ->id])}}">حذف</a></td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<script src="{{asset('js/bootstrap.js')}}" defer></script>
</body>
</html>
