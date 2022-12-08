<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Voucher[]|\Cake\Collection\CollectionInterface $vouchers
 */
?>
<!-- Start content -->

<div class="list-combo mb20 mt20">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="list-location border-bottom-blue pl30 pt20 pb20 mb20">
                    <a data-toggle="modal" data-target="#addingvoucher" class="text-super-dark semi-bold fs18">
                        ĐĂNG BÁN HOT VOUCHER
                    </a>
                </div>
                <?= $this->element('Front/sidebar_voucher') ?>       
            </div>
            <div class="col-sm-27">
                <div class="list-location mb30 pc">
                    <div class="row">
                        <div class="col-sm-22">
                            <div class="mt20 pb20 ml20">
                                <span class="fs16 pb05" >Sắp xếp theo</span>
                            </div>
                        </div>
                        <div class="col-sm-14">
                            <div class="row">
                                <div class="col-sm-18 mt20">
                                    <a class="fs16 btn-sort text-dark <?= (isset($sortPrice) && $sortPrice == 'ASC') ? 'active' : '' ?> pb10" href="?sort=ASC" >Giá tăng dần <i class="fas fa-long-arrow-alt-up"></i></a>
                                </div>
                                <div class="col-sm-18 mt20">
                                    <a class="fs16 btn-sort text-dark <?= (isset($sortPrice) && $sortPrice == 'DESC') ? 'active' : '' ?> pb10" href="?sort=DESC" >Giá giảm dần <i class="fas fa-long-arrow-alt-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-location mb30 mt30 sp">
                    <div class="row">
                        <div class="col-xs-36">
                            <div class="mt20 text-center">
                                <span class="fs20 pb05" >Sắp xếp theo</span>
                            </div>
                        </div>
                        <div class="col-xs-36">
                            <div class="col-xs-18 mt20 mb20">
                                <a class="fs16 btn-sort text-dark pl10 <?= (isset($sortPrice) && $sortPrice == 'ASC') ? 'active' : '' ?> pb10" href="?sort=ASC" >Giá tăng dần <i class="fas fa-long-arrow-alt-up"></i></a>
                            </div>
                            <div class="col-xs-18 mt20 mb20 text-right">
                                <a class="fs16 btn-sort text-dark pl15 <?= (isset($sortPrice) && $sortPrice == 'DESC') ? 'active' : '' ?> pb10" href="?sort=DESC" >Giá giảm dần <i class="fas fa-long-arrow-alt-down"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="list-location">
                    <div class="row">
                        <div class="col-sm-36">
                            <div class="mt20 pb30 text-center">
                                <span class="semi-bold fs24 box-underline-center pb05" style="text-transform: uppercase;">ĐIỂM ĐẾN <?= $location->name ?></span>
                            </div>
                            <div class="p15">                                
                                <div class="row">
                                    <?php foreach ($vouchers as $key => $voucher): ?>
                                        <div class="col-sm-12 mb15">
                                            <div class="combo-item border-bottom-blue">
                                                <div class="wrap-content rectangle-image-v2">
                                                    <a href="<?= \Cake\Routing\Router::url(['_name' => 'voucher.view', 'slug' => $voucher->slug]) ?>">
                                                        <?php if (file_exists($voucher->thumbnail)): ?>
                                                            <img class="image" src="<?= $this->Url->assetUrl('/' . $voucher->thumbnail) ?>" />
                                                        <?php else: ?>
                                                            <img class="image" src="<?= $this->Url->assetUrl('frontend/img/no-thumbnail.png') ?>" />
                                                        <?php endif; ?>     
                                                    </a>
                                                    <div class="top-left text-white">
                                                        <p><i class="fas fa-map-marker-alt text-pink fs16"></i>&nbsp;&nbsp;<?= $voucher->departure->name ?></p>
                                                    </div>
                                                    <div class="top-right text-white">
                                                        <p><i class="fas fa-chevron-circle-right main-color fs16"></i>&nbsp;&nbsp;<?= $voucher->destination->name ?></p>
                                                    </div>
                                                    <div class="middle-button">
                                                        <div class="button-text text-center ">
                                                            <a class="fs12" href="<?= \Cake\Routing\Router::url(['_name' => 'voucher.view', 'slug' => $voucher->slug]) ?>">XEM NGAY</a>
                                                        </div>
                                                        <div class="combo-bio">
                                                            <p>Hạn đặt: <?= date_format($voucher->start_date, 'd/m/Y') ?>|<i class="fas fa-clock"></i> còn <?= $this->System->diffDate($voucher->start_date) ?> ngày</p>
                                                        </div>
                                                    </div>
                                                    <div class="image-bottom-content combo-rating fs13 pl05">
                                                        <div class="row">
                                                            <div class="col-sm-22 col-xs-25">
                                                                <p class="pc"><?= $this->System->splitByWords($voucher->name, 15) ?></p>
                                                                <p class="sp"><?= $this->System->splitByWords($voucher->name, 30) ?></p>
                                                            </div>
                                                            <div class="col-sm-14 col-xs-11">
                                                                <p class="star-rating text-right" data-point="<?= $voucher->rating ?>"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="combo-detail pb05">
                                                    <div class="voucher-name semi-bold">
                                                        <a class="semi-bold text-super-dark fs16" href="<?= \Cake\Routing\Router::url(['_name' => 'voucher.view', 'slug' => $voucher->slug]) ?>"><?= $this->System->splitByWords($voucher->name, 75) ?></a>
                                                    </div>
                                                    <div class="pl05 pr05">
                                                        <div class="row fs13">
                                                            <div class="col-sm-17 col-xs-17">
                                                                <p class=""><i class="far fa-clock text-light-blue"></i> <?= $voucher->days_attended ?> ngày <?= $voucher->days_attended - 1 ?> đêm</p>
                                                            </div>
                                                            <div class="col-sm-19 col-xs-19 no-pad-left text-right">
                                                                <span class="fs12 text-grey"><span class="fs12 text-grey"><span class="text-orange semi-bold"><?= number_format($voucher->totalPrice) ?></span>đ/voucher</span>
                                                                <span><p><del><?= number_format(round($voucher->totalPrice / (100 - $voucher->promote) * 100, -3)) ?>đ/voucher</del></p></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- End content -->
<?= $this->element('Front/Popup/voucher') ?>