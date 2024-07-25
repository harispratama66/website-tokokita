<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>History Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">History Penjualan</li>
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
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title"><i class="fas fa-list"></i> Daftar Pesanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>ID Order</th>
                                        <th>ID Konsumen</th>
                                        <th>Tanggal Order</th>
                                        <th>Status Order</th>
                                        <th>Kurir</th>
                                        <th>Ongkir</th>
                                        <th>Nomor Resi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($orders as $order): ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $order->idOrder; ?></td>
                                        <td><?php echo $order->idKonsumen; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($order->tglOrder)); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo $order->statusOrder == 'Selesai' ? 'success' : 'warning'; ?>">
                                                <?php echo $order->statusOrder; ?>
                                            </span>
                                        </td>
                                        <td><?php echo $order->kurir; ?></td>
                                        <td><?php echo 'Rp' . number_format($order->ongkir, 2, ',', '.'); ?></td>
                                        <td><?php echo $order->nomorResi; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo site_url('order/ubah_status/'.$order->idOrder);?>" class="btn btn-warning btn-sm"><i class="fas fa-sync-alt"></i> Ubah Status</a>
                                                <a href="<?php echo site_url('order/delete/'.$order->idOrder);?>" onclick="return confirm('Apakah kamu yakin ingin menghapus pesanan ini?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
