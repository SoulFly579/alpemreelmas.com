@extends("admin_panel.layouts.master")
@section("body")
    <div class="row">
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Category Add</h4>
                </div>
                <div class="box-body">
                    @if(Session::get("success"))
                        <div class="alert alert-success" role="alert">
                            <strong>Successful!</strong> {{Session::get("success")}}
                        </div>
                    @endif
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <strong>Warning !</strong> {{$error}}
                                </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{url("/admin/categories/")}}">
                        @csrf
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{old("name")}}" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="descriptions">Descriptions</label>
                                <input type="text" id="descriptions" class="form-control" placeholder="Descriptions" name="descriptions" value="{{old("descriptions")}}" required>
                            </div>
                            <div class="col-12 mb-20">
                                <button type="submit" class="btn btn-block btn-primary" >Add</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
