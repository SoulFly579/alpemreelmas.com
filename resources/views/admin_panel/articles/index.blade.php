@extends("admin_panel.layouts.master")
@section("body")
    <div class="box">
        <div class="box-head">
            <h3 class="title">Articles</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered data-table data-table-default">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Username</th>
                    <th>Image Preview</th>
                    <th>Categories</th>
                    <th>Is Active</th>
                    <th>Is Draft</th>
                    <th>Events</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->title}}</td>
                        <td>Get User</td>
                        <td><img src="{{asset($article->title_image)}}" class="img-fluid" width="300" height="150" /></td>
                        {{-- <td>@if($article->getCategories->count() > 0) @foreach($article->getCategories as $category) {{$category->name.", "}} @endforeach @endif</td> --}}
                        <td> - </td>
                        <td>@if($article->is_draft) Draft @else Ready @endif</td>
                        <td>@if($article->is_active) Active @else Deactive @endif</td>
                        <td>Events</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Username</th>
                    <th>Image Preview</th>
                    <th>Categories</th>
                    <th>Is Active</th>
                    <th>Is Draft</th>
                    <th>Events</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section("js")
    <script src="{{asset("admin_panel")}}/js/plugins/datatables/datatables.min.js"></script>
    <script src="{{asset("admin_panel")}}/js/plugins/datatables/datatables.active.js"></script>
    <script>
        $(document).ready(function () {
            $('.data-table-default').dataTable();
        })


    </script>

@endsection
