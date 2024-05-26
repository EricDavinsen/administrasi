<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">Nomor Surat</th>
            <th scope="col" style="text-align:center">Tanggal Surat</th>
            <th scope="col" style="text-align:center">Jenis Surat</th>
            <th scope="col" style="text-align:center">Tujuan</th>
            <th scope="col" style="text-align:center">Sifat</th>
            <th scope="col" style="text-align:center">Perihal</th>
            <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suratkeluar as $item)
            <tr>
            <td>{{ $item->NOMOR_SURAT }}</td>
            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SURAT)->format('d-m-Y') }}</td>
            <td>{{ $item->jenis->JENIS_SURAT }}</td>
            <td>{{ $item->TUJUAN_SURAT }}</td>
            <td>{{ $item->SIFAT_SURAT }}</td>
            <td>{{ $item->PERIHAL_SURAT }}</td>
            <td>
                <div class="action-buttons d-flex w-100 h-10 justify-content-center gap-2">
                    <a href="{{ url('/editsuratkeluar/'.$item->id) }}" class="btn btn-info">Edit</a> 
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal{{$item->id}}">Delete</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenters-{{$item->id}}">View</button>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>