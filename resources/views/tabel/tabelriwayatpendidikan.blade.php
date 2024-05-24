<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">No</th>
            <th scope="col" style="text-align:center">Nama Sekolah</th>
            <th scope="col" style="text-align:center">Jurusan</th>
            <th scope="col" style="text-align:center">Tahun Lulus</th>
            <th scope="col" style="text-align:center">STTB</th>
            <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($riwayatpendidikan as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->NAMA_SEKOLAH }}</td>
            <td>{{ $item->JURUSAN }}</td>
            <td>{{ $item->TAHUN_LULUS }}</td>
            <td>{{ $item->STTB }}</td>
            <td>
                <div class="action-buttons d-flex w-100 h-10 justify-content-center gap-2">
                    <a href="{{ url('/editriwayatpendidikan/'.$item->id) }}" class="btn btn-info">Edit</a> 
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal{{$item->id}}">Delete</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenters-{{$item->id}}">Ijazah</button>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>