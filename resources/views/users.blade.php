<x-header name="Users Page"/>
<h2 class="text-center text-decoration-none  alert alert-success font-weight-bold">{{__('messages.hello')}}</h2>
<div class="row">
    <div class="container">
        <div class="col-md-4 col-lg-12">
            @if(Session::has('true'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('true') }}
                </div>
            @endif
            <form method="POST" action="{{ route("blog.save") }}">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label for="username">{{__('messages.Blogs Name')}}</label>
                    <input id="username" name="name" type="text" class="form-control" placeholder="name">
                    @error('name')
                    <small class="form-text text-danger font-weight-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{__('messages.Blogs email')}}</label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                    @error('email')
                    <small class="form-text text-danger font-weight-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address"> {{trans('messages.Blogs address')}} </label>
                    <input name="address" type="text" class="form-control" placeholder="Address">
                </div>
                <button type="submit"
                        class="btn btn-primary ml-md-4 font-weight-bold">{{__('messages.Insert')}}</button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/bootstrap.js')}}" defer></script>

</body>
</html>
