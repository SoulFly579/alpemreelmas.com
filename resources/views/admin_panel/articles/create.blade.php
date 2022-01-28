@extends("admin_panel.layouts.master")
@section("css")
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
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
                            <div class="col-12" style="margin-bottom:150px;">
                                <label for="title_image">Article Title Image</label>
                                <input type="file" id="title_image" name="title_image">
                            </div>
                            <div class="col-12 mb-20">
                                <label for="name">Content</label>
                                <textarea name="content" id="editor" cols="30" rows="10" name="content" required></textarea>
                            </div>
                            @if($categories->count() > 0)
                                <div class="col-12 mb-20">
                                    <label for="name">Categories</label>
                                    <select class="form-control select2" multiple required name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
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
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
        const inputElement = document.querySelector("input[id='title_image']");
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const pond = FilePond.create(inputElement,{
            imagePreviewHeight: 140
        })
        FilePond.setOptions({
            server: {
                url: "/admin/articles/upload",
                headers :{
                    "X-CSRF-TOKEN":"{{csrf_token()}}"
                }
            }
        })
    </script>
@endsection
