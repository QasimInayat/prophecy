@extends('admin.layout.master')
@section('content')

    <div class="page-header">
        <h3 class="page-title">
              <span class="page-title-icon bg-gradient-success text-white mr-2">
                  <i class="mdi mdi-image-album"></i>
              </span> @lang('Edit Language') </h3>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card card-primary card-form m-0 m-md-4 my-4 m-md-0">
                <div class="card-body">


                    <div class="card-title mb-5">
                        <div class="float-right">
                            <div class="btn-group" role="group" aria-label="Basic">
                                <a href="{{route('admin.language.index')}}"
                                   class="btn btn-sm btn-outline-success   active ">
                                    <i class="fa fa-arrow-left"></i> @lang('Back')
                                </a>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="{{ route('admin.language.update',$language) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mt-5 justify-content-center">

                            <div class="col-md-3 d-none">
                                <div class="image-input ">
                                    <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                    <input type="file" name="flag" placeholder="Choose image" id="image">
                                    <img id="image_preview_container" class="preview-image"
                                         src="{{ getFile(config('location.language.path').$language->flag) }}"
                                         alt="preview image">
                                </div>
                                @error('flag')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Name')</label>
                                    <input type="text" name="name" value="{{old('name',$language->name)}}"
                                           placeholder="@lang('Enter name of country')"
                                           class="form-control  @error('name') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('name') @lang($message) @enderror</div>
                                </div>


                                <div class="form-group">
                                    <label for="short_name" class="font-weight-bold">@lang('Short Name')</label>
                                    <select name="short_name"
                                            class="select2-single form-control @error('short_name') is-invalid @enderror"
                                            id="short_name">
                                        @foreach(config('languages.langCode') as $key => $value)
                                            <option
                                                value="{{$key}}" {{  (old('short_name',$language->short_name) == $key ? ' selected' : '')  }}>{{ $key.' - '.$value }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('short_name') @lang($message) @enderror</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="email_notification" class="font-weight-bold">Status</label>
                                            <div class="form-check form-check-success">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="is_active" class="form-check-input" <?php if ($language->is_active == 1):echo 'checked'; endif ?>  Enabled <i class="input-helper"></i><i class="input-helper"></i></label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="email_notification" class="font-weight-bold">RTL</label>
                                            <div class="form-check form-check-success">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="rtl" class="form-check-input" <?php if ($language->rtl == 1):echo 'checked'; endif ?>>  Yes <i class="input-helper"></i><i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <button class="btn waves-effect waves-light btn-rounded btn-success
                                 btn-block mt-3">
                                    @lang('Save Changes')
                                </button>
                            </div>


                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function (e) {
            "use strict";

            $('#image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('select[name=short_name]').select2({
                selectOnClose: true
            });
        });
    </script>
@endpush
