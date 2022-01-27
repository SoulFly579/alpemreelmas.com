@extends("admin_panel.layouts.master")
@section("body")
    <div class="box">
        <div class="box-head">
            <h3 class="title">Categories</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered data-table data-table-default">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Related Article Count</th>
                    <th>Keywords</th>
                    <th>Descriptions</th>
                    <th>Events</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>Related Article Count</td>
                        <td>{{$category->keywords}}</td>
                        <td>{{$category->descriptions}}</td>
                        <td>Events</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Related Article Count</th>
                    <th>Keywords</th>
                    <th>Descriptions</th>
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
