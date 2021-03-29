@extends('layouts.admin')
@section('content')
@can('priority_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.priorities.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.priority.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.priority.title') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Priority">
                <thead>
                    <tr>

                        <th>
                            {{ trans('cruds.priority.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.priority.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.priority.fields.color') }}
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($priorities as $key => $priority)
                        <tr data-entry-id="{{ $priority->id }}">

                            <td>
                                {{ $priority->id ?? '' }}
                            </td>
                            <td>
                                {{ $priority->name ?? '' }}
                            </td>
                            <td style="background-color:{{ $priority->color ?? '#FFFFFF' }}"></td>
                            <td>
                                @can('priority_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.priorities.show', $priority->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('priority_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.priorities.edit', $priority->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('priority_delete')
                                    <form action="{{ route('admin.priorities.destroy', $priority->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Priority:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection