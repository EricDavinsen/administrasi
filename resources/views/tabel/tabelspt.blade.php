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
            <td>{{ $item->pegawai->NAMA_PEGAWAI }}</td>
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
                    <a href="{{ url('/editspt/'.$item->id) }}" class="btn btn-info">Edit</a> 
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal{{$item->id}}">Delete</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenters-{{$item->id}}">View</button>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>