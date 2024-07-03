<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" width="10%" style="text-align:center">No</th>
            <th scope="col" width="20%" style="text-align:center">Tahun Penilaian</th>
            <th scope="col" width="70%" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($penilaiantahunan as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->TAHUN_PENILAIAN }}</td>
            <td>
                <div class="action-buttons d-flex w-100 h-10 justify-content-center gap-2">
                    <a href="{{ url('/editpenilaiantahunan/'.$item->id) }}" class="btn btn-info">
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