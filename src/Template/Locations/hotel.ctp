
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<!-- Start content -->

<div class="list-combo mb20 mt20">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
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
                                    <a class="fs16 btn-sort text-dark <?= (isset($sortPrice) && $sortPrice == 'ASC') ? 'active' : '' ?> pb10" onclick="Frontend.sortLink('ASC');" >Giá tăng dần <i class="fas fa-long-arrow-alt-up"></i></a>
                                </div>
                                <div class="col-sm-18 mt20">
                                    <a class="fs16 btn-sort text-dark <?= (isset($sortPrice) && $sortPrice == 'DESC') ? 'active' : '' ?> pb10" onclick="Frontend.sortLink('DESC');" >Giá giảm dần <i class="fas fa-long-arrow-alt-down"></i></a>
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
                                <a class="fs16 btn-sort text-dark pl10 <?= (isset($sortPrice) && $sortPrice == 'ASC') ? 'active' : '' ?> pb10" onclick="Frontend.sortLink('ASC');" >Giá tăng dần <i class="fas fa-long-arrow-alt-up"></i></a>
                            </div>
                            <div class="col-xs-18 mt20 mb20 text-right">
                                <a class="fs16 btn-sort text-dark pl15 <?= (isset($sortPrice) && $sortPrice == 'DESC') ? 'active' : '' ?> pb10" onclick="Frontend.sortLink('DESC');" >Giá giảm dần <i class="fas fa-long-arrow-alt-down"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="list-location mb30">
                    <div class="row">
                        <div class="col-sm-36">
                            <div class="mt20 pb30 text-center">
                                <span class="semi-bold fs24 box-underline-center pb05 text-uppercase" >KHÁCH SẠN tại <?= $location->name ?></span>
                            </div>
                            <div class="p15">
                                <div class="row">
                                    <?php
                                    $numPeople = "1 Phòng-1NL-0TE-0EB";
                                    $dataVinRoom[] = [
                                        'num_adult' => 1,
                                        'num_child' => 0,
                                        'num_kid' => 0
                                    ];
                                    $sDate = date('d-m-Y', strtotime('today'));
                                    $eDate = date('d-m-Y', strtotime('tomorrow'));
                                    $fromDate = str_replace('-', '/', $sDate) . " - " . str_replace('-', '/', $eDate);
                                    ?>
                                    <?php foreach ($hotels as $indexHotel => $hotel): ?>
                                        <div class="col-sm-12 mb15">
                                            <div class="combo-item border-bottom-blue">
                                                <div class="wrap-content rectangle-image-v2">
                                                    <?php
                                                    $url = "";
                                                    if ($hotel->is_vinhms == 1) {
                                                        $url = \Cake\Routing\Router::url(['_name' => 'hotel.viewVinpearl', 'slug' => $hotel->slug, 'num_people' => $numPeople, 'date' => $fromDate, 'vin_room' => $dataVinRoom]);
                                                    } else {
                                                        $url = \Cake\Routing\Router::url(['_name' => 'hotel.view', 'slug' => $hotel->slug]);
                                                    }
                                                    ?>
                                                    <a href="<?= $url ?>">
                                                        <?php if (file_exists($hotel->thumbnail)): ?>
                                                            <img class="image" src="<?= $this->Url->assetUrl('/' . $hotel->thumbnail) ?>" />
                                                        <?php else: ?>
                                                            <img class="image" src="<?= $this->Url->assetUrl('frontend/img/no-thumbnail.png') ?>" />
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="top-left text-white">
                                                        <p><i class="fas fa-map-marker-alt text-pink fs16"></i>&nbsp;&nbsp;<?= $hotel->location_name ?></p>
                                                    </div>
                                                    <div class="middle-button">
                                                        <div class="button-text text-center ">
                                                            <a class="fs12" href="<?= $url ?>">XEM NGAY</a>
                                                        </div>
                                                    </div>
                                                    <div class="image-bottom-content combo-rating fs13 pl05">
                                                        <div class="row">
                                                            <div class="col-sm-22 col-xs-25">
                                                                <p class="pc"><?= $this->System->splitByWords($hotel->name, 15) ?></p>
                                                                <p class="sp"><?= $this->System->splitByWords($hotel->name, 25) ?></p>
                                                            </div>
                                                            <div class="col-sm-14 col-xs-11">
                                                                <p class="star-rating text-right" data-point="<?= $hotel->rating ?>"></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="combo-detail overhidden pb10">
                                                    <div class="semi-bold voucher-name">
                                                        <a class="semi-bold text-super-dark" href="<?= $url ?>"><?= $hotel->name ?></a>
                                                    </div>
                                                    <div class="row">
                                                        <div class="pl05 pr05">
                                                            <div class="col-sm-17 col-xs-17">
                                                                <span class="fs12 text-dark"><i class="fas fa-calendar-alt fs15 text-light-blue">  </i>  <?= $currentDate = date('d-m-Y') ?></span>
                                                            </div>
                                                            <div class="col-sm-19 col-xs-19 no-pad-left text-right">
                                                                <span class="fs12 text-grey"><strong class="text-orange"><?= $hotel->price_day == 0?"Chưa cập nhập </strong></span>": number_format($hotel->price_day) . "</strong> đ/phòng</span>" ?>
                                                            </div>
                                                        </div>
                                                        <!--                                                    <div class="col-sm-14 text-center">
                                                                                                                <span class=""><i class="far fa-user text-light-blue"></i></span>
                                                                                                                <span><p>13 đã đặt</p></span>
                                                                                                            </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($indexHotel % 3 == 2): ?>

                                            <div class="clearfix"></div>
                                        <?php endif; ?>
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
