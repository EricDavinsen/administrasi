<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">No Cuti</th>
            <th scope="col" style="text-align:center">Nama</th>
            <th scope="col" style="text-align:center">Jenis Cuti</th>
            <th scope="col" style="text-align:center">Alasan</th>
            <th scope="col" style="text-align:center">Tanggal Mulai</th>
            <th scope="col" style="text-align:center">Tanggal Selesai</th>
            <th scope="col" style="text-align:center">Lama Cuti</th>
            <th scope="col" style="text-align:center">Sisa Cuti Tahunan</th>
            <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suratcuti as $item)
            <tr>
            <td>{{ $item->NO_CUTI }}</td>
            <td>{{ $item->pegawai->NAMA_PEGAWAI }}</td>
            <td>{{ $item->JENIS_CUTI }}</td>
            <td>{{ $item->ALASAN_CUTI }}</td>
            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
            @if($item->LAMA_CUTI == 0)
                <td>1 hari</td>  
            @else 
                <td>{{ $item->LAMA_CUTI }} hari</td>
            @endif
            <td>{{ $item->pegawai->SISA_CUTI_TAHUNAN }}</td>
            <td>
                <div class="action-buttons d-flex w-100  h-10 justify-content-center gap-2">
                    <a href="{{ url('/editsuratcuti/'.$item->id) }}" class="btn btn-info">Edit</a> 
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal{{$item->id}}">Delete</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenters-{{$item->id}}">View</button>
                    <button onclick="confirmResetCuti({{ $item->pegawai_id }})" class="btn btn-dark" style="color:white; font-size:10px; text-center">Reset Cuti</button> 
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmResetCuti(cutiId) {
        var confirmation = confirm("Apakah anda ingin mereset sisa cuti tahunan?");
        if (confirmation) {
            window.location.href = "{{ url('/resetcuti/') }}" + '/' + cutiId;
        }
    }
</script>