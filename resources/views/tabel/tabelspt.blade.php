<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">No SPT</th>
            <th scope="col" style="text-align:center">Tanggal SPT</th>
            <th scope="col" style="text-align:center">Nama</th>
            <th scope="col" style="text-align:center">Tanggal Mulai</th>
            <th scope="col" style="text-align:center">Tanggal Selesai</th>
            <th scope="col" style="text-align:center">Lama Tugas</th>
            <th scope="col" style="text-align:center">Keperluan</th>
            <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spt as $item)
            <tr>
            <td>{{ $item->NO_SPT }}</td>
            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SPT)->format('d-m-Y') }}</td>
            <td> {{ $item->pegawais->pluck('NAMA_PEGAWAI')->implode(', ') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
            @if($item->LAMA_TUGAS == 0)
                <td>1 hari</td>  
            @else 
                <td>{{ $item->LAMA_TUGAS }} hari</td>
            @endif
            <td>{{ $item->KEPERLUAN }}</td>
            <td>
                <div class="action-buttons d-flex w-100  h-10 justify-content-center gap-2">
                    <a href="{{ url('/editspt/'.$item->id) }}" class="btn btn-info">
                        <div class="d-flex gap-2">
                            <box-icon type='solid' name='edit' color="white" animation='tada-hover'></box-icon>
                            <span>Edit</span>
                        </div>
                    </a>
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                        <div class="d-flex gap-2">
                            <box-icon type='solid' name='trash-alt' color="white" animation='tada-hover'></box-icon>
                            <span>Hapus</span>
                        </div>
                    </a>
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-1" data-toggle="modal" data-target="#exampleModalCenters-{{$item->id}}">
                        <box-icon type='solid' name='file-pdf' animation='tada-hover' color='white'></box-icon>
                        File
                    </button>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>