@extends('admin_layout.admin')

@section('content')
{{Form::hidden('', $increment=1)}}

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sliders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sliders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tất cả Sliders</h3>
              </div>
              @if (Session::has('status'))
              <div class="alert alert-success">
                {{Session::get('status')}}
              </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả 1</th>
                    <th>Mô tả 2</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($sliders as $slider)
                  <tr>
                    <td>{{$increment}}</td>
                    <td>
                      <img src="/storage/slider_images/{{$slider->slider_image}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                    </td>
                    <td>
                      {{$slider->description1}}
                    </td>
                    <td>{{$slider->description2}}</td>
                    <td>
                      @if ($slider->status==1)
                      <a href="{{url('/unactivate_slider/'.$slider->id)}}" class="btn btn-success">Tắt</a>
                     @else
                     <a href="{{url('/activate_slider/'.$slider->id)}}" class="btn btn-warning">Hiển thị</a>

                      @endif

                      <a href="{{url('/edit_slider/'.$slider->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                      <a href="{{url('/delete_slider/'.$slider->id)}}" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                    </td>
                  </tr>

                    {{Form::hidden('', $increment=$increment+1)}}

                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả 1</th>
                        <th>Mô tả 2</th>
                        <th>Hành động</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('style')
<link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endsection


@section('scripts')
<!-- DataTables -->
<script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="backend/dist/js/bootbox.min.js"></script>
<!-- page script -->

<script>
  $(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
    if (confirmed){
        window.location.href = link;
      };
    });
  });
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
            processing: "Lấy dữ liệu",
            search: "Tìm kiếm",
            lengthMenu: "Số lượng slider mỗi trang _MENU_",
            info: "Bản ghi từ _START_ đến _END_ trong số _TOTAL_ bản ghi",
            infoEmpty: "Khi không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
            infoFiltered: "(Message bổ sung cho info khi không search đc record nào _MAX_)",
            loadingRecords: "",
            zeroRecords: "Khi tìm kiếm không match với record nào",
            emptyTable: "Không có dữ liệu",
            paginate: {
                first: "Trang đầu",
                previous: "Trang trước",
                next: "Trang sau",
                last: "Trang cuối"
            },
            aria: {
                sortAscending: ": Sắp xếp cột",
                sortDescending: ": Sắp xếp cột",
            }
        },
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      language: {
            processing: "Lấy dữ liệu",
            search: "Tìm kiếm",
            lengthMenu: "Số lượng slider mỗi trang _MENU_",
            info: "Bản ghi từ _START_ đến _END_ trong số _TOTAL_ bản ghi",
            infoEmpty: "Khi không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
            infoFiltered: "(Message bổ sung cho info khi không search đc record nào _MAX_)",
            loadingRecords: "",
            zeroRecords: "Khi tìm kiếm không match với record nào",
            emptyTable: "Không có dữ liệu",
            paginate: {
                first: "Trang đầu",
                previous: "Trang trước",
                next: "Trang sau",
                last: "Trang cuối"
            },
            aria: {
                sortAscending: ": Sắp xếp cột",
                sortDescending: ": Sắp xếp cột",
            }
        },
    });
  });
</script>
@endsection
