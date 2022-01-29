@extends("admin_panel.layouts.master")
@section("css")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section("body")
    <div class="row">
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Articles Add</h4>
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
                    <form method="POST" action="{{url("/admin/articles/")}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <label for="name">Title</label>
                                <input type="text" id="name" class="form-control" placeholder="Name" name="title" value="{{old("title")}}" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="title_image">Article Title Image</label>
                                <input class="dropify" type="file" name="title_image" required />
                            </div>

                            @if($categories->count() > 0)
                                <div class="col-12 mb-20">
                                    <label for="name">Categories</label>
                                    <select class="form-control bSelect" multiple required name="category_ids[]" id="category_ids">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-12 mb-20">
                                <label for="name">Content</label>
                                <textarea name="content" id="editor" cols="30" rows="10" name="content" required></textarea>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="descriptions">Descriptions</label>
                                <textarea type="text" id="descriptions" class="form-control" placeholder="Descriptions" name="descriptions" required>{{old("descriptions")}}</textarea>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Active Status</label>
                                <select class="form-control bSelect" name="is_active">
                                    <option value="true">Active</option>
                                    <option value="false">Deactive</option>
                                </select>
                            </div>
                            <div class="mt-50 d-flex w-100">
                                <div class="col-6 mb-20">
                                    <button type="submit" class="btn btn-block btn-outline-primary" >Add Article</button>
                                </div>
                                <div class="col-6 mb-20">
                                    <button class="btn btn-block btn-outline-warning" >Add Draft</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset("admin_panel")}}/js/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="{{asset("admin_panel")}}/js/plugins/bootstrap-select/bootstrapSelect.active.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
        $('.dropify').dropify();
    </script>
@endsection
