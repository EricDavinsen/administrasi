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
            <td>{{ $item->pegawai->SISA_CUTI_TAHUNAN }} hari</td>
            <td>
                <div class="action-buttons d-flex justify-content-center gap-2" >
                    <a href="{{ url('/editsuratcuti/'.$item->id) }}" class="btn btn-info">
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
                    <button class="btn btn-dark" onclick="showConfirmationModal({{ $item->pegawai_id }})" style="color:white; width: 130px; font-size: 15px; text-center">
                    <div class="d-flex gap-2">
                        <box-icon name='reset' color="white" animation='tada-hover'></box-icon>
                        <span>Reset Cuti</span>
                    </div>
                    </button> 
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda ingin mereset jumlah cuti tahunan?
            </div>
                <div class="modal-footer">
            <input type="hidden" id="pegawaiIdInput">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmResetBtn">Reset</button>
            </div>
            </div>
        </div>
    </div>

<script>
    function showConfirmationModal(pegawaiId) {
        $('#pegawaiIdInput').val(pegawaiId);
        $('#confirmationModal').modal('show');
    }

    $('#confirmResetBtn').click(function() {
        var pegawaiId = $('#pegawaiIdInput').val();
        window.location.href = "{{ url('/resetcuti/') }}" + '/' + pegawaiId;
    });
</script>