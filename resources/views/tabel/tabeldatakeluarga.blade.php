<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">No</th>
            <th scope="col" style="text-align:center">Nama</th>
            <th scope="col" style="text-align:center">Tanggal Lahir</th>
            <th scope="col" style="text-align:center">Jenis Kelamin</th>
            <th scope="col" style="text-align:center">Status</th>
            <th scope="col" style="text-align:center">Pekerjaan</th>
            <th scope="col" style="text-align:center">No Telepon</th>
            <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($datakeluarga as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->NAMA_KELUARGA }}</td>
            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y') }}</td>
            <td>{{ $item->JENIS_KELAMIN }}</td>
            <td>{{ $item->STATUS }}</td>
            <td>{{ $item->PEKERJAAN }}</td>
            <td>{{ $item->NO_TELEPON }}</td>
            <td>
                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                    <a href="{{ url('/editdatakeluarga/'.$item->id) }}" class="btn btn-info">
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
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>