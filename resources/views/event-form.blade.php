<x-modal-action action="{{ $action }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <p>Tanggal Mulai:</p>
                <input type="text" name="start_date" readonly value="{{ $data->start_date ?? request()->start_date }}" class="form-control datepicker">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <p>Tanggal Selesai:</p>
                <input type="text" name="end_date" readonly value="{{ $data->end_date ?? request()->end_date }}" class="form-control datepicker">
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <!-- <textarea name="title" class="form-control mb-3"  rows="10" style="height:100%;">{{ $data->title }}</textarea> -->
                <p >Judul Acara:</p>
                <input type="text" name="title"  value="{{$data->title ?? request()->title}}" class="form-control mb-3">
                <div class="row">
                    <div class="col-6">
                        <p >Waktu Mulai:</p>
                        <input id="clockactrue_1" value="{{$data->start_time ?? request()->start_time}}" name="start_time" class="form-control clockpicker" type="text"/>
                    </div>
                    <div class="col-6">
                        <p >Waktu Selesai:</p>
                        <input id="clockactrue_2" value="{{$data->end_time ?? request()->end_time}}" name="end_time" class="form-control clockpicker" type="text"/>
                    </div>
                </div>
            </div>
                
                <p>Tempat:</p>
                    <input type="text" name="location"  value="{{$data->location ?? request()->location}}" class="form-control mb-3">

                <p>Disposisi:</p>
                    <input type="text" name="disposition"  value="{{$data->disposition ?? request()->disposition}}" class="form-control mb-3">
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'success' ? 'checked' : null }} type="radio" name="category" id="category-success" value="success">
                    <label class="form-check-label" for="category-success">Hijau</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'danger' ? 'checked' : null }} type="radio" name="category" id="category-danger" value="danger">
                    <label class="form-check-label" for="category-danger">Merah</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'warning' ? 'checked' : null }} type="radio" name="category" id="category-warning" value="warning">
                    <label class="form-check-label" for="category-warning">Kuning</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" {{ $data->category == 'info' ? 'checked' : null }} type="radio" name="category" id="category-info" value="info">
                    <label class="form-check-label" for="category-info">Biru</label>
                  </div>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="delete" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Hapus Agenda</label>
                  </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('/timepicker/bootstrap-clockpicker.min.js') }}"></script>

    <script type="text/javascript">
     $('#clockactrue_1').clockpicker({
        autoclose: true
    });
     $('#clockactrue_2').clockpicker({
        autoclose: true
    });
    </script>
</x-modal-action>