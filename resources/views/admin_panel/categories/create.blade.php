@extends("admin_panel.layouts.master")
@section("body")
    <div class="row">
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Category</h3>
                </div>
                <div class="box-body">
                    <div class="row mbn-20">
                        <!--Default Field-->
                        <div class="col-lg-3 col-12 mb-20">

                            <h6 class="mb-15">Category Add</h6>
                            <div class="row mbn-15">
                                <form action="" class="form-control">
                                    <div class="col-12 mb-15">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Category Name" required>
                                    </div>
                                    <button class="btn btn-block btn-primary">Add Category</button>
                                </form>
                            </div>
                        </div>
                        <!--Default Field-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
