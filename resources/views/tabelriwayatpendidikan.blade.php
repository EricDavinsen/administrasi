<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Tahun Lulus</th>
                            <th scope="col">STTB</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
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
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editriwayatpendidikan/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deleteriwayatpendidikan/'.$item->id) }}" method="POST">
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