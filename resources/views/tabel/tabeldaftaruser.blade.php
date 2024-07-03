<div style="width:100%; overflow:auto;" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
    <table id="myTable" class="table table-bordered table-striped table-sm scroll table-light" style="width:100%" cellspacing="0">
        <thead class="text-center">
            <tr>
            <th scope="col" style="text-align:center">No</th>
            <th scope="col" style="text-align:center">Username</th>
            <th scope="col" style="text-align:center">Email</th>
            <th scope="col" style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @php
            $no=1;
            @endphp
            @foreach ($user as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                    <a href="{{ url('/edituser/'.$item->id) }}" class="btn btn-info">
                        <div class="d-flex gap-2">
                            <box-icon type='solid' name='edit' color="white" animation='tada-hover'></box-icon>
                            <span>Edit</span>
                        </div>
                    </a>
                    @if ($item->email != "admin")
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                    <div class="d-flex gap-2">
                            <box-icon type='solid' name='trash-alt' color="white" animation='tada-hover'></box-icon>
                            <span>Hapus</span>
                        </div>
                    </a>
                    @endif
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>