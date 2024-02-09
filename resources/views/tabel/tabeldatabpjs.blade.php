<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">No JKN</th>
                            <th scope="col">No Kartu Keluarga</th>
                            <th scope="col">NIK</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Status Kawin</th>
                            <th scope="col">Hub. Keluarga</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">TMT Pegawai</th>
                            <th scope="col">Gaji Pokok</th>
                            <th scope="col">Nama Faskes</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($databpjs as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NOMOR_JKN }}</td>
                            <td>{{ $item->pegawai->NO_KK }}</td>
                            <td>{{ $item->NIK }}</td>
                            <td>{{ $item->NIP }}</td>
                            <td>{{ $item->NAMA_LENGKAP}}</td>
                            <td>{{ $item->JENIS_KELAMIN }}</td>
                            <td>{{ $item->STATUS_KAWIN}}</td>
                            <td>{{ $item->HUBUNGAN_KELUARGA }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y') }}</td>
                            <td>
                                @if ($item->TANGGAL_MULAI_TMT === null && $item->TANGGAL_SELESAI_TMT === null)
                                    -
                                @else
                                {{ \Carbon\Carbon::parse($item->TANGGAL_MULAI_TMT)->format('d-m-Y') }} s.d {{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI_TMT)->format('d-m-Y') }}
                                @endif
                            </td>
                            <td>{{ $item->GAJI_POKOK }}</td>
                            <td>{{ $item->NAMA_FASKES }}</td>
                            <td>{{ $item->NO_TELEPON }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editdatabpjs/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletedatabpjs/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>