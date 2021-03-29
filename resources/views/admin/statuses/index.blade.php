@extends('layouts.admin')
@section('content')
@can('status_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.statuses.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.status.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.status.title') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Status">
                <thead>
                    <tr>

                        <th>
                            {{ trans('cruds.status.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.status.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.status.fields.color') }}
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statuses as $key => $status)
                        <tr data-entry-id="{{ $status->id }}">

                            <td>
                                {{ $status->id ?? '' }}
                            </td>
                            <td>
                                {{ $status->name ?? '' }}
                            </td>
                            <td style="background-color:{{ $status->color ?? '#FFFFFF' }}"></td>
                            <td>
                                @can('status_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.statuses.show', $status->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('status_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.statuses.edit', $status->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('status_delete')
                                    <form action="{{ route('admin.statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  $('.datatable-Status:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection