<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Instansi</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                            $no=1;
                            @endphp
                            @foreach ($pegawai as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NAMA_PEGAWAI }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y') }}</td>
                            <td>{{ $item->JENIS_KELAMIN }}</td>
                            <td>{{ $item->INSTANSI }}</td>
                            <td>{{ $item->JABATAN }}</td>
                            <td>{{ $item->STATUS_PEGAWAI }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editpegawai/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletepegawai/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/dashboardpegawai/'.$item->id) }}" class="btn btn-warning" style="color:white">Preview</a> 
                                </div>
                            </td>
                            </tr>
                      
                            @endforeach
                        </tbody>
                    </table>