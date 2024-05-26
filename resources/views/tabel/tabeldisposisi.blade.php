<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">No</th>
            <th scope="col" style="text-align:center">Kode Surat</th>
            <th scope="col" style="text-align:center">Diteruskan</th>
            <th scope="col" style="text-align:center">Nama</th>
            <th scope="col" style="text-align:center">Instruksi</th>
            <th scope="col" style="text-align:center">Informasi Lainnya</th>
            <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($disposisi as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->surat->KODE_SURAT }}</td>
                    <td>{{ $item->PENERUS }}</td>
                    <td>{{ $item->pegawai->NAMA_PEGAWAI }}</td>
                    <td>{{ $item->INSTRUKSI }}</td>
                    <td>{{ $item->INFORMASI_LAINNYA}}</td>
                    <td>
                        <div class="action-buttons d-flex w-100 h-10 justify-content-center gap-2">
                            <a href="{{ url('/editdisposisi/'.$item->id) }}" class="btn btn-info">Edit</a> 
                            <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal{{$item->id}}">Delete</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenters-{{$item->id}}">Hasil Disposisi</button>
                            <a href="{{ url('/lembardisposisi/' . $item->id) }}" class="btn btn-success">Lembar Disposisi</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>