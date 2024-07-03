<div style="width:100%; overflow-x:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
                <th scope="col" style="text-align:center">No</th>
                <th scope="col" style="text-align:center">No JKN</th>
                <th scope="col" style="text-align:center">No Kartu Keluarga</th>
                <th scope="col" style="text-align:center">NIK</th>
                <th scope="col" style="text-align:center">NIP</th>
                <th scope="col" style="text-align:center">Nama Lengkap</th>
                <th scope="col" style="text-align:center">Tanggal Lahir</th>
                <th scope="col" style="text-align:center">Jenis Kelamin</th>
                <th scope="col" style="text-align:center">Hub Keluarga</th>
                <th scope="col" style="text-align:center">Status Kawin</th>
                <th scope="col" style="text-align:center">TMT Pegawai</th>
                <th scope="col" style="text-align:center">Gaji Pokok</th>
                <th scope="col" style="text-align:center">Nama Faskes</th>
                <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($databpjs as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->NOMOR_JKN }}</td>
                    <td>{{ $item->pegawai->NO_KK }}</td>
                    <td>{{ $item->NIK }}</td>
                    <td>{{ $item->NIP }}</td>
                    <td>{{ $item->keluarga->NAMA_KELUARGA }}</td>
                    <td>{{\Carbon\Carbon::parse($item->keluarga->TANGGAL_LAHIR)->format('d-m-Y') }}</td>
                    <td>{{ $item->keluarga->JENIS_KELAMIN }}</td>  
                    <td>{{ $item->keluarga->STATUS }}</td> 
                    <td>{{ $item->STATUS_KAWIN }}</td>

                    <td>
                        @if ($item->TANGGAL_MULAI_TMT === null && $item->TANGGAL_SELESAI_TMT === null)
                            -
                        @else
                            {{ \Carbon\Carbon::parse($item->TANGGAL_MULAI_TMT)->format('d-m-Y') }} s.d {{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI_TMT)->format('d-m-Y') }}
                        @endif
                    </td>

                    <td>
                        @if ($item->GAJI_POKOK === null)
                             - 
                        @else
                            Rp. {{ $item->GAJI_POKOK }}
                        @endif
                    </td>

                    <td>{{ $item->NAMA_FASKES }}</td>
                    <td>
                        <div class="action-buttons d-flex w-100 justify-content-center gap-2">
                            <a href="{{ url('/editdatabpjs/'.$item->id) }}" class="btn btn-info text-white">
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