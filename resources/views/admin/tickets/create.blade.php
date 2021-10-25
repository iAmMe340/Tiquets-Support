@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ticket.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tickets.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.ticket.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($ticket) ? $ticket->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.title_helper') }}
                </p>
            </div>

            <!-- Buscar Equipo -->

            <div class="row">
                <div class="col-sm-2">
                    <!-- Cod equipo reportado-->
                    <div class="form-group {{ $errors->has('device') ? 'has-error' : '' }}">
                        <label for="device">Cod activo fijo*</label>
                        <input type="text" id="device" class="form-control" value="{{ old('device', isset($ticket) ? $ticket->device : '') }}" required disabled>
                        <input type="hidden" id="device_id" name="device_id">
                        @if($errors->has('device'))
                            <em class="invalid-feedback">
                                {{ $errors->first('device') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.ticket.fields.title_helper') }}
                        </p>
                    </div>

                </div>
                <div class="col-sm-6">

                    <div class="form-group {{ $errors->has('device') ? 'has-error' : '' }}">
                        <label for="device">Nombre activo fijo reportado*</label>
                        <input type="text" id="nomDevice" name="nomDevice" class="form-control" value="" required disabled>
                        @if($errors->has('device'))
                            <em class="invalid-feedback">
                                {{ $errors->first('device') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.ticket.fields.title_helper') }}
                        </p>
                    </div>

                </div>
                <div class="col-sm-4">
                    <label class="justify-content-center">Buscar activo fijo</label>
                    <div class="row">
                        <div class="col-xl-12"><button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Busccar activo fijo <i class="fa-fw fas fa-search nav-icon"></i></button></div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog modal-xl" role="document" style="padding:2px !important">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title left" id="exampleModalLabel">Busqueda de activo fijo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">

                    <table class="table table-striped" id="datatable-Device">
                        <thead>
                        <tr>
                            <th>Cod activo fijo</th>
                            <th>Activo Fijo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Serie</th>
                            <th>Ubicación</th>
                            <th>Tipo</th>
                            <th>Area</th>
                            <th>Acciones</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach ($devices as $device)
                                <tr>
                                    <td id="codactf">{{$device->codactf}}</td>
                                    <td>{{$device->equipo}}</td>
                                    <td>{{$device->marca}}</td>
                                    <td>{{$device->modelo}}</td>
                                    <td>{{$device->serie}}</td>
                                    <td>{{$device->ubicacion}}</td>
                                    <td>{{$device->tipo}}</td>
                                    <td>{{$device->area->name}}</td>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="document.getElementById('device').value={{ $device->codactf }};document.getElementById('device_id').value={{ $device->id }};document.getElementById('nomDevice').value='{{ $device->equipo }}'">
                                        Seleccionar
                                        </button></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.ticket.fields.content') }}</label>
                <textarea id="content" name="content" class="form-control ">{{ old('content', isset($ticket) ? $ticket->content : '') }}</textarea>
                @if($errors->has('content'))
                    <em class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.content_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                <label for="attachments">{{ trans('cruds.ticket.fields.attachments') }}</label>
                <div class="needsclick dropzone" id="attachments-dropzone">

                </div>
                @if($errors->has('attachments'))
                    <em class="invalid-feedback">
                        {{ $errors->first('attachments') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.attachments_helper') }}
                </p>
            </div>

            <!-- Campo Servicio -->
            <div class="form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                <label for="area">{{ trans('cruds.ticket.fields.service') }}*</label>
                <select name="area_id" id="area" class="form-control select2" required>
                    @foreach($areas as $id => $area)
                        <option value="{{ $id }}" {{ (isset($ticket) && $ticket->area ? $ticket->area->id : old('area_id')) == $id ? 'selected' : '' }}>{{ $area }}</option>
                    @endforeach
                </select>
                @if($errors->has('area_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('area_id') }}
                    </em>
                @endif
            </div>
            @if(auth()->user()->isAdmin())
            <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.ticket.fields.status') }}*</label>
                <select name="status_id" id="status" class="form-control select2" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (isset($ticket) && $ticket->status ? $ticket->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status_id') }}
                    </em>
                @endif
            </div>
            @else
            <input type="hidden" name="status_id" value=1>
            @endif
            <div class="form-group {{ $errors->has('priority_id') ? 'has-error' : '' }}">
                <label for="priority">{{ trans('cruds.ticket.fields.priority') }}*</label>
                <select name="priority_id" id="priority" class="form-control select2" required>
                    @foreach($priorities as $id => $priority)
                        <option value="{{ $id }}" {{ (isset($ticket) && $ticket->priority ? $ticket->priority->id : old('priority_id')) == $id ? 'selected' : '' }}>{{ $priority }}</option>
                    @endforeach
                </select>
                @if($errors->has('priority_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('priority_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category">{{ trans('cruds.ticket.fields.category') }}*</label>
                <select name="category_id" id="category" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (isset($ticket) && $ticket->category ? $ticket->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('author_name') ? 'has-error' : '' }}">
                <label for="author_name">{{ trans('cruds.ticket.fields.author_name') }}</label>
                <input type="text" id="author_name" name="" class="form-control" value="{{auth()->user()->name}}" disabled>
                <input type="hidden" id="author_name" name="author_name" class="form-control" value="{{auth()->user()->name}}">
                @if($errors->has('author_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('author_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.author_name_helper') }}
                </p>
            </div>

        
            <div class="form-group {{ $errors->has('author_email') ? 'has-error' : '' }}">
                <label for="author_email">{{ trans('cruds.ticket.fields.author_email') }}</label>
                <input type="text" id="author_email" name="author_email" class="form-control" value="{{ old('author_email', isset($ticket) ? $ticket->author_email : '') }}">
                @if($errors->has('author_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('author_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.author_email_helper') }}
                </p>
            </div>


            @if(auth()->user()->isAdmin())
                <div class="form-group {{ $errors->has('assigned_to_user_id') ? 'has-error' : '' }}">
                    <label for="assigned_to_user">{{ trans('cruds.ticket.fields.assigned_to_user') }}</label>
                    <select name="assigned_to_user_id" id="assigned_to_user" class="form-control select2">
                        @foreach($assigned_to_users as $id => $assigned_to_user)
                            <option value="{{ $id }}" {{ (isset($ticket) && $ticket->assigned_to_user ? $ticket->assigned_to_user->id : old('assigned_to_user_id')) == $id ? 'selected' : '' }}>{{ $assigned_to_user }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('assigned_to_user_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('assigned_to_user_id') }}
                        </em>
                    @endif
                </div>
            @endif
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.tickets.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($ticket) && $ticket->attachments)
          var files =
            {!! json_encode($ticket->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

$(document).ready(function() {
    $('#datatable-Device').DataTable({
        "lengthMenu":[[5,10,50,-1], [5,10,50,"All"]]

    });
} );

</script>
@stop
