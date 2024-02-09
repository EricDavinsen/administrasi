<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Surat</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
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
                                <td>{{ $item->NAMA }}</td>
                                <td>
                                    <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                    <a href="{{ url('/editdisposisi/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletedisposisi/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        <a href="{{ url('/tampildisposisi/'.$item->id) }}" class="btn btn-warning" style="color:white">Hasil</a> 
                                        <a href="{{ url('/lembardisposisi/' . $item->id) }}" class="btn btn-success">Lembar Disposisi</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>