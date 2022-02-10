<!-- extend the default layout  -->
@extends('layout')

@section('content')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">File Upload</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">File Upload</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Dropzone</h4>
                                        <p class="card-title-desc">DropzoneJS is an open source library
                                            that provides drag’n’drop file uploads with image previews.
                                        </p>
                                    </div>
                                    <div class="card-body">
    
                                        <div>
                                            <form action="#" class="dropzone dz-clickable">
                                                
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                    </div>
    
                                                    <h5>Drop files here or click to upload.</h5>
                                                </div>
                                            </form>
                                        </div>
    
                                        <div class="text-center mt-4">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send
                                                Files</button>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>


@endsection