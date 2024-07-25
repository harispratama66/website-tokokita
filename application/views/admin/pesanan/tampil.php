<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pesanan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pesanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>ID Order</th>
                                        <th>ID Konsumen</th>
                                        <th>ID Toko</th>
                                        <th>Tanggal Order</th>
                                        <th>Status Order</th>
                                        <th>Kurir</th>
                                        <th>Ongkir</th>
                                        <th>Nomor Resi</th>
                                        <th style="width: 200px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($orders as $order): ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $order->idOrder; ?></td>
                                        <td><?php echo $order->idKonsumen; ?></td>
                                        <td><?php echo $order->idToko; ?></td>
                                        <td><?php echo $order->tglOrder; ?></td>
                                        <td><?php echo $order->statusOrder; ?></td>
                                        <td><?php echo $order->kurir; ?></td>
                                        <td><?php echo $order->ongkir; ?></td>
                                        <td><?php echo $order->nomorResi; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo site_url('order/ubah_status/'.$order->idOrder);?>" class="btn btn-warning">Ubah Status</a>
                                                <a href="<?php echo site_url('order/delete/'.$order->idOrder);?>" onclick="return confirm('Apakah kamu yakin ingin menghapus pesanan ini?');" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
