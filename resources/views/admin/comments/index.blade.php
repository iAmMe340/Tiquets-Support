@extends('layouts.admin')
@section('content')
@can('comment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.comments.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.comment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.comment.title') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Comment">
                <thead>
                    <tr>

                        <th>
                            {{ trans('cruds.comment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.ticket') }}
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.author_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.author_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.comment_text') }}
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $key => $comment)
                        <tr data-entry-id="{{ $comment->id }}">

                            <td>
                                {{ $comment->id ?? '' }}
                            </td>
                            <td>
                                {{ $comment->ticket->title ?? '' }}
                            </td>
                            <td>
                                {{ $comment->author_name ?? '' }}
                            </td>
                            <td>
                                {{ $comment->author_email ?? '' }}
                            </td>
                            <td>
                                {{ $comment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $comment->comment_text ?? '' }}
                            </td>
                            <td>
                                @can('comment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.comments.show', $comment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('comment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.comments.edit', $comment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('comment_delete')
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  $('.datatable-Comment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection