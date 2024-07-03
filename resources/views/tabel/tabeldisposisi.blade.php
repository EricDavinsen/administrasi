<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">No</th>
            <th scope="col" style="text-align:center">Kode Surat</th>
            <th scope="col" style="text-align:center">Nomor Surat</th>
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
                    <td>{{ $item->surat->NOMOR_SURAT }}</td>
                    <td>{{ $item->PENERUS }}</td>
                    <td> {{ $item->pegawais->pluck('NAMA_PEGAWAI')->implode(', ') }}</td>
                    <td>{{ $item->INSTRUKSI }}</td>
                    <td>{{ $item->INFORMASI_LAINNYA}}</td>
                    <td>
                        <div class="action-buttons d-flex justify-content-center gap-2" >
                            <a href="{{ url('/editdisposisi/'.$item->id) }}" class="btn btn-info">
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
                            <a href="{{ url('/lembardisposisi/' . $item->id) }}" class="btn btn-success text-wrap d-flex align-items-centeer gap-1" style="width: 180px">
                                <box-icon type='solid' name='file' animation='tada-hover' color='white'></box-icon>
                                <span>Lembar Disposisi</span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>