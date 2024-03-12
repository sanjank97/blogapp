@extends('layout.admin-app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Blog</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <!--Include alert file-->
        @include('admin.include.alert')

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Fill the Form</h4>
                    <hr>
                    <form method="post" enctype="multipart/form-data" action="{{ route('blogs.store') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $blog->id }}" />

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Blog Title</label>
                                    <input type="text" name="blog_title" class="form-control" value="{{ $blog->blog_title }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Image</label>
                                    @if($blog->image)
                                    <img src="{{ asset('public/'. $blog->image) }}" class="blog_img">
                                    @endif

                                    <input type="file" class="form-control" name="image" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Categories</label>
                                    <select name="category_id[]" class="form-control" multiple>
                                        <option value="">Please select</option>
                                        @foreach($categories as $row)
                                        <option value="{{ $row->id }}" @if(in_array($row->id, $blog_categories)) selected @endif
                                            >
                                            {{ $row->category_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Please select</option>
                                        <option value="active" @if($blog->status == 'active') selected @endif>Active</option>
                                        <option value="inactive" @if($blog->status == 'inactive') selected @endif>Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Display on Home:</label>
                                    <div class="radio radio-info form-check-inline ml-3">
                                        <input type="radio" id="yes" name="display_on_home" value="1" @if($blog->display_on_home == 1) checked @endif>
                                        <label for="yes"> Yes </label>
                                    </div>
                                    <div class="radio form-check-inline">
                                        <input type="radio" id="no" name="display_on_home" value="0" @if($blog->display_on_home == 0) checked @endif>
                                        <label for="no"> No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Description</label>
                                    <textarea class="form-control" id="content" placeholder="Enter the Description" name="description">
                                    {{ $blog->description }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                    <!-- end row-->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>


</div> <!-- container -->
@endsection
