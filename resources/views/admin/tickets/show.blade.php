@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.ticket.title') }}
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.id') }}
                            </th>
                            <td>
                                {{ $ticket->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.created_at') }}
                            </th>
                            <td>
                                {{ $ticket->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.title') }}
                            </th>
                            <td>
                                {{ $ticket->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.device') }}
                            </th>
                            <td>
                                {{ $ticket->device->equipo }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.codactf') }}
                            </th>
                            <td>
                                {{ $ticket->device->codactf }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.area') }}
                            </th>
                            <td>
                                {{ $ticket->area->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.content') }}
                            </th>
                            <td>
                                {!! $ticket->content !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.attachments') }}
                            </th>
                            <td>
                                @foreach ($ticket->attachments as $attachment)
                                    <a href="{{ $attachment->getUrl() }}" target="_blank">{{ $attachment->file_name }}</a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.status') }}
                            </th>
                            <td>
                                {{ $ticket->status->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.closed_at') }}
                            </th>
                            <td>
                                {{ $ticket->closed_at ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.priority') }}
                            </th>
                            <td>
                                {{ $ticket->priority->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.category') }}
                            </th>
                            <td>
                                {{ $ticket->category->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.author_name') }}
                            </th>
                            <td>
                                {{ $ticket->author_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.author_email') }}
                            </th>
                            <td>
                                {{ $ticket->author_email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.assigned_to_user') }}
                            </th>
                            <td>
                                {{ $ticket->assigned_to_user->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.comments') }}
                            </th>
                            <td>
                                @forelse ($ticket->comments as $comment)
                                    <div class="row">
                                        <div class="col">
                                            <p class="font-weight-bold"><a
                                                    href="mailto:{{ $comment->author_email }}">{{ $comment->author_name }}</a>
                                                ({{ $comment->created_at }})</p>
                                            <p>{{ $comment->comment_text }}</p>
                                        </div>
                                    </div>
                                    <hr />
                                @empty
                                    <div class="row">
                                        <div class="col">
                                            <p>No hay comentarios.</p>
                                        </div>
                                    </div>
                                    <hr />
                                @endforelse

                                @if ($ticket->status_id < 2)
                                    <form action="{{ route('admin.tickets.storeComment', $ticket->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="comment_text">Leave a comment</label>
                                            <textarea class="form-control" id="comment_text" name="comment_text" rows="3"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">@lang('global.submit')</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ticket.fields.description') }}
                            </th>
                            <td>
                                {{ $ticket->description ?? '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a class="btn btn-default my-2" href="{{ route('admin.tickets.index') }}">
                {{ trans('global.back_to_list') }}
            </a>

            <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-primary">
                @lang('global.edit') @lang('cruds.ticket.title_singular')
            </a>

            @if ($ticket->status_id < 2)
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#closeTicketModal"
                    data-whatever="@mdo">@lang('global.close') @lang('cruds.ticket.title_singular')</button>
            @endif

            <form action="{{ route('admin.tickets.closeTicket', $ticket->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal fade" id="closeTicketModal" tabindex="-1" aria-labelledby="closeTicketModal"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="closeTicketModal">@lang('global.close')
                                    @lang('cruds.ticket.title_singular')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Observaciones:</label>
                                    <textarea class="form-control" id="message-text" name="description"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <nav class="mb-3">
                <div class="nav nav-tabs">

                </div>
            </nav>
        </div>
    </div>
@endsection
