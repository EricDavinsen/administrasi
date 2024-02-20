<div style="width:100%;overflow:auto; ">
    <table id="dtHorizontalExample" class="table table-bordered table-striped table-sm scroll" style="width:100%" cellspacing="0" width="100%">
                        <thead class="text-center">
                            <tr>
                            <th scope="col" width="10%">No</th>
                            <th scope="col" width="20%">Tahun Penilaian</th>
                            <th scope="col" width="70%">Aksi</th>
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
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editpenilaiantahunan/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletepenilaiantahunan/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/tampilpenilaiantahunan/'.$item->id) }}" class="btn btn-warning" style="color:white">Nilai</a>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>