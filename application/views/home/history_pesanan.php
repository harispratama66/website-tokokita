<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riwayat Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Riwayat Pesanan</li>
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
                            <h3 class="card-title">Daftar Pesanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>ID Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Status Order</th>
                                        <th>Kurir</th>
                                        <th>Ongkir</th>
                                        <th>Nomor Resi</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($orders as $order): ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $order->idOrder; ?></td>
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
                                            <?php if($order->statusOrder == 'Selesai' && is_null($order->rating)): ?>
                                                <form action="<?php echo base_url('Main/rate_order'); ?>" method="post" class="rating-form">
                                                    <input type="hidden" name="idOrder" value="<?php echo $order->idOrder; ?>">
                                                    <div class="rating">
                                                        <i class="far fa-star" data-value="1"></i>
                                                        <i class="far fa-star" data-value="2"></i>
                                                        <i class="far fa-star" data-value="3"></i>
                                                        <i class="far fa-star" data-value="4"></i>
                                                        <i class="far fa-star" data-value="5"></i>
                                                    </div>
                                                    <input type="hidden" name="rating" value="" required>
                                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
                                                </form>
                                            <?php else: ?>
                                                <?php echo is_null($order->rating) ? 'Belum Dinilai' : str_repeat('★', $order->rating) . str_repeat('☆', 5 - $order->rating); ?>
                                            <?php endif; ?>
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

<script>
$(document).ready(function() {
    $('.rating .fa-star').on('click', function() {
        var rating = $(this).data('value');
        $(this).siblings('input[name="rating"]').val(rating);
        $(this).siblings('.fa-star').removeClass('fas').addClass('far');
        $(this).prevAll('.fa-star').addBack().removeClass('far').addClass('fas');
    });
});
</script>
