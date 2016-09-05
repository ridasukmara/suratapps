<!-- Id Suratmasuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_suratmasuk', 'Id Suratmasuk:') !!}
    {!! Form::text('id_suratmasuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Diterima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_diterima', 'Tanggal Diterima:') !!}
    {!! Form::date('tanggal_diterima', Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<!-- No Agenda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_agenda', 'No Agenda:') !!}
    {!! Form::text('no_agenda', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.agendasuratmasuks.index') !!}" class="btn btn-default">Cancel</a>
</div>
