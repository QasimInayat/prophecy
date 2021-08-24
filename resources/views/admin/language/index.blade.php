@extends('admin.layout.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
              <span class="page-title-icon bg-gradient-success text-white mr-2">
                  <i class="mdi mdi-home"></i>
              </span> @lang('Language') </h3>
    </div>


    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card card-primary m-0 m-md-4 my-4 m-md-0">
                <div class="card-body">

                    <div class="card-title mb-5">
                        <div class="float-right">
                            <div class="btn-group" role="group" aria-label="Basic">
                                <a href="{{route('admin.language.create')}}"
                                   class="btn btn-sm btn-outline-success   active ">
                                    <i class="mdi mdi-plus-circle"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>



                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Short Name')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($languages as $key => $language)
                                <tr>

                                    <td>{{ $language->name }}</td>
                                    <td>{{ $language->short_name }}</td>

                                    <td>
                                        @if($language->is_active)
                                            <span class="badge badge-info">@lang('Active')</span>
                                        @else
                                            <span class="badge badge-warning">@lang('Inactive')</span>
                                        @endif


                                    </td>
                                    <td>
                                        <a href="{{route('admin.language.edit',$language) }}"
                                           class="btn btn-gradient-info btn-rounded btn-icon pt-12">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>

                                        <a href="{{route('admin.language.keywordEdit',$language) }}"
                                           class="btn btn-gradient-primary btn-rounded btn-icon pt-12">
                                            <i class="fa fa-code"></i>
                                        </a>

                                        @if($language->short_name != 'en')
                                        <button type="button"
                                                class="btn btn-gradient-danger btn-rounded btn-icon deleteBtn"
                                                data-toggle="modal" data-target="#deleteModal"
                                                data-act="DELETE"
                                                data-route="{{route('admin.language.delete',$language)}}">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                </div>
            </div>

        </div>
    </div>



    <!-- Primary Header Modal -->
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">@lang('Delete Confirmation')
                    </h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>@lang('Are you sure to delete this?')</p>
                </div>

                <form action="" method="post" class="actionForm">
                    @csrf
                    @method('delete')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                                data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Delete')</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        "use strict";
        $(document).ready(function () {
            $('.deleteBtn').on('click', function () {
                $('.actionForm').attr('action', $(this).data('route'));
            })
        })

    </script>
@endpush
